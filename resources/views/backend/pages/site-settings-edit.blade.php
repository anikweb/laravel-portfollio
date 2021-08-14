@extends('backend.master')
@section('content')
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li><a href="{{ route('siteSettings') }}">Site Settings</a></li>
                <li class="active">edit {{ $slug }}</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-body">
                        <form method="post" action="{{ route('siteSettingsUpdate') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="{{ $slug }}">@if ($slug=='logo')Change Logo @elseif($slug=='icon')Change Icon @elseif($slug=='title') Edit Title @elseif($slug=='description') Edit Description @elseif($slug=='background-video') Edit Background Video @endif
                                </label>
                                <input type="hidden" name="settingId" value="{{ siteInfo()->id }}">
                                <input type="hidden" name="settingItem" value="{{ $slug }}">
                                @if ($slug != 'logo' && $slug != 'icon' && $slug != 'background-video' && $slug != 'site-color')
                                    <input type="text" class="form-control m-t-xxs" id="{{ $slug }}" value="@if($slug=='title'){{ siteInfo()->title }}@elseif($slug=='description'){{ siteInfo()->description }}@endif" name="EditableValue">
                                @endif
                                @if ($slug == 'logo')
                                    <div class="row">
                                        <div class="col-md-6 py-auto">
                                            <input type="file" name="EditableValue" id="{{ $slug }}" class="form-control " style="padding: 10px 10px 30px 10px !important" onchange="document.getElementById('logoPreview').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                        <div class="col-md-6">
                                            <img draggable="false" width="200px" style="border:1px solid rgb(172, 170, 170);padding:3px;" src="{{ asset('front/images/site-logo/'.siteInfo()->logo) }}" alt="{{ $slug }}" id="logoPreview">
                                        </div>
                                    </div>
                                @elseif ($slug == 'icon')
                                    <div class="row">
                                        <div class="col-md-6 py-auto">
                                            <input type="file" name="EditableValue" id="{{ $slug }}" class="form-control " style="padding: 10px 10px 30px 10px !important" onchange="document.getElementById('iconPreview').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                        <div class="col-md-6">
                                            <img draggable="false" width="100px" style="border:1px solid rgb(172, 170, 170);padding:3px;" src="{{ asset('front/images/site-icon/'.siteInfo()->icon) }}" alt="{{ $slug }}" id="iconPreview">
                                        </div>
                                    </div>
                                @elseif($slug == 'background-video')
                                    <div class="row">
                                        <div class="col-md-6 py-auto">
                                            <input type="file" name="EditableValue" id="video_p" class="form-control " style="padding: 10px 10px 30px 10px !important" onchange="document.getElementById('iconPreview').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                        <div class="col-md-6">
                                            <video width="300px" controls muted class="video">
                                                <source src="{{ asset('front/video/background-video/'.siteInfo()->backgroundVideo) }}" type="video/mp4" >
                                            </video>
                                            <span class="text-danger"> <span class="icon-ban"></span> Sound will muted in frontend</span>

                                        </div>
                                    </div>
                                @endif
                            </div>
                                <input type="submit" class="btn btn-info m-t-xs m-b-xs" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- Main Wrapper -->

@endsection
@section('footer_js')
<script>
    $ ("#video_p").change(function () {
        var fileInput = document.getElementById('video_p');
        var fileUrl = window.URL.createObjectURL(fileInput.files[0]);
        $(".video").attr("src", fileUrl);
    });
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


