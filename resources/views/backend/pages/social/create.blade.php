@extends('backend.master')
@section('content')
<div class="page-inner">
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="active">Add Social</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        {{--  Content Start  --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading clearfix">
                        <h2 class="panel-title">Social Form</h2>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('SocialPost') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="social_name">Social <span class="text-danger h4">*</span> </label>
                                        <select name="social_id" id="social_name" class="form-control" style="padding:5px 13px !important;">
                                            <option value="Social" class="text-muted">--SELECT--</option>
                                            @foreach ($socialName as $social)
                                                <option value="{{ $social->id }}">{{ $social->site_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social_username">Username <span class="text-danger h4">*</span></label>
                                            <input type="text" name="social_username" id="social_username" placeholder="Enter Username" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <input type="submit" value="Done" class="btn btn-primary">
                                    </div>
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
