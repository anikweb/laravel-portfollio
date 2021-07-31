@extends('backend.master')
@section('content')
<div class="page-inner">
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="active">Edit Skill</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        {{--  Content Start  --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Edit Your Skill</h4>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('skillEditUpdate') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="hidden" name="id" value="{{ $skill->id }}">
                                        <input style="text-transform:uppercase;  @error('name')border:1px solid red; @enderror" type="text" name="name" value="{{ $skill->name }}" class="form-control m-t-xxs @error('name') is-invalid @enderror" id="name">
                                        {{-- @error('name')
                                            <div class="text-danger"><span class="icon-info"></span> {{ $message }}</div>
                                        @enderror --}}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Percentage</label>
                                        <input  type="range" min="0" max="100" value="{{$skill->percentage}}" class="m-t-xxs" name="percentage" id="myRange" oninput="this.nextElementSibling.value = this.value">
                                        <output style="display: inline">{{$skill->percentage}}</output><span>%</span>
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
