@extends('admin.layouts.master')
@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="admin_home.php">HOME</a>
            <span class="breadcrumb-item active">Adds Manage</span>
        </nav>
        {{-- <div class="sl-pagebody">
            <div class="container mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Adds Manage Form</h4>
                        <form action="{{ url('adds/manage') }}" method="post" enctype="multipart/form-data"
                            class="row g-3 needs-validation p-1 m-1">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="addsImg" name="addsImg" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Link</label>
                                    <textarea name="adds_link" id="adds_link" cols="30" rows="4" class="form-control"
                                        placeholder="Enter adds Link" required></textarea>

                                </div>
                            </div>

                            <div class="col-12 text-center mt-4">
                                <button class="btn btn-primary" type="submit">SUBMIT</button><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- sl-pagebody --> --}}
        <div class="sl-pagebody">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Image</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <style>
                                    td {
                                        color: #000;
                                    }
                                </style>
                                <tbody id="searchTable">
                                    @foreach ($adds as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('public/upload/' . $item->addsImg) }}" width="250"
                                                    height="80" alt="">
                                            </td>
                                            <td>{{ $item->adds_link }} </td>

                                            <td style="width:150px;">
                                                <a href="{{ url('adds/manage/' . $item->id . '/edit') }}"
                                                    class="btn btn-primary">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
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