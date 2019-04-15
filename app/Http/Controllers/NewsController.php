<?php

namespace App\Http\Controllers;

use App\News;
use App\News_type;
use App\Organize;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index(){
        $news = News::all();
        return view('news.create')->with('news', $news);
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
        $attributes =  request()->validate([
            'type_' => ['required','string'],
            'organize_id' =>['required','integer'],
//            'user_id'=> ['required','integer'],
//            'images' => ['required','text'],
            'title' => ['required','string'],
            'content' => ['required','string'],
            'published_at' => ['required','timestamp'],
            'publish_status' => ['required','integer']
        ]);

        $news = News::create($attributes);
        return redirect()->action('NewsController@show', ['id' => $news->id]);

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
