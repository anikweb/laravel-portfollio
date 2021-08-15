@extends('backend.master')
@section('content')
<div class="page-inner">
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="active">Socials</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        {{--  Content Start  --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Socials</h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">#</th>
                                        <th style="text-align: center">Social Site Title</th>
                                        <th style="text-align: center">Master URL</th>
                                        <th style="text-align: center">Icon <em class="text-muted">(Supported font-awesome 4)</em></th>
                                        <th style="text-align: center">Last Update</th>
                                        <th colspan="2" style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($social_sites as $social_site)
                                        <tr>
                                            <th style="text-align: center" scope="row">{{$social_sites->firstItem()+$loop->index }}</th>
                                            <td style="text-align: center">{{ $social_site->site_name }}</td>
                                            <td style="text-align: center">{{ $social_site->master_url }}</td>
                                            <td style="text-align: center">{{ $social_site->site_icon }}</td>
                                            <td style="text-align: center">{{ $social_site->updated_at->diffForHumans() }}</td>
                                            <td style="text-align: center">
                                                <a class="btn btn-primary" target="_blank" href="{{ $social_site->master_url }}"><span class="  icon-paper-plane"></span> Visit</a>
                                                <a class="btn btn-info" href=""><span class="icon-note"></span> Edit</a>
                                                <button type="button" data-id="{{ $social_site->id }}" class="btn btn-danger moveTrash" href="#"><span class="icon-trash"></span> Move to Trash</button>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="">
                                {{-- {{ $testItem->links() }} --}}
                            {{ $social_sites->links() }}

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
        var testId = $(this).attr('data-id');
        swal({
            title: "Are you sure?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Testimonial has been deleted!", {
                icon: "success",
                });
                setTimeout(function(){
                    window.location.href = "testimonial-delete/"+testId;
                },1000);
            } else {
                swal("Testimonial is safe!");
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




