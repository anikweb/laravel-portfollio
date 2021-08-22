@extends('backend.master')
@section('content')
<div class="page-inner">
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li><a href="{{ route('PortfolioView') }}">Portfolios</a></li>
                <li class="active">{{ $portfolio->title }} - Edit</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        {{--  Content Start  --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading clearfix">
                        <h2 class="panel-title">Edit Portfolio</h2>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('PortfolioUpdate') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $portfolio->slug }}" name="portfolio_slug">
                            <div class="row m-t-sm">
                                <div class="col-md-6">
                                    <label for="title">Title<span class="text-danger h4">*</span> </label>
                                    <input type="text" name="title" value="@if(old('title')){{old('title')}}@else{{$portfolio->title}}@endif" id="title" class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                        <div class="text-danger" style="padding:5px 0 !important;" >
                                            <i class="fa fa-info-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="thumbnail">Thumbnail<span class="text-danger h4">*</span> </label>
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" style="padding:6px !important;" onchange="document.getElementById('ThumbnailPreview').src = window.URL.createObjectURL(this.files[0])">
                                    @error('thumbnail')
                                        <div class="text-danger" style="padding:5px 0 !important;" >
                                            <i class="fa fa-info-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <img id="ThumbnailPreview" width="40%" src="{{ asset('image/portfolios').'/'.$portfolio->created_at->format('Y/m/').$portfolio->id.'/'.$portfolio->thumbnail }}" alt="no image">
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6">
                                    <label for="summary">Summary <span class="text-danger h4">*</span></label>
                                    <textarea name="summary" id="summary" rows="5" class="form-control @error('summary') is-invalid @enderror">@if(old('summary')){{old('summary')}}@else{{$portfolio->summary}}@endif</textarea>
                                    @error('summary')
                                        <div class="text-danger" style="padding:5px 0 !important;" >
                                            <i class="fa fa-info-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="description">Description <span class="text-danger h4">*</span></label>
                                    <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror">@if(old('description')){{old('description')}}@else{{$portfolio->description}}@endif</textarea>
                                    @error('description')
                                        <div class="text-danger" style="padding:5px 0 !important;" >
                                            <i class="fa fa-info-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row m-t-sm">
                                <div class="col-md-6">
                                    <label for="type">Type<span class="text-danger h4">*</span></label>
                                    <input type="text" name="type" value="@if(old('type')){{old('type')}}@else{{$portfolio->type}}@endif" id="type" class="form-control @error('type') is-invalid @enderror">
                                    @error('type')
                                        <div class="text-danger" style="padding:5px 0 !important;" >
                                            <i class="fa fa-info-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- <div class="col-md-6">
                                    <label for="using_technology">Using Technology</label>
                                    <input type="text" name="using_technology" id="using_technology" class="form-control @error('using_technology') is-invalid @enderror">
                                    @error('using_technology')
                                        <div class="text-danger" style="padding:5px 0 !important;" >
                                            <i class="fa fa-info-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="using_technology">Using Technology<span class="text-danger h4">*</span></label>
                                        <input type="text" data-role="tagsinput" class="form-control @error('using_technology') @enderror" name="using_technology" value="@if(old('using_technology')){{old('using_technology')}}@else{{$portfolio->using_technology}}@endif" id="using_technology">
                                        @error('using_technology')
                                        <div class="text-danger" style="padding:5px 0 !important;" >
                                            <i class="fa fa-info-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 text-center m-t-sm">
                                    <input type="submit" value="Done" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{--  Content End  --}}
    </div><!-- Main Wrapper -->
</div><!-- Page Inner -->
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
