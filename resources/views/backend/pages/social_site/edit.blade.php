@extends('backend.master')
@section('content')
<div class="page-inner">
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="active">Edit Social Site</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        {{--  Content Start  --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading clearfix">
                        <h2 class="panel-title">Edit Social Site Form</h2>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('SocialSiteUpdate') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" name="social_site_id" value="{{ $socialSite->id }}">
                                        <label for="social_site_title">Social Site Title <span class="text-danger h4">*</span></label>
                                        <input type="text" name="social_site_title" value="@if(old('social_site_title')){{old('social_site_title')}}@else{{$socialSite->site_name}}@endif" id="social_site_title" class="form-control @error('social_site_title') is-invalid @enderror" style="@error('social_site_title') border:1px solid red @enderror">
                                    </div>
                                    @error('social_site_title')
                                        <div class="text-danger"><i class="fa fa-info-circle"></i>{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="master_url">Master URL <span class="text-danger h4">*</span></label>
                                    <div class="input-group m-b-sm">
                                        <span class="input-group-addon">https://</span>
                                        <input type="text" class="form-control @error('master_url') is-invalid @enderror" name="master_url" value="@if(old('master_url')){{old('master_url')}}@else{{$socialSite->master_url}}@endif" id="master_url" style="@error('master_url') border:1px solid red; @enderror @if(session('userNameEror'))border:1px solid red; @endif">
                                    </div>
                                    @error('master_url')
                                        <div class="text-danger"><i class="fa fa-info-circle"></i>{{ $message }}</div>
                                    @enderror
                                    @if (session('userNameEror'))
                                        <div class="text-danger" style="padding:5px 0 !important;" >
                                            <i class="fa fa-info-circle"></i>
                                            {{ session('userNameEror') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="social_icon">Social Icon Class <em class="text-muted"> <span class="text-danger h4">*</span> ( supported font-awesome-4 )</em></label>
                                    <input type="text" id="social_icon" name="social_icon" value="@if(old('social_icon')){{old('social_icon')}}@else{{$socialSite->site_icon}}@endif" placeholder="fa fa-example" class="form-control @error('social_icon') is-invalid @enderror" style="@error('social_icon') border:1px solid red @enderror">
                                    @error('social_icon')
                                        <div class="text-danger"><i class="fa fa-info-circle"></i>{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 text-center" style="padding:10px 0;">
                                    <input type="submit" value="Add" class="btn btn-primary">
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
    @if (session('notChange'))
        toastr['error']("{{ session('notChange') }}");
    @endif
    // $('#percentage').keyup(function() {
    //     $('#percentage_label').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
    // });
    // var slider = document.getElementById("myRange");
    // var output = document.getElementById("demo");
    // output.innerHTML = slider.value;
</script>
@endsection
