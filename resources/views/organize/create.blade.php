@extends('layouts.layout-cms')

@section('content')
<?php //dd( Auth::user()->group_id);?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add New Organize') }}</div>

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
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone"  required autofocus>

                                    <span class="invalid-feedback" role="alert"></span>

                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="fax" class="col-md-4 col-form-label text-md-right">{{ __('Fax Number') }}</label>

                                <div class="col-md-6">
                                    <input id="fax" type="text" class="form-control" name="fax"  required autofocus>

                                    <span class="invalid-feedback" role="alert"></span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="officeHour" class="col-md-4 col-form-label text-md-right">{{ __('Office Hours') }}</label>

                                <div class="col-md-6">
                                    <input id="officeHour" type="text" class="form-control" name="office_hours"  required autofocus>

                                    <span class="invalid-feedback" role="alert"></span>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

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
                                <label for="province" class="col-md-4 col-form-label text-md-right">{{ __('Province') }}</label>

                                <div class="col-md-6">
                                    <select id="input_province" name="province" onchange="showAmphoes()"
                                            class="form-control select2" style="width: 100%">
                                        <option value="">กรุณาเลือกจังหวัด</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Amphoe') }}</label>

                                <div class="col-md-6">
                                    <select id="input_amphoe" name="amphoe" onchange="showDistricts()"
                                            class="form-control select2" style="width: 100%">
                                        <option value="">กรุณาเลือกอำเภอ</option>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('District') }}</label>
                                <div class="col-md-6">
                                        <select id="input_district" name="district" onchange="showZipcode()"
                                                class="form-control select2"  style="width: 100%">
                                            <option value="">กรุณาเลือกตำบล</option>
                                        </select>

                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Zip Code') }}</label>

                                <div class="col-md-6 f" >
                                    <input id="input_zipcode" name="zipcode" placeholder="รหัสไปรษณีย์" readonly class="form-control"/>

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
                                    <button onclick="addNewOrganize()" type="submit" class="btn btn-primary">
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

<script>
    function addNewOrganize() {
        confirm("Are you sure to create new organize");
    }
</script>

<script>
    $(document).ready(function(){
        // console.log("HELLO");
        showProvinces();
    });

    function ajax(url, callback){
        $.ajax({
            "url" : url,
            "type" : "GET",
            "dataType" : "json",
        })
            .done(callback); //END AJAX
    }
    function showProvinces(){
        //PARAMETERS
        var url = "{{ url('/') }}/api/province";
        var callback = function(result){
            $("#input_province").empty();
            for(var i=0; i<result.length; i++){
                $("#input_province").append(
                    $('<option></option>')
                        .attr("value", ""+result[i].province_code)
                        .html(""+result[i].province)
                );
            }
            showAmphoes();
        };
        //CALL AJAX
        ajax(url,callback);
    }

    function showAmphoes(){
        //INPUT
        // console.log("2");
        var province_code = $("#input_province").val();
        //PARAMETERS
        var url = "{{ url('/') }}/api/province/"+province_code+"/amphoe";
        var callback = function(result){
            //console.log(result);
            $("#input_amphoe").empty();
            for(var i=0; i<result.length; i++){
                $("#input_amphoe").append(
                    $('<option></option>')
                        .attr("value", ""+result[i].amphoe_code)
                        .html(""+result[i].amphoe)
                );
            }
            showDistricts();
        };
        //CALL AJAX
        ajax(url,callback);
    }

    function showDistricts(){
        //INPUT
        var province_code = $("#input_province").val();
        var amphoe_code = $("#input_amphoe").val();
        //PARAMETERS
        var url = "{{ url('/') }}/api/province/"+province_code+"/amphoe/"+amphoe_code+"/district";
        var callback = function(result){
            //console.log(result);
            $("#input_district").empty();
            for(var i=0; i<result.length; i++){
                $("#input_district").append(
                    $('<option></option>')
                        .attr("value", ""+result[i].district_code)
                        .html(""+result[i].district)
                );
            }
            showZipcode();
        };
        //CALL AJAX
        ajax(url,callback);
    }

    function showZipcode(){
        //INPUT
        var province_code = $("#input_province").val();
        var amphoe_code = $("#input_amphoe").val();
        var district_code = $("#input_district").val();
        //PARAMETERS
        var url = "{{ url('/') }}/api/province/"+province_code+"/amphoe/"+amphoe_code+"/district/"+district_code;
        var callback = function(result){
            //console.log(result);
            for(var i=0; i<result.length; i++){
                $("#input_zipcode").val(result[i].zipcode);
            }
        };
        //CALL AJAX
        ajax(url,callback);
    }

</script>

@endsection