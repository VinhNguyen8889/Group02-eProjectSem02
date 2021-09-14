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
                                <h4 class="card-title">Add Review</h4>
                                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <a href="{{route('all.review')}}"><button type="button" class="btn btn-secondary">Go Back</button></a>
                    </div>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="{{route('store.review')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label class="info-title">Client Name</label>
                                            <input type="text" name="client_name" class="form-control input-default">
                                            @error('client_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title">Client Description</label>
                                            <textarea class="form-control" name="client_description" id="summernote1"></textarea>
                                            @error('client_description')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Client Image</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="client_img" class="custom-file-input" id="image" onchange="document.getElementById('showImage').src = window.URL.createObjectURL(this.files[0])">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>

                                        </div>
                                        @error('client_img')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        <div class="form-group">
                                        <img id="showImage" src="{{url('upload/no_image.jpg')}}" class="img-fluid rounded-circle" alt="" style="width:100px;height:100px">
                                        </div>


                                        <input type="submit" class="btn btn-success" value ="Add Review">

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