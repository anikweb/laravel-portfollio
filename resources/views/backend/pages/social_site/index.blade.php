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
                        <h4 class="panel-title">Social Sites</h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
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
                                    @forelse ($social_sites as $social_site)
                                        <tr>
                                            <th style="text-align: center" scope="row">{{$social_sites->firstItem()+$loop->index }}</th>
                                            <td style="text-align: center">{{ $social_site->site_name }}</td>
                                            <td style="text-align: center">{{ 'https://'.$social_site->master_url }}</td>
                                            <td style="text-align: center">
                                                <i class="{{ $social_site->site_icon }} bg-gray text-white p-5" style="color:#000000;border-radius:5px;padding:5px; font-size: 20px;"></i>
                                            </td>
                                            <td style="text-align: center">{{ $social_site->updated_at->diffForHumans() }}</td>
                                            <td style="text-align: center">
                                                <a class="btn btn-primary" target="_blank" href="{{ 'https://'.$social_site->master_url }}"><span class="  icon-paper-plane"></span> Visit</a>
                                                <a class="btn btn-info" href="{{ route('SocialSiteEdit',$social_site->id) }}"><span class="icon-note"></span> Edit</a>
                                                <button type="button" data-id="{{ $social_site->id }}" class="btn btn-danger moveTrash" href="#"><span class="icon-trash"></span> Move to Trash</button>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="6" class="h4">No data to show</td>
                                        </tr>
                                    @endforelse
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
        var siteId = $(this).attr('data-id');
        swal({
            title: "Are you sure?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Social Site has been moved to trash!", {
                icon: "success",
                });
                setTimeout(function(){
                    window.location.href = "delete-social-site/"+siteId;
                },1000);
            } else {
                swal("Social Site is safe!");
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





