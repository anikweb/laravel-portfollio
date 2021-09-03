@extends('backend.master')
@section('content')
<div class="page-inner">
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="active">Add Service</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        {{--  Content Start  --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading clearfix">
                        <h2 class="panel-title">Service Form</h2>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('service.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="service_name">Name of Service <span class="text-danger">*</span></label>
                                        <input type="text" name="service_name" value="{{ old('service_name') }}" id="service_name" class="form-control @error('service_name') is-invalid @enderror" placeholder="Enter Service Name">
                                        @error('service_name')
                                            <div class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="summary">Summary<span class="text-danger">*</span></label>
                                        <textarea style="padding:6px 8px !important" name="summary" id="summary" rows="3" class="form-control @error('summary') is-invalid @enderror" placeholder="Write Summary">@if(old('summary')){{ old('summary') }} @endif</textarea>
                                        @error('summary')
                                            <div class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="icon">{{-- ajax icon preview --}}
                                        @if (old('icon_name'))
                                            <i class="fa {{ old('icon_name') }} "></i>
                                        @endif
                                    </div>
                                    <input type="hidden" name="icon_name" id="icon_name" class="@error('icon_name') is-invalid @enderror" value="{{ old('icon_name') }}">
                                    <button data-toggle="modal" data-target="#myModal" type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> Choose Icon <span class="text-light">*</span></button>
                                    @error('icon_name')
                                        <div class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                    @enderror
                                </div>
                                {{--  Modal   --}}
                                <div class="modal fade" style="margin-top:30px !important" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: white;">&times;</span></button>
                                                <h3 class="modal-title" id="myModalLabel">Icons</h3>
                                            </div>
                                            <div class="modal-body">
                                                <ul class="list-group">
                                                    @foreach ($icons as $icon)
                                                        <li data-id="{{ $icon->id }}" data-dismiss="modal" aria-label="Close" class="close list-group-item icon-input fa {{ $icon->class }}"></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <input class="btn btn-primary" type="submit" value="Add Service">
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
@section('inline_css')
    <style>
        .modal-body{
            overflow:scroll;
        }
        .modal-body li.list-group-item{
            width:50px;
            float:left;
            border:none;
            cursor: pointer;
            font-size: 20px;
            opacity: 65% !important;
            transition: .5s ease;
        }
        .modal-body li.list-group-item:hover{
            opacity: 100%;
        }
        .icon .fa {
            font-size: 30px;
            padding: 15px;
            border: 1px solid #a39e9e;
            margin: 11px;
        }
    </style>
@endsection
@section('footer_js')
<script>
    $('.icon-input').click(function(){
        var icon_id = $(this).attr('data-id');
            if(icon_id){
                $.ajax(
                {
                    type:"GET",
                    url:"{{ url('get/icon') }}/"+icon_id,
                    success:function(res){
                        if(res){
                            // console.log(res);
                            $("#icon_name").empty();
                            $("#icon_name").val(res);
                            $(".icon").empty();
                            $(".icon").append("<i style='' class='fa "+res+" '></i>");
                        }else{
                            $("#icon_name").empty();
                        }
                    }
                });
            }else{
                $("#icon_name").empty();
                $("#icon_name").empty();
            }

    });
</script>
@endsection

