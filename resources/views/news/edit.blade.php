@extends('layouts.layout-cms')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit News') }}</div>

                    <div class="card-body">
                        <form action="{{ action('NewsController@update', ['id'=> $news['id'] ]) }}" method="post"  enctype="multipart/form-data">

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


                            <div class="form-group ">
                                <label for="name" >{{ __('รูปข่าว') }}</label>
                                    <div class="form-group row" >
                                        <?php  $count=0;?>
                                            @foreach ($images as $image)
                                                <?php
                                                    $count++;
                                                    $key = array_search($image, $images);
                                                ?>
                                                <div class="checkbox col-sm-6 form-group" style="text-align: center">
                                                    <input style="margin-left: 0px" class="form-check-input" name="key_image[]"
                                                           type="checkbox" value="{{$key}}" id="image{{$count}}" >

                                                    <label style="" for="image{{$count}}"><img src="{{asset($image)}}"
                                                                                               style="width:80%;height: 150px;max-width: 400px"></label>
                                                </div>
                                            @endforeach
                                    </div>
                            </div>

                            <div class="form-group ">
                                <label for="name" >{{ __('เพื่มรูปข่าว') }}</label>
                                <div class="custom-file">
                                    <input onchange="getImage(this)" class="custom-file-input"  accept="image/*"
                                           type="file"  id="customFile" name="filenames[]" multiple>
                                    <label class="custom-file-label" for="customFile"  id="imageName">Choose file</label>
                                </div>

                            </div>

                            <div class="form-group" style="text-align:center;">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Demo scripts for this page-->
    <script>
        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {

                            $($.parseHTML('<img class="" style="height: 300px;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#customFile').on('change', function() {
                imagesPreview(this, 'div.gallery');
            });
        });

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
