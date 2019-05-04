@extends('layouts.layout-cms')

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            ประเภทข่าว
            <div style="float: right">
                <a class="btn btn-primary" href="{{ action('NewsTypeController@create') }}">
                    <span>เพิ่มประเภทข่าว</span></a>
            </div>
        </div>

        <div class="card-body">

{{--            for search pagination--}}

{{--            <div class="cols-6" >--}}
{{--                <form method = "get" >--}}
{{--                    <div class="form-row align-items-center">--}}
{{--                        <div class="col-auto">--}}
{{--                            <label class="sr-only" for="inlineFormInput">Title</label>--}}
{{--                            <input type="text" class="form-control mb-2" id="title" name="title" value=""--}}
{{--                                   placeholder="Title">--}}
{{--                        </div>--}}
{{--                        --}}{{--                        <div class="col-auto">--}}
{{--                        --}}{{--                            <label class="sr-only" for="inlineFormInput">Last Name</label>--}}
{{--                        --}}{{--                            <input type="text" class="form-control mb-2" id="inlineFormInput" name="lastname"--}}
{{--                        --}}{{--                                   placeholder="Last Name">--}}
{{--                        --}}{{--                        </div>--}}
{{--                        <div class="col-auto">--}}
{{--                            <button type="submit" class="btn btn-primary mb-2">Search</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th style="width:70%">ประเภทข่าว</th>
                        <th style="width:15%;text-align: center">แก้ไข</th>
                        <th style="width:15%;text-align: center">ลบ</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th style="width:20%">ประเภทข่าว</th>
                        <th style="width:15%;text-align: center">แก้ไข</th>
                        <th style="width:15%;text-align: center">ลบ</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @forelse($news_type as $news_t)
                        <tr>
                            <td>{{$news_t['type']}}</td>
                            <td  style="text-align: center">
                                <form action="{{ action('NewsTypeController@edit', ['id' => $news_t['id']])}}" >
                                    <button  type="submit" class="btn btn-primary">แก้ไข</button>
                                    @method('PUT')
                                    @csrf
                                </form>
                            </td>
                            <td style="text-align: center">
                                <form id="newsList" action="{{ action('NewsTypeController@destroy', ['id' => $news_t['id']])}}" method="post">
                                    <button  onclick="return confirm('คุณแน่ใจว่าต้องการลบประเภทข่าวนี้ ?')" type="submit" class="btn btn-danger">ลบ</button>
                                    {!! method_field('delete') !!}
                                    {!! csrf_field() !!}
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="text-align: center">ไม่มีประเภทข่าว</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div class="cols-12 text-center">
{{--                    {{ $news_type->appends(request()->except('page'))->render() }}--}}
                </div>

            </div>
        </div>
    </div>
    <script>

        // var url_string =window.location.href
        // var url = new URL(url_string);
        //
        // if(url.searchParams.get("title") !=null){
        //     document.getElementById("title").value =  url.searchParams.get("title");
        //
        // }

    </script>


@endsection