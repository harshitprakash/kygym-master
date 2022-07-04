@extends('layouts.admin.master')
@section('title','')
@section('content')

    <form method="POST" action="{{ route('video.store') }}" enctype="multipart/form-data" >@csrf

      <div class="card">
          <div class="card-body">
              <div class="mt-2">
                  <label>Title</label>
                  <input type="text" name="title" class="form-control" placeholder="Enter Title">
              </div>
              <div class="mt-2">
                  <label>Title</label>
                  <input type="text" name="description" class="form-control" placeholder="Enter description">
              </div>
              <div class="mt-2">
                  <label>Visible On</label>
                 <select name="visibility" id="visibility" class="form-control default-select" tabindex="-98">
                     <option value="">Select option</option>
                     <option value="Public">Public</option>
                     <option value="Private">Private</option>
                 </select>
              </div>
              <div class="mt-2">
                  <label>Choose Video</label>
                  <input type="file" id="browse_file"  name="video">
                  <div class="progress mb-3">
                      <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"  role="progressbar"></div>
                  </div>
              </div>
              <hr>
              <button type="submit" class="btn btn-success btn-sm" >Submit</button>
          </div>

      </div>
    </form>

<script type="text/javascript">

    $(function() {
        $(document).ready(function()
        {
            var bar = $('.bar');
            var percent = $('.percent');

            $('form').ajaxForm({
                beforeSend: function() {
                    var percentVal = '0%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                    alert('File Uploaded Successfully');
                    window.location.href = "/fileupload";
                }
            });
        });
    });
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

@endsection
