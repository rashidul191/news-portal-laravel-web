@extends('admin.layouts.master')
@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="admin_home.php">HOME</a>
            <span class="breadcrumb-item active">Basic Informations</span>
        </nav>
        <div class="sl-pagebody">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="table-dark text-center" colspan="2">BASIC INFORMATIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th> Name</th>
                                        <td class="text-center">{{ $basicInfo->name }}</td>

                                    </tr>
                                    <tr>
                                        <th> E-mail</th>
                                        <td class="text-center">{{ $basicInfo->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td class="text-center">{{ $basicInfo->phone_no }}</td>
                                    </tr>
                                    <tr>
                                        <th>Chief Adviser</th>
                                        <td class="text-center">{{ $basicInfo->chiefAdviser }}</td>
                                    </tr>
                                    <tr>
                                        <th>Editor</th>
                                        <td class="text-center">{{ $basicInfo->editor }}</td>
                                    </tr>
                                    <tr>
                                        <th>Adviser Editor</th>
                                        <td class="text-center">{{ $basicInfo->adviserEditor }}</td>
                                    </tr>
                                    <tr>
                                        <th class="pt-5"> Fav Icon</th>
                                        <td class="text-center"><img
                                                src="{{ asset('public/upload/' . $basicInfo->fav_icon) }}" width="200"
                                                height="80" alt=""></td>
                                    </tr>
                                    <tr>
                                        <th class="pt-5"> Logo</th>
                                        <td class="text-center"><img src="{{ asset('public/upload/' . $basicInfo->logo) }}"
                                                width="200" height="80" alt=""></td>
                                    </tr>
                                    <tr>
                                        <th class="pt-5">Footer Logo</th>
                                        <td class="text-center"><img
                                                src="{{ asset('public/upload/' . $basicInfo->footerLogo) }}" width="200"
                                                height="80" alt=""></td>
                                    </tr>
                                    <tr>
                                        <th>Facebook Link</th>
                                        <td class="text-center">{{ $basicInfo->fb_link }}</td>
                                    </tr>
                                    <tr>
                                        <th>Twitter Link</th>
                                        <td class="text-center">{{ $basicInfo->twitter }}</td>
                                    </tr>
                                    <tr>
                                        <th>Whatsapp Link</th>
                                        <td class="text-center">{{ $basicInfo->whatsapp }}</td>
                                    </tr>
                                    <tr>
                                        <th>Instagram Link</th>
                                        <td class="text-center">{{ $basicInfo->instraLink }}</td>
                                    </tr>
                                    <tr>
                                        <th>YouTube Link</th>
                                        <td class="text-center">{{ $basicInfo->youTubeLink }}</td>
                                    </tr>
                                    <tr>
                                        <th>Google Link</th>
                                        <td class="text-center">{{ $basicInfo->google }}</td>
                                    </tr>
                                    <tr>
                                        <th>Copyright</th>
                                        <td class="text-center">{{ $basicInfo->copyright }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td class="text-center">{{ $basicInfo->address }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <a href="{{ url('basic/info/' . $basicInfo->id . '/edit') }}"
                                                class="btn btn-primary">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-center">THINKS UPDATE YOUR BASIC INFORMATION
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- sl-pagebody -->


    </div>
@endsection