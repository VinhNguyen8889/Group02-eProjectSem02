@extends('admin.admin_master')
@section('admin')

<div class="content-body" style="min-height: 884px;">
			<div class="container-fluid">
				<!-- Add Project -->
                <!-- row -->
                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Monthly Salary</h4>
                                
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="get" action="{{route('details.monthly_salary')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="month">Month <span class="text-danger">*</span></label>
                                            <input type="month" name="month" class="form-control  bg-secondary">

                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_no">ID No <span class="text-danger">*</span></label>
                                            <input type="text" name="id_no" class="form-control input-default">

                                        </div>
                                        </div>
                                        </div>

                                        <input type="submit" class="btn btn-success" value ="Submit">

                                    </form>
                                </div>
                            </div>
                        </div>

            </div>
        </div>


@endsection