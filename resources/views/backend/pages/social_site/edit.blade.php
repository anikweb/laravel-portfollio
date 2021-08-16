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
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="social_site_id" value="{{ $socialSite->id }}">
                                            <label for="social_site_title">Social Site Title <span class="text-danger h4">*</span></label>
                                            <input type="text" name="social_site_title" value="{{ $socialSite->site_name }}" id="social_site_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="master_url">Master URL <span class="text-danger h4">*</span></label>
                                        <div class="input-group m-b-sm">
                                            <span class="input-group-addon">https://</span>
                                            <input type="text" class="form-control" name="master_url" value="{{ $socialSite->master_url }}" id="master_url" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="social_icon">Social Icon Class <em class="text-muted"> <span class="text-danger h4">*</span> ( supported font-awesome-4 )</em></label>
                                        <input type="text" id="social_icon" name="social_icon" value="{{ $socialSite->site_icon }}" placeholder="fa fa-example" class="form-control">
                                    </div>
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
