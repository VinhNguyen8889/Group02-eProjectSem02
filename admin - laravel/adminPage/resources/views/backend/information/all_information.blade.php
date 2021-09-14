@extends('admin.admin_master')
@section('admin')

<div class="content-body" style="min-height: 884px;">
			<div class="container-fluid">
				<!-- Add Project -->

                <!-- row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Information</h4></h4>
                                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <a href="{{route('add.information')}}"><button type="button" class="btn btn-secondary">Add Information</button></a>
                    </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th style="width:80px;"><strong>#</strong></th>
                                                <th><strong>About</strong></th>
                                                <th><strong>Refund</strong></th>
                                                <th><strong>Terms</strong></th>
                                                <th><strong>Privacy</strong></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            @foreach($result as $item)
                                            
											<tr>
                                                <td><strong>1</strong></td>
                                                <td><strong>{{Str::limit($item->about,20,'...')}}</strong></td>
                                                <td>{{Str::limit($item->refund,20,'...')}}</td>
                                                <td>{{Str::limit($item->terms,20,'...')}}</td>
                                                <td>{{Str::limit($item->privacy,20,'...')}}</td>
                                                <td>
													<div class="d-flex">
														<a href="{{route('edit.information',$item->id)}}" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="{{route('delete.information',$item->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>







@endsection