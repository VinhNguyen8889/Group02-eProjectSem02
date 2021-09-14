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
                                <h4 class="card-title">All Home Content</h4>
                                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <a href="{{route('add.home')}}"><button type="button" class="btn btn-secondary">Add Home Content</button></a>
                    </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th style="width:80px;"><strong>#</strong></th>
                                                <th><strong>Home Title</strong></th>
                                                <th><strong>Home Subtitle</strong></th>
                                                <th><strong>Tech Description</strong></th>
                                                <th><strong></strong></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            @foreach($result as $item)
                                            
											<tr>
                                                <td><strong>1</strong></td>
                                                <td><strong>{{$item->home_title}}</strong></td>
                                                <td><strong>{{$item->home_subtitle}}</strong></td>
                                                <td>{{Str::limit($item->tech_description,20,'...')}}</td>
                                                
                                                <td>
													<div class="d-flex">
														<a href="{{route('edit.home',$item->id)}}" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="{{route('delete.home',$item->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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