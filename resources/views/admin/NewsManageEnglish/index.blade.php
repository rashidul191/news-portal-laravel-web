@extends('admin.layouts.master')
@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="admin_home.php">HOME</a>
            <span class="breadcrumb-item active">English Post Manage</span>
        </nav>
        <div class="sl-pagebody">
            <div class="container mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><b>English Post Manage</b></h4><br>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <a href="{{ url('english_news_manage/create') }}"><button class="btn btn-primary">+Add
                                        New</button></a>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-2"></div>
                            <div class="col-sm-12 col-md-5">
                                <div class="input-group text-black">
                                    <span class="input-group-text bg-primary text-white pt-2 tb-2 pr-3 pl-3"> <i
                                            class="fa-solid fa-magnifying-glass"></i>
                                    </span>
                                    <input type="search" id="search" placeholder="Search" autocomplete="off"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search'"
                                        class="form-control" style="text-align: center;" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Image</th>
                                                <th>News Title Bangla</th>
                                                <th>News Title English</th>
                                                <th>Views</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody id="searchTable">
                                            @foreach ($news as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="text-center">
                                                        <img src="{{ asset('public/upload/' . $item->postImage) }}" width="70"
                                                            height="70" alt="">
                                                    </td>
                                                    <td>{{ $item->postTitle }}</td>
                                                    <td>{{ $item->postTitle_eng }}</td>
                                                    <td>{{ $item->views }}</td>

                                                    <td style="width:150px;">
                                                        <div class="d-flex justify-content-center">
                                                            <a href="{{ url('english_news_manage/' . $item->id . '/edit') }}"
                                                                class="btn btn-primary mr-1">
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                            </a>
                                                            <form id="deleteForm{{ $item->id }}"
                                                                action="{{ url('/english_news_manage/' . $item->id) }}"
                                                                method="post">
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
                                    {{ $news->onEachSide(1)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- sl-pagebody -->
    </div><!-- sl-pagebody -->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('#search').on('keyup', function () {
                var value = $(this).val().toLowerCase();
                var found = false;
                $('#searchTable tr').each(function () {
                    var rowText = $(this).text().toLowerCase();
                    if (rowText.indexOf(value) > -1) {
                        $(this).show();
                        found = true;
                    } else {
                        $(this).hide();
                    }
                });
                $('.searchinfo').remove(); // প্রথমে আগের ম্যাসেজটি সরানো
                if (!found) {
                    $('#searchTable').append(
                        '<tr class="searchinfo"><td colspan="5" class="bg-light text-center"><div class="text-dark mt-4 mb-4"><p><i class="fa-solid fa-magnifying-glass"></i> Data Not Found ............ </p></div></td></tr>'
                    );
                }
            });
        });
    </script>
@endsection