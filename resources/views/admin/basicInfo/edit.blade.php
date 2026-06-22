@extends('admin.layouts.master')
@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="admin_home.php">HOME</a>
            <span class="breadcrumb-item active">Basic Informations Update</span>
        </nav>
        <div class="sl-pagebody">
            <div class="container mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Basic Info Update Form</h4>
                        <form action="{{ url('basic/info/' . $basicInfo->id) }}" method="post" enctype="multipart/form-data"
                            class="row g-3 needs-validation p-1 m-1">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $basicInfo->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom02" class="form-label">Email</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="{{ $basicInfo->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone_no" name="phone_no"
                                        value="{{ $basicInfo->phone_no }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Chief Adviser</label>
                                    <input type="text" class="form-control" id="chiefAdviser" name="chiefAdviser"
                                        value="{{ $basicInfo->chiefAdviser }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Editor</label>
                                    <input type="text" class="form-control" id="editor" name="editor"
                                        value="{{ $basicInfo->editor }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Adviser Editor</label>
                                    <input type="text" class="form-control" id="adviserEditor" name="adviserEditor"
                                        value="{{ $basicInfo->adviserEditor }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom02" class="form-label">Fav Icon</label>
                                    <input type="file" class="form-control" id="fav_icon" name="fav_icon">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom02" class="form-label">Logo</label>
                                    <input type="file" class="form-control" id="logo" name="logo">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom02" class="form-label">Footer Logo</label>
                                    <input type="file" class="form-control" id="footerLogo" name="footerLogo">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Facebook Link</label>
                                    <input type="text" class="form-control" id="fb_link" name="fb_link"
                                        value="{{ $basicInfo->fb_link }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Twitter Link</label>
                                    <input type="text" class="form-control" id="twitter" name="twitter"
                                        value="{{ $basicInfo->twitter }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Whatsapp Link</label>
                                    <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                        value="{{ $basicInfo->whatsapp }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Instagram Link</label>
                                    <input type="text" class="form-control" id="instraLink" name="instraLink"
                                        value="{{ $basicInfo->instraLink }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">YouTube Link</label>
                                    <input type="text" class="form-control" id="youTubeLink" name="youTubeLink"
                                        value="{{ $basicInfo->youTubeLink }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Google Link</label>
                                    <input type="text" class="form-control" id="google" name="google"
                                        value="{{ $basicInfo->google }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Copyright</label>
                                    <input type="text" class="form-control" id="copyright" name="copyright"
                                        value="{{ $basicInfo->copyright }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Address</label>
                                    <textarea name="address" id="address" cols="30" rows="3" class="form-control">{{ $basicInfo->address }}</textarea>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <button class="btn btn-primary" type="submit">UPDATE</button><br><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- sl-pagebody -->
    </div><!-- sl-pagebody -->
@endsection
