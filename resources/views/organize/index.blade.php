@extends('layouts.layout-cms')

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            หน่วยงาน
            <div style="float: right">
                <a class="btn btn-primary" href="{{ action('OrganizeController@create') }}">
                    <span>เพิ่มหน่วยงาน</span></a>
            </div>
        </div>

        <div class="card-body">

{{--                        for search pagination--}}

                        <div class="cols-6" >
                            <form method = "get" >
                                <div class="form-row align-items-center">
                                    <div class="col-auto ">
                                        <label class="sr-only" for="inlineFormInput">Title</label>
                                        <input type="text" class="form-control mb-2" id="name" name="name" value=""
                                               placeholder="ชื่อหน่วยงาน">
                                    </div>

                                    <div class="col-auto" style="margin-top: -8px">
                                        <select id="input_district" name="district"
                                                class="form-control mb-2 select2" >
                                            <option value="" hidden>ตำบล</option>
                                            @foreach($districts as $district)
                                                <option value="{{ $district->district}}">{{ $district->district}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-auto" style="margin-top: -8px" >

                                        <select id="input_amphoe" name="amphoe"
                                                class="form-control mb-2 select2" >
                                            <option value="" hidden>อำเภอ</option>
                                            @foreach($amphoes as $amphoe)
                                                <option value="{{ $amphoe->amphoe}}">{{ $amphoe->amphoe}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-auto " style="margin-top: -8px">

                                            <select id="input_province" name="province"
                                                        class="form-control mb-2 select2" >
                                                <option value="" hidden>จังหวัด</option>
                                                @foreach($provinces as $province)
                                                    <option value="{{$province->province}}">{{$province->province}}</option>
                                                @endforeach
                                            </select>
                                    </div>




                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th style="width:15%">ชื่อหน่วยงาน</th>
                        <th style="width:20%">ที่อยู่</th>
                        <th style="width:15%">เขต</th>
                        <th style="width:15%">แขวง</th>
                        <th style="width:15%">จังหวัด</th>
                        <th style="width:10%;text-align: center">แก้ไข</th>
                        <th style="width:10%;text-align: center">ลบ</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th style="width:15%">ชื่อหน่วยงาน</th>
                        <th style="width:20%">ที่อยู่</th>
                        <th style="width:15%">เขต</th>
                        <th style="width:15%">แขวง</th>
                        <th style="width:15%">จังหวัด</th>
                        <th style="width:10%;text-align: center">แก้ไข</th>
                        <th style="width:10%;text-align: center">ลบ</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @forelse($organizes as $organize)
                        <tr>
                            <td>{{$organize['name']}}</td>
                            <td>{{$organize['address']}}</td>
                            <td>{{$organize->getAreas->district}}</td>
                            <td>{{$organize->getAreas->amphoe}}</td>
                            <td>{{$organize->getAreas->province}}</td>


                            <td  style="text-align: center">
                                <form action="{{ action('OrganizeController@edit', ['id' => $organize['id']])}}" >
                                    <button  type="submit" class="btn btn-primary">แก้ไข</button>
                                    @method('PUT')
                                    @csrf
                                </form>
                            </td>
                            <td style="text-align: center">
                                <form id="newsList" action="{{ action('OrganizeController@destroy', ['id' => $organize['id']])}}" method="post">
                                    <button  onclick="return confirm('คุณแน่ใจว่าต้องการลบหน่วยงานนี้ ?')" type="submit" class="btn btn-danger">ลบ</button>
                                    {!! method_field('delete') !!}
                                    {!! csrf_field() !!}
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="text-align: center">ไม่มีหน่วยงาน</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div class="cols-12 text-center">
                                        {{ $organizes->appends(request()->except('page'))->render() }}
                </div>


            </div>
        </div>
    </div>
<script>
    var url_string =window.location.href
    var url = new URL(url_string);

    if(url.searchParams.get("name") !=null){
        document.getElementById("name").value =  url.searchParams.get("name");

    }
    if(url.searchParams.get("district") !=null){
        document.getElementById("input_district").value =  url.searchParams.get("district");

    }
    if(url.searchParams.get("amphoe") !=null){
        document.getElementById("input_amphoe").value =  url.searchParams.get("amphoe");

    }
    if(url.searchParams.get("province") !=null){
        document.getElementById("input_province").value =  url.searchParams.get("province");

    }

</script>

@endsection