@extends('backend.master')
@section('content')
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="active">Site Settings</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div>
                        <h4 class="h2 text-primary text-center">Site Settings</h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th width='1'>1</th>
                                        <th>Logo</th>
                                        <th>
                                            <img width="100px" style="border:1px solid rgba(165, 158, 158, 0.774);padding:3px" src="{{ asset('front/images/site-logo/'.siteInfo()->logo) }}" alt="{{ siteInfo()->title }}">
                                        </th>
                                        <th><a href="{{ route('siteSettingsEdit','logo') }}" class="btn btn-info"> <span class="icon-note"></span> Edit</a></th>
                                    </tr>
                                    <tr>
                                        <th width='1'>2</th>
                                        <th>Icon</th>
                                        <th>
                                            <img width="50px" style="border:1px solid rgba(165, 158, 158, 0.774);padding:3px" src="{{ asset('front/images/site-icon/'.siteInfo()->icon) }}" alt="{{ siteInfo()->title }}">
                                        </th>
                                        <th><a href="{{ route('siteSettingsEdit','icon') }}" class="btn btn-info"> <span class="icon-note"></span> Edit</a></th>
                                    </tr>
                                    <tr>
                                        <th width='1'>3</th>
                                        <th>Title</th>
                                        <th>{{ siteInfo()->title }}</th>
                                        <th><a href="{{ route('siteSettingsEdit','title') }}" class="btn btn-info"> <span class="icon-note"></span> Edit</a></th>
                                    </tr>
                                    <tr>
                                        <th width='1'>4</th>
                                        <th>Description</th>
                                        <th>{{ siteInfo()->description }}</th>
                                        <th><a href="{{ route('siteSettingsEdit','description') }}" class="btn btn-info"> <span class="icon-note"></span> Edit</a></th>
                                    </tr>
                                    <tr>
                                        <th width='1'>5</th>
                                        <th>Background Video</th>
                                        <th>
                                            <video width="300px" controls muted>
                                                <source src="{{ asset('front/video/background-video/'.siteInfo()->backgroundVideo) }}" type="video/mp4" >
                                            </video>
                                            <span class="text-danger"> <span class="icon-ban"></span> Sound muted in frontend</span>
                                        </th>
                                        <th><a href="{{ route('siteSettingsEdit','background-video') }}" class="btn btn-info"> <span class="icon-note"></span> Edit</a></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Main Wrapper -->

@endsection
@section('footer_js')
<script>
    @if (session('success'))
        toastr["success"]("{{ session('success') }}")
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
    @elseif(session('fail'))
    toastr["error"]("{{ session('fail') }}")

        toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        }
    @endif
</script>
@endsection

