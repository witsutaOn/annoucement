@extends('layouts.app')

@section('content')


    <div class="container">
{{--        <form></form>--}}
        "form-group">
                <label for="inputHeadline">หัวข้อข่าว</label>
                <input t<form method="POST" action="{{ route('NewsController@uploadPhoto') }}">
                    @csrf
                    <div class=ype="text" class="form-control" id="headline" placeholder="หัวข้อข่าว" name="headline">
            </div>
            <div class="form-group">
                {{--            <form>--}}
                {{--                <div class="form-row">--}}
                {{--                    <div class="col">--}}
                {{--                        <label for="uploadImage" >รูปข่าว</label>--}}
                {{--                        <div class="custom-file ">--}}
                {{--                            <input type="file" class="custom-file-input" id="validatedCustomFile" required>--}}
                {{--                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>--}}
                {{--                            <div class="invalid-feedback">Example invalid custom file feedback</div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--            </form>--}}
                <label for="uploadImage" >รูปข่าว</label>
{{--                <form></form>--}}
{{--                <form  class="dropzone" method="post" enctype="multipart/form-data" id="photo-dropzone">--}}
{{--                    @csrf--}}
{{--                </form>--}}
            </div>

            <div class="form-group">

                <label  for="inputNewsType">ประเภทข่าว</label>
                <select class="custom-select " id="inlineFormCustomSelectPref">
                    <option selected hidden>ประเภทข่าว</option>
                    <option value="1">การงาน</option>
                    <option value="2">การเงิน</option>
                    <option value="3">การท่องเที่ยว</option>
                    <option value="4">การศึกษา</option>
                    <option value="5">สุขภาพ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputNewsContent">เนื้อหาข่าว</label>
                <textarea style="height: 800px !important"></textarea>

            </div>
            <div class="form-group" style="text-align:center;">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
