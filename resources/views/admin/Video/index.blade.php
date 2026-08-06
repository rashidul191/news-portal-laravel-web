@extends('admin.layouts.master')
@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="admin_home.php">HOME</a>
            <span class="breadcrumb-item active">Video Manage Update</span>
        </nav>
        <div class="sl-pagebody">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('video/manage') }}" method="post" enctype="multipart/form-data"
                            class="row g-3 needs-validation p-1 m-1">
                            @csrf
                            @method('POST')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" id="title" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="embedCode" class="form-label">Youtube Video Link <span
                                            class="text-danger">*</span> </label>
                                    <input type="text" name="embedCode" id="embedCode" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <button class="btn btn-primary" type="submit">Add</button><br>
                            </div>
                        </form>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Title</th>
                                            <th>Youtube Video Link</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody id="searchTable">
                                        @foreach ($videos as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->title ?? '--' }}</td>
                                                <td>{{ $item->embedCode }}</td>

                                                <td style="width:150px;">
                                                    <div class="d-flex justify-content-center">
                                                        {{-- <a href="{{ url('video/manage/' . $item->id . '/edit') }}"
                                                            class="btn btn-primary mr-1">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a> --}}
                                                        <form id="deleteForm{{ $item->id }}"
                                                            action="{{ url('/video/manage/' . $item->id) }}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger cancelOrderBtn"
                                                                data-item-id="{{ $item->id }}">
                                                                <i class="fa-solid fa-trash-can"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                {{ $videos->onEachSide(1)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->



@endsection
