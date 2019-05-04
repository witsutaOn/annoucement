@extends('layouts.layout-cms')

@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            รายชื่อผู้ใช้
            @if(Auth::user()->group_id==1 or Auth::user()->group_id==2)
                <div style="float: right">
                    <a class="btn btn-primary btn" href="{{ action('UserController@create') }}">
                        <span>เพิ่มผู้ใช้</span></a>
                </div>
            @endif
        </div>


        <div class="card-body">

            <div class="cols-6" >
                <form>
                    <div class="form-row align-items-center">
                        <div class="col-auto">


                            <label class="sr-only" for="inlineFormInput">ชื่อ</label>
                            <input type="text" class="form-control mb-2" id="firstname" name="firstname" value=""
                                   placeholder="ชื่อ">
                        </div>
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInput">นามสกุล</label>
                            <input type="text" class="form-control mb-2" id="lastname" name="lastname" value=""
                                   placeholder="นามสกุล">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">ค้นหา</button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    @if(Auth::user()->group_id == 1)
                        <thead>
                        <tr>
                            <th style="width:5%;text-align: center">ID</th>
                            <th style="width:15%">ชื่อ</th>
                            <th style="width:15%">นามสกุล</th>
                            <th style="width:20%">อีเมลล์</th>
                            <th style="width:20%">ชื่อหน่วยงาน</th>
                            <th style="width:15%">ประเภทของผู้ใช้</th>
                            <th style="width:10%;text-align: center">ลบ</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th style="width:5%;text-align: center">ID</th>
                            <th style="width:15%">ชื่อ</th>
                            <th style="width:15%">นามสกุล</th>
                            <th style="width:20%">อีเมลล์</th>
                            <th style="width:20%">ชื่อหน่วยงาน</th>
                            <th style="width:15%">ประเภทของผู้ใช้</th>
                            <th style="width:10%;text-align: center">ลบ</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td style="text-align: center;">{{$user['id']}}</td>
                                <td>{{$user['firstname']}}</td>
                                <td>{{$user['lastname']}}</td>
                                <td>{{$user['email']}}</td>
                                <td>
                                    @foreach($organizes as $organize)
                                        @if( $organize['id'] == $user['organize_id']  )
                                            {{$organize['name']}}

                                        @elseif ($user['organize_id'] == NULL)
                                            -
                                            @break
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($group_users as $group_user)
                                        @if( $group_user['id'] == $user['group_id'])
                                            {{$group_user['group_name']}}
                                        @endif
                                    @endforeach
                                </td>
                                <td style="text-align: center">
                                    <form id="newsList"
                                          action="{{ action('UserController@destroy', ['id' => $user['id']])}}"
                                          method="post">
                                        <button onclick="confirmDeleteUser()" type="submit"
                                                class="btn btn-danger bootstrap">Delete
                                        </button>
                                        {!! method_field('ลบ') !!}
                                        {!! csrf_field() !!}
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center">No User</td>
                            </tr>
                        @endforelse

                        </tbody>
                    @else
                        <thead>
                        <tr>
                            <th style="width:5%;text-align: center">ID</th>
                            <th style="width:20%">ชื่อ</th>
                            <th style="width:20%">นามสกุล</th>
                            <th style="width:20%">อีเมลล์</th>
                            @if( Auth::user()->group_id < 3)
                            <th style="width:15%;text-align: center">ลบ</th>
                                @endif
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th style="width:5%;text-align: center">ID</th>
                            <th style="width:20%">ชื่อ</th>
                            <th style="width:20%">นามสกุล</th>
                            <th style="width:20%">อีเมลล์</th>
                            @if( Auth::user()->group_id < 3)
                                <th style="width:15%;text-align: center">ลบ</th>
                            @endif
                        </tr>
                        </tfoot>
                        <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td style="text-align: center;">{{$user['id']}}</td>
                                <td>{{$user['firstname']}}</td>
                                <td>{{$user['lastname']}}</td>
                                <td>{{$user['email']}}</td>
                                @if(Auth::user()->group_id < 3)
                                <td style="text-align: center">
                                    @if($user['group_id'] > Auth::user()->group_id)
                                        <form id="newsList"
                                              action="{{ action('UserController@destroy', ['id' => $user['id']])}}"
                                              method="post">
                                            <button onclick="return confirm('คุณแน่ใจว่าต้องการลบผู้ใช้นี้ ?')" type="submit" class="btn btn-danger">ลบ</button>
                                            {!! method_field('delete') !!}
                                            {!! csrf_field() !!}
                                        </form>
                                    @else
                                        <button onclick="return confirm('คุณแน่ใจว่าต้องการลบผู้ใช้นี้ ?')" type="submit" class="btn btn-danger" disabled>ลบ</button>
                                    @endif

                                </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center">ไม่มีผู้ใช้</td>
                            </tr>
                        @endforelse

                        </tbody>
                    @endif
                </table>
                <div class="">
                    <div class="cols-12 text-center" >
                        {{ $users->appends(request()->except('page'))->render() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        var url_string =window.location.href
        var url = new URL(url_string);

        if(url.searchParams.get("firstname") !=null){
            document.getElementById("firstname").value =  url.searchParams.get("firstname");
            $(this).attr("placeholder", "");
        }
        if(url.searchParams.get("lastname") !=null){
            document.getElementById("lastname").value =  url.searchParams.get("lastname");

        }

    </script>

@endsection