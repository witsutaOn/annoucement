@extends('layouts.layout-cms')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add New Type') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ action('OrganizeController@store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="nameOrganize" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"  required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('District') }}</label>

                                <div class="col-md-6">
                                    <input id="district" type="text" class="form-control" name="district"  required autofocus>

                                        <span class="invalid-feedback" role="alert"></span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Group User') }}</label>

                                <div class="col-md-6">
                                    <select class="custom-select "  name="group_id" required>
                                        <!-- TODO: edit for every group user-->

                                        {{--                                            <option value="11">test</option>--}}
                                        {{--                                            <option value="22">test2</option>--}}
                                        @foreach($group_user as $group)
                                            <option value="{{$group->id}}" >{{$group->group_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Province') }}</label>

                                <div class="col-md-6">
                                    <input id="province" type="text" class="form-control" name="province"  required autofocus>

                                    <span class="invalid-feedback" role="alert"></span>

                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Postcode') }}</label>

                                <div class="col-md-6">
                                    <input id="postcode" type="text" class="form-control" name="postcode"  required autofocus>

                                    <span class="invalid-feedback" role="alert"></span>

                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add News Organize') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection