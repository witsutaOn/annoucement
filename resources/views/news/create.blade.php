@extends('layouts.layout-cms')

@section('content')
<div class="container">


    <form method="POST" action="{{ action('NewsController@store') }}">

        @csrf

        <div class="form-group">
            <label for="inputHeadline">หัวข้อข่าว</label>
            <input type="text" class="form-control" id="title" placeholder="หัวข้อข่าว" name="title">
        </div>



        <div class="form-group">
            <label  for="inputNewsType">ประเภทข่าว</label>
            <select class="custom-select " id="inlineFormCustomSelectPref" name="type_id">
                <option selected hidden>ประเภทข่าว</option>
                @foreach($news_type as $row)
                    <option value="{{$row->id}}">{{$row->type}}</option>
                @endforeach
            </select>

        </div>
        <div class="row form-group ">
            <div class="form-group col-sm-6">
                <label  for="inputNewsType">Publish Status</label>
                <select class="custom-select " id="inlineFormCustomSelectPref2" name="publish_status">
                        <option value="0">Not Publish</option>
                        <option value="1">Publish</option>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label for="example-date-input" >Date</label>
                <input class="form-control" type="date" id="example-date-input" name="publish_at">
            </div>
        </div>
        <div class="form-group">
            <label for="inputNewsContent">เนื้อหาข่าว</label>
            <textarea rows="4" name="content"></textarea>

        </div>

{{--        TODO: Publish date, Publish Status, Create by, Created at, Updated at--}}
        <div class="form-group" style="text-align:center;">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>
<!-- Demo scripts for this page-->

@endsection