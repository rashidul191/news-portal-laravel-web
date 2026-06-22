@extends('admin.layouts.master')
@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="admin_home.php">HOME</a>
            <span class="breadcrumb-item active">Category Manage Update</span>
        </nav>
        <div class="sl-pagebody">
            <div class="container mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Category Manage Update Form</h4>
                        <form action="{{ url('category/' . $category->id) }}" method="post" enctype="multipart/form-data"
                            class="row g-3 needs-validation p-1 m-1">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Category Name Bangla</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $category->name }}" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Category Name English</label>
                                    <input type="text" class="form-control" id="name_eng" name="name_eng"
                                        value="{{ $category->name_eng }}" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        @if ($category->status == 0)
                                            <option value='{{ $category->status }}' selected>Active</option>
                                            <option value='1'>Inactive</option>
                                        @elseif ($category->status == 1)
                                            <option value='0'>Active</option>
                                            <option value='{{ $category->status }}' selected>Inactive</option>
                                        @endif
                                    </select>
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
