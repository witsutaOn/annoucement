<?php

namespace App\Http\Controllers;

use App\News_type;
use App\Organize;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class NewsTypeController extends Controller
{

    public function index()
    {
        $news_type = News_type::all();
        return view('news.show-news-type')->with('news_type', $news_type);
    }

    public function getNewsType()
    {
        $filterData = Input::get();

        $newsType = News_type::select(
            '*'
        );
        $newsType = $this->filter( $newsType, $filterData);

        return $newsType;
    }

    public function apiGetNewsType()
    {
        $newsType = $this->getNewsType()->paginate();

        return response()->json(['status' => 'success', 'newsType' => $newsType]);
    }


    public function filter($model, $filterData)
    {

        foreach ($filterData as $key => $value) {
            //check whether users table has email column
            if (Schema::hasColumn('News_type', $key))
            {
                if (!empty($value)) {
                    $model->where("$key", 'LIKE', "%$value%");

                }
            }
        }
        return $model;
    }

    public function create()
    {
        return view('news.create-new-type');
    }


    public function store(Request $request)
    {
        $attributes =  request()->validate([
            'type' => ['required','string'],
        ]);
        $type = request(['type', 'password']);

        if (News_type::where('type', '=', $type)->exists())
            return redirect()->back() ->with('alert', 'Type is duplicate');

        News_type::create($attributes);

        return Redirect::action('NewsTypeController@index');
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
        $news_type = News_type::findOrFail($id);

        return view('news.edit-news-type')->with('news_type',$news_type);
    }


    public function update(Request $request, $id)
    {
        request()->validate([
            'type' => ['string'],
        ]);


        $news_type = News_type::findOrFail($id);
        $news_type->type = $request->input('type');

        $news_type->save();

        return Redirect::action('NewsTypeController@index');
    }


    public function destroy($id)
    {
        News_type::find($id)->delete();

        return Redirect::action('NewsTypeController@index');
    }
}
