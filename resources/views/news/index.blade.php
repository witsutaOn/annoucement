@extends('layouts.layout-cms')

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            News Data Table
            <div style="float: right">
                <a class="btn btn-primary" href="{{ action('NewsController@create') }}">
                    <span>Add News</span></a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th style="width:20%">Tilte</th>
                        <th style="width:20%">Images</th>
                        <th style="width:40%">Content</th>
                        <th style="width:10%;text-align: center">Edit</th>
                        <th style="width:10%;text-align: center"> Delete</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th style="width:20%">Title</th>
                        <th style="width:20%">Images</th>
                        <th style="width:40%">Content</th>
                        <th style="width:10%;text-align: center">Edit</th>
                        <th style="width:10%;text-align: center"> Delete</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @forelse($news as $new)
                        <?php
                        $new['images']= json_decode($new['images']);
                        $images = $new['images'][0];
                        ?>
                        <tr>
                            <td>{{$new['title']}}</td>
                            <td style="text-align: center"> <img src="{{asset($images)}}" style="width:80%;height: 100px;max-width: 150px"></td>
                            <td>{{$new['content']}}</td>
                            <td  style="text-align: center">
                                <form action="{{ action('NewsController@edit', ['id' => $new['id']])}}" >
                                    <button  type="submit" class="btn btn-primary">Edit</button>
                                    @method('PUT')
                                    @csrf
                                </form>
                            </td>
                            <td style="text-align: center">
                                <form id="newsList" action="{{ action('NewsController@destroy', ['id' => $new['id']])}}" method="post">
                                    <button  onclick="confirmDelete()" type="submit" class="btn btn-danger">Delete</button>
                                    {!! method_field('delete') !!}
                                    {!! csrf_field() !!}
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center">No News</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete() {
            var r = confirm("Are you sure you want to delete this news?");
            if (!r) {
                document.getElementById("newsList").method= 'get';
                document.getElementById("newsList").action = "/dashboard";
            }
        }
    </script>


@endsection