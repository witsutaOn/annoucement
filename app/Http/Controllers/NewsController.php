<?php

namespace App\Http\Controllers;

use App\News;
use App\News_type;
use App\Organize;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
////        dd($news_type,$organize);
        return view('news.create')->with('news_type', $news_type);
//            ->with('organize',$organize);
//        $news = News::create(request['title','content','type']);
//        return News::create([
//            'title' => $data['title'],
//            'type' => $data['type_id'],
//            'content' => $data['content'],
//        ])->with('success','news uploaddd');

//        $file = $request->file('file');
//        File::create([
//            'title' => $file->getClientOriginalName(),
//            'path' => $file->store('public/storage')
//        ]);

    }
    public function store(Request $request){
        request()->validate([
            'type_id' => ['required'],
            'title' => ['required','string'],
            'content' => ['required','string'],
            'publish_status' => ['required','integer'],
        ]);
        News::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'type_id' => $request->input('type_id'),

            'organize_id' => Auth::user()->group_id ,
//
            'user_id' =>  Auth::user()->id ,
            'images' => "images",
//            'publish_at' => $request->publish_at,
//            'publish_at' => "22",
            'publish_status' => $request->input('publish_status'),
//            'publish_status' => 0,
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

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit')->with('news', $news);
    }

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
}
