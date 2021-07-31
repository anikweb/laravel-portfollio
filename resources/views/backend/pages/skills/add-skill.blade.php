@extends('backend.master')
@section('content')
<div class="page-inner">
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="active">Add Skill</li>
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
                        <form action="{{ route('skillUpdate') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input style="text-transform:uppercase;  @error('name')border:1px solid red; @enderror" type="text" name="name" value="{{ old('name') }}" class="form-control m-t-xxs @error('name') is-invalid @enderror" id="name" placeholder="Enter name">
                                        @error('name')
                                            <div class="text-danger"><span class="icon-info"></span> {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Percentage</label>
                                        <input  type="range" min="0" max="100" value="@if (old('percentage')!=''){{ old('percentage') }}@else{{0}}@endif" class="m-t-xxs" name="percentage" id="myRange" oninput="this.nextElementSibling.value = this.value">
                                        <output style="display: inline">@if (old('percentage')!=''){{ old('percentage') }}@else{{0}}@endif</output><span>%</span>
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
