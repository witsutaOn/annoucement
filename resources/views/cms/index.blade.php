@extends('layouts.layout-cms')

@section('content')
{{--        <!-- Breadcrumbs-->--}}
{{--        <ol class="breadcrumb">--}}
{{--          <li class="breadcrumb-item">--}}
{{--            <a href="#">Dashboard</a>--}}
{{--          </li>--}}
{{--          <li class="breadcrumb-item active">Overview</li>--}}
{{--        </ol>--}}
{{--        --}}
{{--        <!-- DataTables Example -->--}}
<?php //dd($news)?>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Tilte</th>
                    <th>Picture</th>
                    <th>Content</th>
{{--                    <th>Age</th>--}}
{{--                    <th>Start date</th>--}}
{{--                    <th>Salary</th>--}}
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Tilte</th>
                    <th>Picture</th>
                    <th>Content</th>
                    {{--                    <th>Age</th>--}}
                    {{--                    <th>Start date</th>--}}
                    {{--                    <th>Salary</th>--}}
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </tfoot>
                <tbody>


                @forelse($news as $new)
                  <tr>
                    <td>{{$new['title']}}</td>
                    <td>{{$new['picture']}}</td>
                    <td>{{$new['content']}}</td>

                    <td  style="text-align: center">
                      <form action="{{ action('NewsController@edit', ['id' => $new['id']])}}" >

{{--                        {{ method_field('PUT') }})--}}
                        <button  type="submit" class="btn btn-primary">Edit</button>
                        @method('PUT')
                        @csrf
                      </form>
                    </td>
                    <td style="text-align: center">

{{--                                <form action="{{ action('NewsController@destroy', ['id' => $new['id']]) }}">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                  <button  type="submit" class="btn btn-danger">Delete</button>--}}
{{--                                </form>--}}
                      <form action="{{ action('NewsController@destroy', ['id' => $new['id']])}}" method="post">
                        <button  type="submit" class="btn btn-danger">Delete</button>
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
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
@endsection