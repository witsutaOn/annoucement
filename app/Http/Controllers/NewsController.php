<?php

namespace App\Http\Controllers;

use App\News;
use App\News_type;
use App\Organize;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $news = News::all();
        return view('news.index')->with('news', $news);
//        $news_type = DB::table('news_type')->get();
//        $group_user = DB::table('group_user')->get();
//        $organize = DB::table('organize')->get();
////        dd($news_type);
//        return view('news.upload',compact('news_type'));
    }
    public function create(){
        $news_type = News_type::all();
        $organize = Organize::all();
//        dd($news_type,$organize);
        return view('cms.create-new-user')->with('news_type', $news_type)->with('organize',$organize);
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
            'type_id' => ['required','integer'],
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
}
