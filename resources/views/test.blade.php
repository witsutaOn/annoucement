{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
{{--    <title>Document</title>--}}
{{--</head>--}}
{{--<body>--}}

{{--    <div>--}}
{{--        <select id="input_province" onchange="showAmphoes()">--}}
{{--            <option value="">กรุณาเลือกจังหวัด</option>--}}
{{--        </select>--}}
{{--    </div>--}}
{{--    <div>--}}
{{--        <select id="input_amphoe" onchange="showDistricts()">--}}
{{--            <option value="">กรุณาเลือกอำเภอ</option>--}}
{{--        </select>--}}
{{--    </div>--}}
{{--    <div>--}}
{{--        <select id="input_district" onchange="showZipcode()">--}}
{{--            <option value="">กรุณาเลือกตำบล</option>--}}
{{--        </select>--}}
{{--    </div>--}}
{{--    <div>--}}
{{--        <input id="input_zipcode" placeholder="รหัสไปรษณีย์" />--}}
{{--    </div>--}}

{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            console.log("HELLO");--}}
{{--            showProvinces();--}}
{{--        });--}}
{{--    </script>--}}

{{--    <script>--}}
{{--        function ajax(url, callback){--}}
{{--            $.ajax({--}}
{{--                "url" : url,--}}
{{--                "type" : "GET",--}}
{{--                "dataType" : "json",--}}
{{--            })--}}
{{--                .done(callback); //END AJAX--}}
{{--        }--}}
{{--    </script>--}}

{{--    <script>--}}
{{--        function showAmphoes(){--}}
{{--            //INPUT--}}
{{--            var province_code = $("#input_province").val();--}}
{{--            //PARAMETERS--}}
{{--            var url = "{{ url('/') }}/api/province/"+province_code+"/amphoe";--}}
{{--            var callback = function(result){--}}
{{--                //console.log(result);--}}
{{--                $("#input_amphoe").empty();--}}
{{--                for(var i=0; i<result.length; i++){--}}
{{--                    $("#input_amphoe").append(--}}
{{--                        $('<option></option>')--}}
{{--                            .attr("value", ""+result[i].amphoe_code)--}}
{{--                            .html(""+result[i].amphoe)--}}
{{--                    );--}}
{{--                }--}}
{{--                showDistricts();--}}
{{--            };--}}
{{--            //CALL AJAX--}}
{{--            ajax(url,callback);--}}
{{--        }--}}
{{--    </script>--}}

{{--    <script>--}}
{{--        function showProvinces(){--}}
{{--            //PARAMETERS--}}
{{--            var url = "{{ url('/') }}/api/province";--}}
{{--            var callback = function(result){--}}
{{--                $("#input_province").empty();--}}
{{--                for(var i=0; i<result.length; i++){--}}
{{--                    $("#input_province").append(--}}
{{--                        $('<option></option>')--}}
{{--                            .attr("value", ""+result[i].province_code)--}}
{{--                            .html(""+result[i].province)--}}
{{--                    );--}}
{{--                }--}}
{{--                showAmphoes();--}}
{{--            };--}}
{{--            //CALL AJAX--}}
{{--            ajax(url,callback);--}}
{{--        }--}}
{{--    </script>--}}


{{--    <script>--}}
{{--        function showDistricts() {--}}
{{--            //INPUT--}}
{{--            var province_code = $("#input_province").val();--}}
{{--            var amphoe_code = $("#input_amphoe").val();--}}
{{--            //PARAMETERS--}}
{{--            var url = "{{ url('/') }}/api/province/" + province_code + "/amphoe/" + amphoe_code + "/district";--}}
{{--            var callback = function (result) {--}}
{{--                //console.log(result);--}}
{{--                $("#input_district").empty();--}}
{{--                for (var i = 0; i < result.length; i++) {--}}
{{--                    $("#input_district").append(--}}
{{--                        $('<option></option>')--}}
{{--                            .attr("value", "" + result[i].district_code)--}}
{{--                            .html("" + result[i].district)--}}
{{--                    );--}}
{{--                }--}}
{{--                showZipcode();--}}
{{--            };--}}
{{--            //CALL AJAX--}}
{{--            ajax(url, callback);--}}
{{--        }--}}
{{--    </script>--}}

{{--    <script>--}}
{{--        function showZipcode(){--}}
{{--            //INPUT--}}
{{--            var province_code = $("#input_province").val();--}}
{{--            var amphoe_code = $("#input_amphoe").val();--}}
{{--            var district_code = $("#input_district").val();--}}
{{--            //PARAMETERS--}}
{{--            var url = "{{ url('/') }}/api/province/"+province_code+"/amphoe/"+amphoe_code+"/district/"+district_code;--}}
{{--            var callback = function(result){--}}
{{--                //console.log(result);--}}
{{--                for(var i=0; i<result.length; i++){--}}
{{--                    $("#input_zipcode").val(result[i].zipcode);--}}
{{--                }--}}
{{--            };--}}
{{--            //CALL AJAX--}}
{{--            ajax(url,callback);--}}
{{--        }--}}
{{--    </script>--}}
{{--    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>--}}
{{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>--}}
{{--</body>--}}
{{--</html>--}}
<!doctype html>
<html lang="en">
<head>
    <title>Laravel 5.3 Multiple File Upload Example</title>
    <script src="jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="3.3.6/css/bootstrap.min.css">
</head>
<body>

<div class="container lst">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h3 class="well">Laravel 5.6 Multiple File Upload</h3>
    <form method="post" action="{{url('file')}}" enctype="multipart/form-data">

        {{csrf_field()}}

        <div class="input-group flcustom control-group lst increment" >
            <input type="file" name="filenames[]" class="myfrm form-control">
            <div class="input-group-btn">
                <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
            </div>
        </div>

        <div class="clone hide">
            <div class="flcustom control-group lst input-group" style="margin-top:10px">
                <input  type="file" name="filenames[]" class="myfrm form-control">
                <div class="input-group-btn">
                    <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                </div>

            </div>

        </div>
        <button type="submit" class="btn btn-success" style="margin-top:10px">Submit</button>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $(".btn-success").click(function(){
            var lsthmtl = $(".clone").html();
            $(".increment").after(lsthmtl);
        });
        $("body").on("click",".btn-danger",function(){
            $(this).parents(".flcustom control-group lst").remove();
        });
    });
</script>
</body>
</html>