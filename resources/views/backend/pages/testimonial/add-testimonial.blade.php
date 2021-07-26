@extends('backend.master')
@section('content')
<div class="page-inner">
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="active">Testimonials</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        {{--  Content Start  --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Basic Form</h4>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('testimonialUpdate') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control m-t-xxs" id="name" placeholder="Enter name">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="designation">Designation</label>
                                        <input type="text" name="designation" class="form-control m-t-xxs" id="designation" placeholder="Enter designation">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group m-t-xxl m-l-xxl">
                                        <label class="btn btn-success" for="image"><span style="font-size: 18px" class="icon-cloud-upload"></span> Add Image</label>
                                        <input style="display: none;" type="file" name="image" class="form-control" style="padding:5px 10px !important;" id="image" onchange="document.getElementById('imagePreview').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <img id="imagePreview" width="200px" draggable="false" src="{{ asset('front/images/testimonial/default-person.png') }}" alt="Default Image">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="summary">Summary of Praise</label>
                                        <textarea name="summary" class="form-control m-t-xxs" id="summary" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-t-xs m-b-xs">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{--  Content End  --}}
    </div><!-- Main Wrapper -->
</div><!-- Page Inner -->
@endsection
