@extends('backend.master')
@section('content')
<div class="page-inner">
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('PortfolioView') }}">Portfolios</a></li>
                <li class="active">{{ $portfolio->title }}</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        {{--  Content Start  --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Portfolios</h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive ">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">Title</th>
                                        <td style="text-align: center">{{ $portfolio->title }}</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;"><span class="thumb"> <strong>Thumbnail</strong></span></td>
                                        <td style="text-align: center">
                                            <img width="120px" src="{{ asset('image/portfolios').'/'.$portfolio->created_at->format('Y/m/').$portfolio->id.'/'.$portfolio->thumbnail }}" alt="{{ $portfolio->title }}">
                                        </td>
                                    </tr>
                                    <th style="text-align: center">Type</th>
                                        <td style="text-align: center">{{ $portfolio->type }}</td>
                                    <tr>
                                        <th style="text-align: center">Summary</th>
                                        <td style="text-align: center">{{ $portfolio->summary }}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center">Description</th>
                                        <td style="text-align: center">{{ $portfolio->description }}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center">Description</th>
                                        <td style="text-align: center">{{ $portfolio->description }}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center">Using Technology</th>
                                        <td style="text-align: center">{{ $portfolio->using_technology }}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center">Created at</th>
                                        <td style="text-align: center">{{ $portfolio->created_at->format('d-M-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center">Last Update</th>
                                        <td style="text-align: center">{{ $portfolio->updated_at->diffForHumans() }}</td>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <div class="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--  Content End  --}}
    </div><!-- Main Wrapper -->
</div><!-- Page Inner -->
@endsection
@section('footer_js')
<script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    // swal('hello');.
    // // testimonial delete
    $('.moveTrash').click(function(){
        var socialId = $(this).attr('data-id');
        swal({
            title: "Are you sure?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Social has been moved to trash!", {
                icon: "success",
                });
                setTimeout(function(){
                    window.location.href = "delete-social/"+socialId;
                },1000);
            } else {
                swal("Social is safe!");
            }
        });
    });
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





