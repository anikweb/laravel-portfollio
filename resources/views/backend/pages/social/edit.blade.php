@extends('backend.master')
@section('content')
<div class="page-inner">
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="active">Edit Social</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        {{--  Content Start  --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading clearfix">
                        <h2 class="panel-title">Edit Social Form</h2>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('SocialUpdate') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <input type="hidden" name="social_pre_id" value="{{ $socialLink->id }}">
                                        <label for="social_name">Social <span class="text-danger h4">*</span></label>
                                        <select name="social_id" id="social_name" class="form-control social_id @error('social_id') is-invalid @enderror" style="padding:5px 13px !important; @error('social_id') border:1px solid red; @enderror">
                                            <option value="" class="text-muted">--SELECT--</option>
                                            @foreach ($socialName as $social)
                                                <option @if($socialLink->social_id == $social->id ) selected @endif value="{{ $social->id }}">{{ $social->site_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('social_id')
                                            <div class="text-danger" style="padding:5px 0 !important;" >
                                                <i class="fa fa-info-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="social_username">Username<span class="text-danger h4">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon master_url">https://example.com/</span>
                                            <input type="text" class="form-control @error('social_username') is-invalid @enderror" name="social_username" value="@if(old('social_username')){{ old('social_username') }}@else {{ $socialLink->url_name }}@endif" id="social_username" placeholder="Enter Username" style="@error('social_username') border:1px solid red; @enderror @if(session('userNameEror')) border:1px solid red; @endif">
                                        </div>
                                        @error('social_username')
                                            <div class="text-danger" style="padding:5px 0 !important;" >
                                                <i class="fa fa-info-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        @if (session('userNameEror'))
                                            <div class="text-danger" style="padding:5px 0 !important;" >
                                                <i class="fa fa-info-circle"></i>
                                                {{ session('userNameEror') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-12 text-center m-t-sm">
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
    @if (session('notChange'))
        toastr['error']("{{ session('notChange') }}");
    @endif
    // $('#percentage').keyup(function() {
    //     $('#percentage_label').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
    // });
    // var slider = document.getElementById("myRange");
    // var output = document.getElementById("demo");
    // output.innerHTML = slider.value;
    $('.social_id').change(function(){
        var social_Id = $(this).val();
        if(social_Id){
            $.ajax({
            type: "GET",
            url: "{{ url('get/master-url') }}/"+social_Id,
            success:function(res){
                if(res){
                    $('.master_url').html(res);
                }
            }
            });
        }
    });
</script>
@endsection
