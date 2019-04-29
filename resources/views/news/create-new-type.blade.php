@extends('layouts.layout-cms')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add New Type') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ action('NewsController@storeNewsType') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                                <div class="col-md-6">
                                    <input id="type" type="text" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type"  required autofocus>

                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-5">
                                    <button onclick="addNewType()" type="submit" class="btn btn-primary">
                                        {{ __('Add News Type') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <script>--}}
{{--        function addNewType() {--}}
{{--            confirm("Are you sure to create new type");--}}
{{--        }--}}
{{--    </script>--}}

@endsection