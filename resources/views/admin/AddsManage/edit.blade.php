@extends('admin.layouts.master')
@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="admin_home.php">HOME</a>
            <span class="breadcrumb-item active">Adds Update Manage</span>
        </nav>
        <div class="sl-pagebody">
            <div class="container mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Adds Update Manage Form</h4>
                        <form action="{{ url('adds/manage/' . $addsManage->id) }}" method="post" enctype="multipart/form-data"
                            class="row g-3 needs-validation p-1 m-1">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="addsImg" name="addsImg" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Link</label>
                                    <textarea name="adds_link" id="adds_link" cols="30" rows="4" class="form-control">{{ $addsManage->adds_link }}</textarea>

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
@endsection
