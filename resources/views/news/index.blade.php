@extends('layouts.layout-cms')

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            ข่าว
                <div style="float: right">
                    <a class="btn btn-primary" href="{{ action('NewsController@create') }}">
                        <span>เพิ่มข่าว</span></a>
                </div>
            </div>

        <div class="card-body">

            <div class="cols-6" >
                <form method = "get" >
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInput">หัวข้อข่าว</label>
                            <input type="text" class="form-control mb-2" id="title" name="title" value=""
                                   placeholder="หัวข้อข่าว">
                        </div>
                        @if(Auth::user()->group_id==1 )
                            <div class="col-auto" style="margin-top: -8px">

                                <select id="organize_name" name="name"
                                        class="form-control mb-2 select2" >
                                    <option value="" hidden>ชื่อหน่วยงาน</option>
                                    @foreach($organizes as $organize)
                                        <option value="{{ $organize->name}}">{{ $organize->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                        @endif
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">ค้นหา</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        @if(Auth::user()->group_id==1 )
                            <th style="width:20%">หัวข้อข่าว</th>
                            <th style="width:20%">รูปข่าว</th>
                            <th style="width:30%">เนื้อหา</th>
                            <th style="width:20%">ชื่อหน่วยงาน</th>
                            <th style="width:5%;text-align: center">แก้ไข</th>
                            <th style="width:5%;text-align: center">ลบ</th>
                        @else
                            <th style="width:20%">หัวข้อข่าว</th>
                            <th style="width:20%">รูปข่าว</th>
                            <th style="width:40%">เนื้อหา</th>
                            <th style="width:10%;text-align: center">แก้ไข</th>
                            <th style="width:10%;text-align: center">ลบ</th>
                        @endif
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        @if(Auth::user()->group_id==1 )
                            <th style="width:20%">หัวข้อข่าว</th>
                            <th style="width:20%">รูปข่าว</th>
                            <th style="width:30%">เนื้อหา</th>
                            <th style="width:20%">ชื่อหน่วยงาน</th>
                            <th style="width:5%;text-align: center">แก้ไข</th>
                            <th style="width:5%;text-align: center">ลบ</th>
                        @else
                            <th style="width:20%">หัวข้อข่าว</th>
                            <th style="width:20%">รูปข่าว</th>
                            <th style="width:40%">เนื้อหา</th>
                            <th style="width:10%;text-align: center">แก้ไข</th>
                            <th style="width:10%;text-align: center">ลบ</th>
                        @endif
                    </tr>
                    </tfoot>
                    <tbody>
                    @forelse($news as $new)
                        <?php
                        $new['images']= json_decode($new['images']);
                        $images = $new['images'][0];
//                        $text = '<p><strong>Lorem</strong> ipsum dolor <img src="images/test.jpg"></p>'
                        ?>
                        <tr>
                            <td>{{$new['title']}}</td>
                            <td style="text-align: center"> <img src="{{asset($images)}}" style="width:80%;height: 100px;max-width: 150px"></td>
                            <td >
                                 <?php echo $new['content']  ?>
                            </td>
                            @if(Auth::user()->group_id==1 )
                                <td >
                                    <?php echo $new->organize->name  ?>
                                </td>
                            @endif
                            <td  style="text-align: center">
                                <form action="{{ action('NewsController@edit', ['id' => $new['id']])}}" >
                                    <button  type="submit" class="btn btn-primary">แก้ไข</button>
                                    @method('PUT')
                                    @csrf
                                </form>
                            </td>
                            <td style="text-align: center">
                                <form id="newsList" action="{{ action('NewsController@destroy', ['id' => $new['id']])}}" method="post">
                                    <button  onclick="return confirm('คุณแน่ใจว่าต้องการลบข่าวนี้ ?')" type="submit" class="btn btn-danger">ลบ</button>
                                    {!! method_field('delete') !!}
                                    {!! csrf_field() !!}
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center">ไม่มีข่าว</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div class="cols-12 text-center">
                        {{ $news->appends(request()->except('page'))->render() }}
                </div>

            </div>
        </div>
    </div>
    <script>
        {{----}}

        var url_string =window.location.href
        var url = new URL(url_string);

        if(url.searchParams.get("title") !=null){
            document.getElementById("title").value =  url.searchParams.get("title");

        }

        if(url.searchParams.get("name") !=null){
            document.getElementById("organize_name").value =  url.searchParams.get("name");

        }
    </script>


@endsection