@extends('admin.admin_master')
@section('admin')

<div class="content-body" style="min-height: 884px;">
			<div class="container-fluid">
				<!-- Add Project -->
                <!-- row -->
                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{$editData->name}}'s Salary Increment</h4>
                                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <a href="{{route('all.employee_salary')}}"><button type="button" class="btn btn-secondary">Back</button></a>
                    </div>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="{{route('store.employee_salary',$editData->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="increment_salary">Salary Amount <span class="text-danger">*</span></label>
                                            <select class="form-control bg-secondary" name="increment_salary">
                                            <option value="" selected="" disabled="">Level 0</option>
                                            @foreach($level as $value)
                                                <option value="{{ $value->increment_salary }}" {{ ($editData->religion == $value->name)? "selected":"" }}>Level {{ $value->name }}</option>
                                            @endforeach	 
                                            </select>
                                            @error('increment_salary')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="effected_salary">Effected Date <span class="text-danger">*</span></label>
                                            <input type="date" name="effected_salary" class="form-control bg-secondary">
                                            @error('effected_salary')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
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