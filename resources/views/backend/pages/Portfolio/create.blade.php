@extends('backend.master')
@section('content')
<div class="page-inner">
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="active">Add Portfolio</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        {{--  Content Start  --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading clearfix">
                        <h2 class="panel-title">Portfolio Form</h2>
                    </div>
                    <div class="panel-body">
                        <form action="#"method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title">Title<span class="text-danger h4">*</span> </label>
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                        <div class="text-danger" style="padding:5px 0 !important;" >
                                            <i class="fa fa-info-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="thumbnail">Thumbnail<span class="text-danger h4">*</span> </label>
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" style="padding:6px !important;">
                                    @error('thumbnail')
                                        <div class="text-danger" style="padding:5px 0 !important;" >
                                            <i class="fa fa-info-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <img width="40%" src="{{ asset('backend/images/no-image.webp') }}" alt="no image">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="summary">Summary <span class="text-danger h4">*</span></label>
                                    <textarea name="summary" id="summary" rows="5" class="form-control @error('summary') is-invalid @endif"></textarea>
                                    @error('summary')
                                        <div class="text-danger" style="padding:5px 0 !important;" >
                                            <i class="fa fa-info-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="description">Description <span class="text-danger h4">*</span></label>
                                    <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @endif"></textarea>
                                    @error('description')
                                        <div class="text-danger" style="padding:5px 0 !important;" >
                                            <i class="fa fa-info-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="type">Type</label>
                                    <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                    @error('type')
                                        <div class="text-danger" style="padding:5px 0 !important;" >
                                            <i class="fa fa-info-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                    <div class="col-md-6">
                                        <label for="using_technology">Using Technology</label>
                                        <input type="text" name="using_technology" id="using_technology" class="form-control @error('using_technology') is-invalid @enderror">
                                        @error('using_technology')
                                        <div class="text-danger" style="padding:5px 0 !important;" >
                                            <i class="fa fa-info-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
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
    // $('.social_id').change(function(){
    //         var social_Id = $(this).val();
    //         if(social_Id){
    //             $.ajax({
    //             type: "GET",
    //             url: "{{ url('get/master-url') }}/"+social_Id,
    //             success:function(res){
    //                 if(res){
    //                     $('.master_url').html(res);
    //                 }
    //             }
    //             });
    //         }
    //     });
</script>
@endsection
