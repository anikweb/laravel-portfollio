@extends('backend.master')
@section('content')
<div class="page-inner">
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="active">Portfolios</li>
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
                                        <th style="text-align: center">#</th>
                                        <th style="text-align: center">Title</th>
                                        <th style="text-align: center">Summary</th>
                                        <th style="text-align: center">Thumbnail</th>
                                        <th style="text-align: center">Last Update</th>
                                        <th colspan="2" style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($portfolios as $portfolio)
                                        <tr>
                                            <td style="text-align: center">1</td>
                                            <td style="text-align: center">{{ $portfolio->title }}</td>
                                            <td style="text-align: center">{{ $portfolio->summary }}</td>
                                            <td style="text-align: center">{{ $portfolio->thumbnail }}</td>
                                            <td style="text-align: center">{{ $portfolio->created_at->diffForHumans() }}</td>
                                            <td style="text-align: center">
                                                <a href="" class="btn btn-success"><i class="fa fa-eye"></i> Details</a>
                                                <a href="" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="6" class="h4">No data to show.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="">
                            {{-- {{ $social->links() }} --}}
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





