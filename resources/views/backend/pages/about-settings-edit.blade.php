@extends('backend.master')
@section('content')
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li><a href="{{ route('aboutSettings') }}">About Settings</a></li>
                <li class="active">edit {{ $slug }}</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-body">
                        <form method="post" action="{{ route('aboutSettingsUpdate') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="{{ $slug }}">@if ($slug=='about')Edit About @elseif($slug=='image')Change Image @elseif($slug=='certificates') Edit Certificates @elseif($slug=='awards') Edit Awards @elseif($slug=='degrees') Edit Degrees @elseif($slug=='experience-year')Edit Experience Year @endif
                                </label>
                                <input type="hidden" name="settingId" value="{{ $about->id }}">
                                <input type="hidden" name="settingItem" value="{{ $slug }}">
                                @if ($slug!='image' && $slug != 'about')
                                    <input type="text" class="form-control m-t-xxs" id="{{ $slug }}" value="@if($slug=='certificates'){{ $about->certificates }}@elseif($slug=='awards'){{ $about->awards }}@elseif($slug=='degrees'){{ $about->degrees }}@elseif($slug=='experience-year'){{ $about->experience_year }} @endif" name="EditableValue">
                                @elseif($slug=='about')
                                    <textarea name="EditableValue" class="form-control" id="{{ $slug }}"  rows="5">{{ $about->about }}</textarea>
                                @endif
                                @if ($slug == 'image')
                                    <div class="row">
                                        <div class="col-md-6 py-auto">
                                            <input type="file" name="EditableValue" id="{{ $slug }}" class="form-control " style="padding: 10px 10px 30px 10px !important" onchange="document.getElementById('imagePreview').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                        <div class="col-md-6">
                                            <img draggable="false" width="200px" src="{{ asset('front/images/about/'.$about->image) }}" alt="{{ $siteItem->title }}" id="imagePreview">
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


