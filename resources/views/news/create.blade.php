@extends('layouts.layout-cms')

@section('content')
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('เพิ่มข่าว') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ action('NewsController@store') }}"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <label for="name" >{{ __('หัวข้อข่าว') }}</label>
{{--                                    <label for="inputHeadline">หัวข้อข่าว</label>--}}
                                <input type="text" class="form-control" id="title" placeholder="หัวข้อข่าว" name="title">
                            </div>
                            <div    class="form-group">
                                <label for="name" >{{ __('ประเภทข่าว') }}</label>
                                <select class="custom-select " id="inlineFormCustomSelectPref" name="type_id">
                                    {{--                <option selected hidden>ประเภทข่าว</option>--}}
                                    @foreach($news_type as $row)
                                        <option value="{{$row->id}}">{{$row->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class=" col-md-6">
                                    <label  for="inputNewsType">{{ __('สถานะการประกาศข่าว')}}</label>
                                    <select class="custom-select " id="inlineFormCustomSelectPref2" name="publish_status">
                                        <option value="0">ยังไม่เผยแพร่</option>
                                        <option value="1">กำลังเผยแพร่</option>
                                    </select>
                                </div>

                                <div class=" col-md-6">
                                    <label for="name" >{{ __('วันที่ประกาศข่าว') }}</label>
                                    <input class="form-control" id="published_at" value="2019-01-01T00:00"
                                           type="datetime-local" name="published_at">
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="name" >{{ __('เนื้อหาข่าว') }}</label>
                                            <textarea rows="4" name="content"></textarea>
{{--                                <input class="form-control" type="text"  id="content" name="content">--}}

                            </div>

                            <div class="form-group ">
                                <label for="name" >{{ __('รูปข่าว') }}</label>
                                <div class="custom-file">
                                    <input onchange="getImage(this)" class="custom-file-input"  accept="image/*"
                                           type="file"  id="customFile" name="filenames[]" multiple>
                                    <label class="custom-file-label" for="customFile" id="imageName">Choose file</label>
{{--                                    <div class="gallery form-group "></div>--}}
                                </div>

                            </div>


                            <div class="form-group row mb-0" style="margin-top: 70px">
                                <div class="col-md-6 offset-md-5">
                                    <button class="btn btn-primary" type="submit">Submit</button>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Demo scripts for this page-->

<script>

    function getImage(object){
        var i;
        var name="";

        for (i = 0; i < object.files.length; i++) {
            if (i < object.files.length -1) {
                name += object.files[i].name + ", ";
            }
            else{
                name += object.files[i].name;
            }
        }

        document.getElementById('imageName').innerHTML=name;
    }



</script>

@endsection