@extends('layouts.app')

@section('content')
<div class="container">


    <form method="POST" action="{{ action('NewsController@store') }}">

        {{--        { action('PostsController@update', ['id'=> $post->id ]) }}--}}
        @csrf

        <div class="form-group">
            <label for="inputHeadline">หัวข้อข่าว</label>
            <input type="text" class="form-control" id="title" placeholder="หัวข้อข่าว" name="title">
        </div>



        <div class="form-group">
            <label  for="inputNewsType">ประเภทข่าว</label>
            <select class="custom-select " id="inlineFormCustomSelectPref">
                <option selected hidden>ประเภทข่าว</option>
                @foreach($news_type as $row)
                    <option value="{{$row->id}}">{{$row->type}}</option>
                @endforeach
            </select>

        </div>
        <div class="form-group">
            <label for="inputNewsContent">เนื้อหาข่าว</label>
            <textarea></textarea>

        </div>

{{--        TODO: Publish date, Publish Status, Create by, Created at, Updated at--}}
        <div class="form-group" style="text-align:center;">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>

@endsection