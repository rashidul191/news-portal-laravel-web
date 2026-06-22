@extends('admin.layouts.master')
@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="admin_home.php">HOME</a>
            <span class="breadcrumb-item active">Category Manage</span>
        </nav>
        <div class="sl-pagebody">
            <div class="container mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Category Manage Form</h4>
                        <form action="{{ url('category') }}" method="post" enctype="multipart/form-data"
                            class="row g-3 needs-validation p-1 m-1">
                            @csrf
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Category Name Bangla</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Category Name Bangla" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Category Name English</label>
                                    <input type="text" class="form-control" id="name_eng" name="name_eng"
                                        placeholder="Enter Category Name English" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="0">Active</option>
                                        <option value="1">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 text-center mt-4">
                                <button class="btn btn-primary" type="submit">SUBMIT</button><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- sl-pagebody -->
        <div class="sl-pagebody">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Category Name Bangla</th>
                                        <th>Category Name English</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <style>
                                    td{
                                        color: #000;
                                    }
                                </style>
                                <tbody id="searchTable">
                                    @foreach ($category as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->name_eng }}</td>
                                            <td>
                                                @if ($item->status == 0)
                                                    {{ 'Active' }}
                                                @else
                                                    {{ 'Inactive' }}
                                                @endif
                                            </td>
                                            <td style="width:150px;">
                                                <a href="{{ url('category/'. $item->id . '/edit') }}" class="btn btn-primary">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                {{-- <a href="{{ url('category/'. $item->id) }}" class="btn btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
@endsection
