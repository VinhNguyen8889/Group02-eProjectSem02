@extends('admin.admin_master')

@section('summernote')
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection


@section('admin')

<div class="content-body" style="min-height: 884px;">
			<div class="container-fluid">

                <!-- row -->
                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Course</h4>
                                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <a href="{{route('all.course')}}"><button type="button" class="btn btn-secondary">Go Back</button></a>
                    </div>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="{{route('update.course',$result->id)}}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label class="info-title">Course Short Title</label>
                                            <input type="text" name="short_title" class="form-control input-default" value="{{$result->short_title}}">
                                            @error('short_title')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="info-title">Course Long Title</label>
                                            <input type="text" name="long_title" class="form-control input-default" value="{{$result->long_title}}">
                                            @error('long_title')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title">Short Description</label>
                                            <input type="text" name="short_description" class="form-control input-default" value="{{$result->short_description}}">
                                            @error('short_description')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <label class="info-title">Long Description</label>
                                            <textarea class="form-control" name="long_description" id="summernote1">{{$result->long_description}}</textarea>
                                            @error('long_description')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="info-title">Total Duration</label>
                                            <input type="text" name="total_duration" class="form-control input-default" value="{{$result->total_duration}}">
                                            @error('total_duration')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="info-title">Total Lecture</label>
                                            <input type="text" name="total_lecture" class="form-control input-default" value="{{$result->total_lecture}}">
                                            @error('total_duration')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="info-title">Total Student</label>
                                            <input type="text" name="total_student" class="form-control input-default" value="{{$result->total_student}}">
                                            @error('total_student')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="info-title">Skills</label>
                                            <input type="text" name="skill_all" class="form-control input-default" value="{{$result->skill_all}}">
                                            @error('skill_all')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="info-title">Course Video</label>
                                            <input type="text" name="video_url" class="form-control input-default" value="{{$result->video_url}}">
                                            @error('video_url')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Course Image</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="small_img" class="custom-file-input" id="image1" onchange="document.getElementById('showImage1').src = window.URL.createObjectURL(this.files[0])">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                        <img id="showImage1" src="{{$result->small_img}}" class="img-fluid rounded-circle" alt="" style="width:100px;height:100px">
                                        </div>  


                                        <input type="submit" class="btn btn-success" value ="Update Course">
                                    </form>
                                </div>
                            </div>
                        </div>

            </div>
        </div>

<!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#summernote').summernote({
        height: 400
    });
</script>
<script type="text/javascript">
    $('#summernote1').summernote({
        height: 400
    });
</script>
<script type="text/javascript">
    $('#summernote2').summernote({
        height: 400
    });
</script>
<script type="text/javascript">
    $('#summernote3').summernote({
        height: 400
    });
</script>
<!-- End Summernote Editor  -->
@endsection