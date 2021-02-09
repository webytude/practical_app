@section('title','Create Application')
@extends('admin.layouts.login')
@section('main_contant')

<div class="login-box">
    <div class="login-logo">
        <h1>Acknowledgement</h1>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="text-center mb-4">
            @include('global.show_session')
        </p>
    </div>
    <div class="login-box-footer clearfix">
    </div>
</div>


@endsection
