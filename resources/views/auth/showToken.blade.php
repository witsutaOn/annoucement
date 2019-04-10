@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-3">Access_Token</dt>
                            <dd class="col-sm-9">
                                <p>{{$tokenData['access_token']}}</p>
                            </dd>

                            <dt class="col-sm-3">token_type</dt>
                            <dd class="col-sm-9">
                                <p>{{$tokenData['token_type']}}</p>
                            </dd>
                            <dt class="col-sm-3">expires_at</dt>
                            <dd class="col-sm-9">
                                <p>{{$tokenData['expires_at']}}</p>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
