@extends('admin.admin_master')

@section('summernote')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection


@section('admin')

<div class="content-body" style="min-height: 884px;">
			<div class="container-fluid">

                <!-- row -->
                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="{{route('store.information')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="info-title">About</label>
                                            <textarea class="form-control" name="about" id="summernote"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title">Refund Policy</label>
                                            <textarea class="form-control" name="refund" id="summernote1"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title">Terms</label>
                                            <textarea class="form-control" name="terms" id="summernote2"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title">Privacy Policy</label>
                                            <textarea class="form-control" name="privacy" id="summernote3"></textarea>
                                        </div>


                                        <input type="submit" class="btn btn-success" value ="Create Information">

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