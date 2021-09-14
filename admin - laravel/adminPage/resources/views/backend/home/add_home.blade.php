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
                                <h4 class="card-title">Add Home</h4>
                                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <a href="{{route('all.home')}}"><button type="button" class="btn btn-secondary">Go Back</button></a>
                    </div>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="{{route('store.home')}}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label class="info-title">Home Title</label>
                                            <input type="text" name="home_title" class="form-control input-default">
                                            @error('home_title')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="info-title">Home  SubTitle</label>
                                            <input type="text" name="home_subtitle" class="form-control input-default">
                                            @error('home_subtitle')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title">Tech Description</label>
                                            <input type="text" name="tech_description" class="form-control input-default">
                                            @error('tech_description')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <label class="info-title">Total Student</label>
                                            <textarea class="form-control" name="total_student" id="summernote1"></textarea>
                                            @error('total_student')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="info-title">Total Course</label>
                                            <input type="text" name="total_course" class="form-control input-default">
                                            @error('total_course')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="info-title">Total Review</label>
                                            <input type="text" name="total_review" class="form-control input-default">
                                            @error('total_review')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="info-title">Video Description</label>
                                            <input type="text" name="video_description" class="form-control input-default">
                                            @error('video_description')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="info-title">Video URL</label>
                                            <input type="text" name="video_url" class="form-control input-default">
                                            @error('video_url')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>


                                        <input type="submit" class="btn btn-success" value ="Update">
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