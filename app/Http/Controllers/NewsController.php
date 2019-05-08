<?php

namespace App\Http\Controllers;

use App\News;
use App\News_type;
use App\Organize;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index()
    {
//
        $news = $this->getNews();

        if(Auth::user()->group_id == 1){
            $news = $news->paginate();
        }else{
            $news = $news->where('organize_id', Auth::user()->organize_id)
                ->paginate();
        }

        $organizes = Organize::all();
        $news_type = News_type::all();
        return view('news.index')->with([
            'news' => $news,
            'news_type' => $news_type,
            'organizes' => $organizes,
        ]);
    }

    function getNews()
    {
        $filterData = Input::get();

        $news = News::with([
            'organize'
        ])->select();

        $organizes = Organize::select('*');
        $organizes = $this->filter('organize', $organizes, $filterData)->pluck('id');

        $news = $this->filter('news',$news, $filterData);


        if(count($organizes) > 0){
            $news->whereIn('organize_id', $organizes);
        }

        return $news;
    }

    public function apiGetNews()
    {
        $news = $this->getNews()->paginate();

        return response()->json(['status' => 'success', 'newsType' => $news]);
    }

    public function filter($table,$model, $filterData)
    {
        foreach ($filterData as $key => $value) {

            if (Schema::hasColumn($table, $key))
            {
                if (!empty($value)) {
                    $model->where("$key", 'LIKE', "%$value%");
                }
            }
        }
        return $model;
    }

    public function create(){
        $news_type = News_type::all();
        return view('news.create')->with('news_type', $news_type);
    }

    public function store(Request $request){
       $request->validate([
            'type_id' => ['required','integer'],
            'title' => ['required','string'],
            'content' => ['required','string'],
            'publish_status' => ['required','integer'],
            'published_at' => ['required'],
            'filenames' => 'required',
        ]);

        if($request->hasfile('filenames')) {

            foreach($request->file('filenames') as $file) {

                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);
                $data[] =  url('files/'.$name);
            }

            $news= new News();
            $news->title = $request->title;
            $news->content = $request->input('content');
            $news->type_id = $request->type_id;
            $news->organize_id = Auth::user()->organize_id;
            $news->user_id = Auth::user()->id;
            $news->images=json_encode($data);
            $news->published_at= $request->published_at;
            $news->publish_status = $request->publish_status;
            $news->view_count=0;

            $news->save();

            return Redirect::action('NewsController@index');
        }
    }

    public function show()
    {
        $news = $this->getNews()->where('organize_id', Auth::user()->organize_id)->paginate();
        $news_type = News_type::all();
        $organize = Organize::all();
        return view('news.index')->with([
            'news'=> $news,
            'news_type'=>$news_type,
            'organize' => $organize,
        ]);
    }


    public function destroy($id)
    {

        News::find($id)->delete();
        return Redirect::action('NewsController@index');

    }


    public function edit($id)
    {
        $news_type = News_type::all();
        $news = News::findOrFail($id);
        $data = News::find($id);
        $images= json_decode($data->images);

        return view('news.edit')->with('news', $news)->with('news_type',$news_type)->with('images',$images);
    }


    public function update(Request $request, $id)
    {
//        dd($id);
        request()->validate([
            'type_id' => ['required','integer'],
            'title' => ['required','string'],
            'content' => ['required','string'],
            'publish_status' => ['required','integer'],
            'published_at' => ['required'],
        ]);

        $key_image = $request->input('key_image');
        $data = News::find($id);
        $data = json_decode($data->images);

        if( isset($key_image)) {

            foreach ($key_image as $key) {
                unset($data [$key]);
            }
        }
        else{
            $key_image[]=null;
        }
//        dd($data);
        if($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {

                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/files/', $name);

                array_push($data, url('files/' . $name));
            }


        }
        $data = json_encode(array_values($data));

        $news = News::findOrFail($id);
        $news->type_id = $request->input('type_id');
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->publish_status = $request->input('publish_status');
        $news->published_at = $request->input('published_at');
        $news->images=$data;
        $news->save();

        return Redirect::action('NewsController@index');
    }
}


