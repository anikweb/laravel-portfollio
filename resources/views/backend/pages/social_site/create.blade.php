@extends('backend.master')
@section('content')
<div class="page-inner">
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="active">Add Social Site</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        {{--  Content Start  --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading clearfix">
                        <h2 class="panel-title">Social Site Form</h2>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('SocialSitePost') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social_site_title">Social Site Title <span class="text-danger h4">*</span></label>
                                            <input type="text" name="social_site_title" value="{{ old('social_site_title') }}" id="social_site_title" placeholder="Enter Social Site Title" class="form-control @error('social_site_title') is-invalid @enderror" style="@error('social_site_title') border:1px solid red @enderror">
                                        </div>
                                        @error('social_site_title')
                                            <div class="text-danger"> <i class="fa fa-info-circle"></i> {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="master_url">Master URL <span class="text-danger h4">*</span></label>
                                        <div class="input-group m-b-sm">
                                            <span class="input-group-addon">https://</span>
                                            <input type="text" class="form-control @error('master_url') is-invalid @enderror" name="master_url" value="{{ old('master_url') }}" id="master_url" placeholder="example.com" style="@error('master_url') border:1px solid red; @enderror @if(session('userNameEror'))border:1px solid red @endif">
                                        </div>
                                        @error('master_url')
                                           <div class="text-danger"> <i class="fa fa-info-circle"></i> {{ $message }}</div>
                                        @enderror
                                        @if (session('userNameEror'))
                                            <div class="text-danger" style="padding:5px 0 !important;" >
                                                <i class="fa fa-info-circle"></i>
                                                {{ session('userNameEror') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 m-b-sm">
                                    <label for="social_icon">Social Icon Class <em class="text-muted"> <span class="text-danger h4">*</span> ( supported font-awesome-4.7 )</em></label>
                                    <input type="text" id="social_icon" name="social_icon" value="{{ old('social_icon') }}" placeholder="fa fa-example" class="form-control @error('social_icon') is-invalid @enderror" style="@error('social_icon') border:1px solid red @enderror">
                                    @error('social_icon')
                                        <div class="text-danger"> <i class="fa fa-info-circle"></i> {{ $message }}</div>
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
    // $('#percentage').keyup(function() {
    //     $('#percentage_label').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
    // });
    // var slider = document.getElementById("myRange");
    // var output = document.getElementById("demo");
    // output.innerHTML = slider.value;
</script>
@endsection
