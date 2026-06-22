@extends('admin.layouts.master')
@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="admin_home.php">HOME</a>
            <span class="breadcrumb-item active">Bangla Post Create Manage</span>
        </nav>
        <div class="sl-pagebody">
            <div class="container mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bangla Post Create Form</h4>
                        <form action="{{ url('news/manage') }}" method="post" enctype="multipart/form-data"
                            class="row g-3 p-1 m-1" novalidate>
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Post Title </label> <span style="color: red;">*</span>
                                    <input type="text" class="form-control" id="postTitle" name="postTitle"
                                        placeholder="Enter Post Title" required />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Post Author Name</label> <span
                                        style="color: red;">*</span>
                                    <input type="text" class="form-control" id="auther" name="auther"
                                        placeholder="Enter Post Author Name" required />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Post Body</label> <span style="color: red;">*</span>
                                    <textarea name="postBody" id="postBody" cols="30" rows="3" class="form-control postBody"
                                        placeholder="Enter Post Body" required></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Select Main Category </label>
                                    <select name="category" id="category" class="form-control" required>
                                        <option value="" selected disabled>Select Main Category</option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Is This A Lead News</label>
                                    <select name="featherPost" id="featherPost" class="form-control" required>
                                        <option value="No">No </option>
                                        <option value="Yes">Yes </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Is This A 2nd Lead News</label>
                                    <select name="treandingPost" id="treandingPost" class="form-control" required>
                                        <option value="No">No </option>
                                        <option value="Yes">Yes </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Tag</label>
                                    <input type="text" class="form-control" id="tag" name="tag"
                                        placeholder="Enter Tag Name" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label"> Description </label>
                                    <textarea name="description" id="description" cols="30" rows="4" class="form-control"
                                        placeholder="Enter Description"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Post Image</label> <span style="color: red;">*</span>
                                    <input type="file" class="form-control" id="postImage" name="postImage" required />
                                </div>
                            </div>

                            <div class="col-12 text-center mt-4">
                                <button class="btn btn-primary" id="submitBtn" type="submit">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->

    <script src="{{ asset('') }}tinymce/tinymce.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#submitBtn").click(function (event) {
                let missingFields = []; // খালি ফিল্ডগুলোর লিস্ট রাখার জন্য অ্যারে

                let postTitle = $("#postTitle").val().trim();
                let auther = $("#auther").val().trim();
                let postBody = tinymce.get('postBody').getContent().trim(); // TinyMCE থেকে ডাটা নেওয়া
                let postImage = $("#postImage").val();
                let category = $("#category").val(); // ক্যাটাগরি সিলেক্ট করা হয়েছে কিনা চেক করবো

                // চেক করা কোন কোন ইনপুট খালি
                if (postTitle === "") {
                    missingFields.push("Post Title (Bangla)");
                }
                if (auther === "") {
                    missingFields.push("Author Name (Bangla)");
                }
                if (postBody === "") {
                    missingFields.push("Post Body (Bangla)");
                }
                if (!category) {
                    missingFields.push("Main Category");
                }
                if (postImage === "") {
                    missingFields.push("Post Image");
                }


                // যদি কোন ফিল্ড খালি থাকে তাহলে এলার্ট দেখাবে এবং সাবমিট আটকাবে
                if (missingFields.length > 0) {
                    alert("Please fill out the following required fields:\n\n" + missingFields.join("\n"));
                    event.preventDefault(); // ফর্ম সাবমিট হতে দেবে না
                }
            });
        });
    </script>


    <script>
        tinymce.init({
            selector: 'textarea#postBody',
            use_native_textarea: true,
            // width: 950,
            height: 400,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern imagetools"
            ],
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            toolbar2: "print preview media | forecolor backcolor emoticons",
            image_advtab: true,
            templates: [{
                title: 'Test template 1',
                content: 'Test 1'
            },
            {
                title: 'Test template 2',
                content: 'Test 2'
            }
            ]
        });

    </script>
@endsection