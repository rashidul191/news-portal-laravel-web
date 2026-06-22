@extends('admin.layouts.master')
@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="admin_home.php">HOME</a>
            <span class="breadcrumb-item active">E-Paper Manage</span>
        </nav>
        <div class="sl-pagebody">
            <div class="container mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">E-Paper Manage Form</h4>
                        <form action="{{ url('epaper/manage') }}" method="post" enctype="multipart/form-data"
                            class="row g-3 needs-validation p-1 m-1">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image_name" name="image_name" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Page No</label>
                                    <select name="pageno" id="pageno" class="form-control">
                                        <option value="" selected disabled>Select Page Number </option>
                                        <option value="1">Page No 1</option>
                                        <option value="2">Page No 2</option>
                                        <option value="3">Page No 3</option>
                                        <option value="4">Page No 4</option>
                                        <option value="5">Page No 5</option>
                                        <option value="6">Page No 6</option>
                                        <option value="7">Page No 7</option>
                                        <option value="8">Page No 8</option>
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
                                        <th>Date</th>
                                        <th>Image</th>
                                        <th>Page No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <style>
                                    td {
                                        color: #000;
                                    }
                                </style>
                                <tbody id="searchTable">
                                    @foreach ($ePaper as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($item->created_at)->timezone('Asia/Dhaka')->format('d-m-Y') }}
                                            </td>
                                            <td>
                                                <img src="{{ asset('public/upload/' . $item->image_name) }}" width="150"
                                                    height="200" alt="">
                                            </td>
                                            <td>{{ $item->pageno }}</td>
                                            <td style="width:150px;">
                                                <form id="deleteForm{{ $item->id }}"
                                                    action="{{ url('/epaper/manage/' . $item->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger cancelOrderBtn"
                                                        data-item-id="{{ $item->id }}">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </form>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            var cancelOrderButtons = document.querySelectorAll('.cancelOrderBtn');

            cancelOrderButtons.forEach(function (button) {
                button.addEventListener('click', function (event) {
                    event.preventDefault(); // Prevent the default action of the button

                    var itemId = this.getAttribute('data-item-id');
                    var form = document.getElementById('deleteForm' + itemId);

                    // Show SweetAlert
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You won\'t be able to revert this!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                    }).then((result) => {
                        // If the user clicks "Yes", proceed with the deletion
                        if (result.isConfirmed && form) {
                            // Submit the form for deletion
                            form.submit();
                        } else {
                            Swal.fire('Error', 'Form not found!', 'error');
                        }
                    });
                });
            });
        });
    </script>
@endsection