@extends('backend.master')
@section('content')
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="active">About Settings</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div>
                        <h4 class="h2 text-primary text-center">About Settings</h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th width="2px">1</th>
                                        <th>About</th>
                                        <th>
                                            <p>{{ $about->about }}</p>
                                        </th>
                                        <th>
                                            <a class="btn btn-info" href="{{ route('aboutSettingsEdit','about') }}"> <span class="icon-note"></span> Edit</a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th width="2px">2</th>
                                        <th>Image</th>
                                        <th>
                                            <img width="150px" src="{{ asset('front/images/about/'.$about->image) }}" alt="">
                                        </th>
                                        <th>
                                            <a style="margin: 100px 0 !important;" class="btn btn-info" href="{{ route('aboutSettingsEdit','image') }}"> <span class="icon-note"></span> Edit</a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th width="2px">3</th>
                                        <th>Certificates</th>
                                        <th>
                                            <p>{{ $about->certificates }}</p>
                                        </th>
                                        <th>
                                            <a class="btn btn-info" href="{{ route('aboutSettingsEdit','certificates') }}"> <span class="icon-note"></span> Edit</a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th width="2px">4</th>
                                        <th>Awards</th>
                                        <th>
                                            <p>{{ $about->awards }}</p>
                                        </th>
                                        <th>
                                            <a class="btn btn-info" href="{{ route('aboutSettingsEdit','awards') }}"> <span class="icon-note"></span> Edit</a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th width="2px">5</th>
                                        <th>Degrees</th>
                                        <th>
                                            <p>{{ $about->degrees }}</p>
                                        </th>
                                        <th>
                                            <a class="btn btn-info" href="{{ route('aboutSettingsEdit','degrees') }}"> <span class="icon-note"></span> Edit</a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th width="2px">6</th>
                                        <th>Experience Year</th>
                                        <th>
                                            <p>{{ $about->experience_year }}</p>
                                        </th>
                                        <th>
                                            <a class="btn btn-info" href="{{ route('aboutSettingsEdit','experience-year') }}"> <span class="icon-note"></span> Edit</a>
                                        </th>
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

