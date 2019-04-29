<!doctype html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Document</title>

</head>
<body>
    <div>
        <select id="input_province" onchange="showAmphoes()">
            <option value="">กรุณาเลือกจังหวัด</option>
        </select>
    </div>
    <div>
        <select id="input_amphoe" onchange="showDistricts()">
            <option value="">กรุณาเลือกอำเภอ</option>
        </select>
    </div>
    <div>
        <select id="input_district" onchange="showZipcode()">
            <option value="">กรุณาเลือกตำบล</option>
        </select>
    </div>
    <div>
        <input id="input_zipcode" placeholder="รหัสไปรษณีย์" />
    </div>
</body>
<script>
    $(document).ready(function(){
        // console.log("HELLO");
        showProvinces();
    });
</script>
<script>
    function ajax(url, callback){
        $.ajax({
            "url" : url,
            "type" : "GET",
            "dataType" : "json",
        })
            .done(callback); //END AJAX
    }
</script>
<script>
    function showProvinces(){
        //PARAMETERS
        console.log("1");
        var url = "{{ url('/') }}/api/province";
        console.log(url);
        var callback = function(result){
            $("#input_province").empty();
            console.log(result);
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
</html>