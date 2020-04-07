@extends('layouts.app')

@section('content')
<?php 
$imgname = 'file20200317015538.png';
?>
<div class="container">
    <img src = "{{url('upload')}}/{{$imgname}}">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
