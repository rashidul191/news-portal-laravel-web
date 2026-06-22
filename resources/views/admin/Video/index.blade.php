@extends('admin.layouts.master')
@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="admin_home.php">HOME</a>
            <span class="breadcrumb-item active">Video Manage Update</span>
        </nav>
        <div class="sl-pagebody">
            <div class="container mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Video Manage Update Form</h4>
                        <form action="{{ url('video/manage/' . $video->id) }}" method="post" enctype="multipart/form-data"
                            class="row g-3 needs-validation p-1 m-1">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Title</label>
                                    <textarea name="title" id="title" cols="30" rows="4" class="form-control"> {{ $video->title }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Embed Code</label>
                                    <input type="text" name="embedCode" id="embedCode" class="form-control" value="{{ $video->embedCode }}">
                                </div>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <button class="btn btn-primary" type="submit">UPDATE</button><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#embedCode').on('input', function() { // Changed 'keyup' to 'input'
                var embedCode = $(this).val(); // Using $(this) instead of $('#embedCode')

                var extractedSubstring = embedCode.substr(38, 61);

                $(this).val(extractedSubstring); // Using $(this) instead of $('#embedCode')
            });
        });
    </script>

@endsection
