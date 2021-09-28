@extends('admin.admin_master')
@section('admin')

<div class="content-body">
<div class="container-fluid">
<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
<h2 class="font-w600 mb-2 mr-auto" >WELCOME <strong class="text-danger">{{Auth::user()->name}},</strong> </h2>
</div>

<p><h1> <i class="text-dark">WE WISH YOU HAVE A GREAT JOURNEY WITH US!</i> </h1></p>

<p>
<img src="{{asset('backend/images/logo-pp4e-2.jpg')}}" width="300px" class="p-5" alt="">
<h3 class="font-w600 mb-2 mr-auto" > <strong class="text-info">Professional Programming for Everyone Education Center!</strong> </h3>
</p>
</div>
</div>


@endsection