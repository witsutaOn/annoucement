<?php

namespace App\Http\Controllers;

use App\News;
use App\News_type;
use App\Organize;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index(){
        $news = News::all();
        $news_type = News_type::all();
        return view('news.index')->with('news', $news)->with('news_type',$news_type);
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
            $news_type = News_type::all();
            return view('news.create')->with('news_type',$news_type);
        }
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show')->with('news', $news);
    }

    public function createNewsType()
    {
        return view('news.create-new-type');

    }
    public function storeNewsType(Request $request){
        $attributes =  request()->validate([
            'type' => ['required','string'],
        ]);
        $type = request(['type', 'password']);
        if (News_type::where('type', '=', $type)->exists())
//        if(!News_type::attempt($type))
            return redirect()->back() ->with('alert', 'Type is duplicate');

        News_type::create($attributes);
        return view('news.create-new-type')->with('alert', 'Complete');
        ;
    }
    public function destroy($id)
    {

        News::find($id)->delete();

        return Redirect::route('dashboard');

    }

    public function edit($id)
    {
        $news_type = News_type::all();
        $news = News::findOrFail($id);
        $data = News::find($id);
        $images= json_decode($data->images);
//        dd($images);
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
//dd($data);
        $data = json_encode(array_values($data));

        $news = News::findOrFail($id);
        $news->type_id = $request->input('type_id');
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->publish_status = $request->input('publish_status');
        $news->published_at = $request->input('published_at');
        $news->images=$data;
        $news->save();
        return Redirect::route('dashboard');
    }
}


