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
        return view('news.create')->with('news', $news)->with('news_type',$news_type);
//
    }
    public function create(){
        $news_type = News_type::all();
        return view('news.create')->with('news_type', $news_type);
    }
    public function store(Request $request){
        request()->validate([
            'type_id' => ['required','integer'],
            'title' => ['required','string'],
            'content' => ['required','string'],
            'publish_status' => ['required','integer'],
            'published_at' => ['required'],
        ]);
        News::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'type_id' => $request->input('type_id'),
            'organize_id' => Auth::user()->organize_id ,
            'user_id' =>  Auth::user()->id ,
            'images' => "images",
            'published_at' => $request->input('published_at'),
            'publish_status' => $request->input('publish_status'),
            'view_count' => 15,
        ]);
        $news_type = News_type::all();
//        return redirect()->action('NewsController@show', ['id' => $news->id]);
        return view('news.create')->with('news_type',$news_type);

//        $files = $request->file('file');
//        foreach ($files as $file){
//            File::create([
//                'title' => $file->getClientOriginalName(),
//                'path' => $file->store('public/storage')
//            ]);
//        }
//        return redirect('/test')->with('success','file uploaddd');
    }
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show')->with('news', $news);
    }

//    public function edit($id)
//    {
//        $news = News::findOrFail($id);
//        return view('news.edit')->with('news', $news);
//    }

    public function createNewsType()
    {
        return view('news.create-new-type');

    }
    public function storeNewsType(Request $request){
        $attributes =  request()->validate([
            'type' => ['required','string'],
        ]);



        News_type::create($attributes);
        return view('news.create-new-type');
    }
    public function destroy($id)
    {

        News::find($id)->delete();

        return Redirect::route('dashboard');

    }

    public function edit($id)
    {
//        dd($id);
        $news_type = News_type::all();
        $news = News::findOrFail($id);
        return view('news.edit')->with('news', $news)->with('news_type',$news_type);
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
//        $attributes =  request()->validate([
//            'title' => ['required','min:3'],
//            'detail' => ['required','min:3']
//        ]);
//
        $news = News::findOrFail($id);
        $news->type_id = $request->input('type_id');
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->publish_status = $request->input('publish_status');
        $news->published_at = $request->input('published_at');
        $news->save();
        return Redirect::route('dashboard');
    }
}


