@extends('layouts.layout-cms')

@section('content')
    <div class="container">


        <form action="{{ action('NewsController@update', ['id'=> $news['id'] ]) }}" method="post">

            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="inputHeadline">หัวข้อข่าว</label>
                <input type="text" class="form-control" id="title" placeholder="หัวข้อข่าว" name="title" value="{{old('title',$news->title)}}">
            </div>



            <div class="form-group">
                <label  for="inputNewsType">ประเภทข่าว</label>
                <select class="custom-select " id="inlineFormCustomSelectPref" name="type_id" >
                    {{--                <option selected hidden>ประเภทข่าว</option>--}}
                    @foreach($news_type as $row)
                        <option value="{{$row->id}}" {{old('type_id',$news->type_id) == $row->id  ? 'selected' : ''}}>{{$row->type}}</option>
                    @endforeach
                </select>

            </div>
            <div class="row form-group ">
                <div class=" col-sm-6">
                    <label  for="inputNewsType">Publish Status</label>
                    <select class="custom-select " id="inlineFormCustomSelectPref2" name="publish_status">

                        <option value="0" {{old('publish_status',$news->publish_status)==0  ? 'selected' : ''}}>Not Publish</option>

                        <option value="1" {{old('publish_status',$news->publish_status)==1  ? 'selected' : ''}}>Publish</option>
                    </select>
                </div>
                {{--            <div class=" col-sm-6">--}}
                {{--                <label for="example-date-input" >Date</label>--}}
                {{--                <input class="form-control" type="date" id="example-date-input" name="publish_at">--}}
                {{--            </div>--}}
                {{--            <div class="well form-group">--}}
                {{--                <div id="datetimepicker1" class="input-append date">--}}
                {{--                    <input data-format="dd/MM/yyyy hh:mm:ss" type="text" name="published_at">--}}
                {{--                    <span class="add-on">--}}
                {{--                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>--}}
                {{--                    </span>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                <div class=" col-sm-6">
                    <label for="example-date-input" >Date </label>
                    <input class="form-control" id="published_at"
                           type="datetime-local" name="published_at" value="{{ \Carbon\Carbon::parse(old('published_at',$news->published_at))->toDateTimeLocalString() }}">
                </div>

            </div>
            <div class="form-group">
                <label for="inputNewsContent">เนื้อหาข่าว</label>
                {{--            <textarea rows="4" name="content"></textarea>--}}
                <input class="form-control" type="text"  id="content" name="content" value="{{old('content',$news->content)}}">
            </div>

            <div class="custom-file form-group">
                <input type="file"  id="customFile" value="{{old('picture',$news->picture)}}">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>

            {{--        TODO: Publish date, Publish Status, Create by, Created at, Updated at--}}
            <div class="form-group" style="text-align:center;">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
    </div>
    <!-- Demo scripts for this page-->



@endsection
