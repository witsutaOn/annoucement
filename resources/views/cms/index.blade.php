@extends('layouts.layout-cms')

@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Users Data Table
            <div style="float: right">
                <a class="btn btn-primary btn" href="{{ action('UserController@create') }}">
                    <span>Add User</span></a>
            </div>
        </div>


        <div class="card-body row">

            <div class="cols-6" >
                <form>
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInput">First Name</label>
                            <input type="text" class="form-control mb-2" id="inlineFormInput" name="firstname"
                                   placeholder="First Name">
                        </div>
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInput">Last Name</label>
                            <input type="text" class="form-control mb-2" id="inlineFormInput" name="lastname"
                                   placeholder="Last Name">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">Search</button>
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
                            <th style="width:15%">Name</th>
                            <th style="width:15%">Lastname</th>
                            <th style="width:20%">Email</th>
                            <th style="width:20%">Organize name</th>
                            <th style="width:15%">Group User</th>
                            <th style="width:10%;text-align: center"> Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th style="width:5%;text-align: center">ID</th>
                            <th style="width:15%">Name</th>
                            <th style="width:15%">Lastname</th>
                            <th style="width:20%">Email</th>
                            <th style="width:20%">Organize name</th>
                            <th style="width:15%">Group User</th>
                            <th style="width:10%;text-align: center"> Delete</th>
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
                                        {!! method_field('delete') !!}
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
                            <th style="width:20%">Name</th>
                            <th style="width:20%">Lastname</th>
                            <th style="width:20%">Email</th>
                            <th style="width:15%;text-align: center"> Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th style="width:5%;text-align: center">ID</th>
                            <th style="width:20%">Name</th>
                            <th style="width:20%">Lastname</th>
                            <th style="width:20%">Email</th>
                            <th style="width:15%;text-align: center"> Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td style="text-align: center;">{{$user['id']}}</td>
                                <td>{{$user['firstname']}}</td>
                                <td>{{$user['lastname']}}</td>
                                <td>{{$user['email']}}</td>

                                <td style="text-align: center">
                                    <form id="newsList"
                                          action="{{ action('UserController@destroy', ['id' => $user['id']])}}"
                                          method="post">
                                        <button onclick="confirmDeleteUser()" type="submit" class="btn btn-danger">Delete
                                        </button>
                                        {!! method_field('delete') !!}
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
                    @endif
                </table>

            </div>
            <div class="row">
                <div class="cols-12 text-center">
                    {{ $users->render() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDeleteUser() {
            var r = confirm("Are you sure you want  to delete this User?");
            if (!r) {
                document.getElementById("newsList").method = 'get';
                document.getElementById("newsList").action = "/dashboard";
            }
        }

    </script>

@endsection