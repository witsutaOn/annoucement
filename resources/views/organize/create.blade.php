@extends('layouts.layout-cms')

@section('content')
<?php //dd( Auth::user()->group_id);?>
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
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <input id="district" type="text" class="form-control" name="phone"  required autofocus>

                                    <span class="invalid-feedback" role="alert"></span>

                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Fax') }}</label>

                                <div class="col-md-6">
                                    <input id="district" type="text" class="form-control" name="fax"  required autofocus>

                                    <span class="invalid-feedback" role="alert"></span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Office hours') }}</label>

                                <div class="col-md-6">
                                    <input id="district" type="text" class="form-control" name="office_hours"  required autofocus>

                                    <span class="invalid-feedback" role="alert"></span>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address"  required autofocus>

                                    <span class="invalid-feedback" role="alert"></span>

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
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Group User') }}</label>

                                <div class="col-md-6">
                                    <select class="custom-select "  name="group_id" required>
                                        <!-- TODO: edit for every group user-->

                                        {{--                                            <option value="11">test</option>--}}
                                        {{--                                            <option value="22">test2</option>--}}
                                        @foreach($group_user as $group)
                                            @if(Auth::user()->group_id == 1 && $group->id >=1)
                                                <option value="{{$group->id}}" >{{$group->group_name}}</option>
                                            @elseif(Auth::user()->group_id == 2 && $group->id >=2)
                                                <option value="{{$group->id}}" >{{$group->group_name}}</option>
                                            @elseif(Auth::user()->group_id == 3 && $group->id >=3)
                                                <option value="{{$group->id}}" >{{$group->group_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
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