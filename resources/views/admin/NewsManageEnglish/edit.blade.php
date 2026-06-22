@extends('admin.layouts.master')
@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="admin_home.php">HOME</a>
            <span class="breadcrumb-item active">English Post Update Manage</span>
        </nav>
        <div class="sl-pagebody">
            <div class="container mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">English Post Update Form</h4>
                        <form action="{{ url('english_news_manage/' . $news->id) }}" method="post" enctype="multipart/form-data"
                            class="row g-3 needs-validation p-1 m-1">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Post Title</label>
                                    <input type="text" class="form-control" id="postTitle" name="postTitle"
                                        value="{{ $news->postTitle }}" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Post Author Name </label>
                                    <input type="text" class="form-control" id="auther" name="auther"
                                    value="{{ $news->auther }}" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Post Body </label>
                                    <textarea name="postBody" id="postBody" cols="30" rows="3" class="form-control"> {{ $news->postBody }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Select Main Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="" selected disabled>Select Main Category</option>
                                        @foreach ($category as $item)
                                            <option @if ($news->category == $item->id) selected @endif
                                                value="{{ $item->id }}"> {{ $item->name_eng }} </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Is This A Lead News</label>
                                    <select name="featherPost" id="featherPost" class="form-control">
                                        @if ($news->featherPost == 'Yes')
                                            <option value='{{ $news->featherPost }}' selected>Yes</option>
                                            <option value="No">No </option>
                                        @elseif ($news->featherPost == 'No')
                                            <option value="Yes">Yes </option>
                                            <option value='{{ $news->featherPost }}' selected>No</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Is This A 2nd Lead News</label>
                                    <select name="treandingPost" id="treandingPost" class="form-control">
                                        @if ($news->treandingPost == 'Yes')
                                            <option value='{{ $news->treandingPost }}' selected>Yes</option>
                                            <option value="No">No </option>
                                        @elseif ($news->treandingPost == 'No')
                                            <option value="Yes">Yes </option>
                                            <option value='{{ $news->treandingPost }}' selected>No</option>
                                        @endif

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Tag</label>
                                    <input type="text" class="form-control" id="tag" name="tag" value='{{ $news->tag }}'
                                        placeholder="Enter Tag Name" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label"> Description </label>
                                    <textarea name="description" id="description" cols="30" rows="4"  class="form-control" placeholder="Enter Description">{{ $news->description }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Post Image</label>
                                    <input type="file" class="form-control" id="postImage" name="postImage" />
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

    <script src="{{ asset('public') }}/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea#postBody',
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
