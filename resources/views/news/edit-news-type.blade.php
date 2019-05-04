@extends('layouts.layout-cms')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('แก้ไขประเภทข่าว') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ action('NewsTypeController@update', ['id'=> $news_type['id'] ]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                                <div class="col-md-6">
                                    <input id="type" type="text" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{old('type',$news_type->type)}}" required autofocus>

{{--                                    @if ($errors->has('type'))--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $errors->first('type') }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @endif--}}
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-5">
                                    <button onclick="editNewType()" type="submit" class="btn btn-primary">
                                        {{ __('Edit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script>
            function editNewType() {
                confirm("Are you sure to edit news type");
            }
        </script>

@endsection