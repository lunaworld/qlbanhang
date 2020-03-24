@extends('layouts.app')

@section('content')
<div class="container">
    <button id='demo'>demo</button>
</div>
<script>
    
$(document).ready(function(){
    $("#demo").click(function(){
        $.ajax({
            url : '/ajax',//duong dan
            type: 'GET',  // http method
            data: {},  // data to submit
            success: function (data) {
                alert(data);
            },
            error: function (data) {
                    alert('error');
            }
        });
    })
});
</script>
@endsection
