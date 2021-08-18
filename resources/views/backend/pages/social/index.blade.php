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
                <div class="panel panel-primary">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Socials</h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive ">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align: center" width="120px">Priority</th>
                                        <th style="text-align: center">Social Name</th>
                                        <th style="text-align: center">Username</th>
                                        <th style="text-align: center">Last Update</th>
                                        <th colspan="2" style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($social as $socialItem)
                                        <tr>
                                            <td style="text-align: center">
                                                <span class="priority-span" style="cursor: pointer">{{ $socialItem->priority }}</span>
                                                <a data-toggle="modal" data-target="#myModal{{ $socialItem->id }}" title="change priority" href="#" class="text-info priority-edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                            <td style="text-align: center">{{ $socialItem->socialSite->site_name }}</td>
                                            <td style="text-align: center">{{ 'https://'.$socialItem->socialSite->master_url.'/'.$socialItem->url_name }}</td>
                                            <td style="text-align: center">{{ $socialItem->updated_at->diffForHumans() }}</td>
                                            <td style="text-align: center">
                                                <a class="btn btn-primary" target="_blank" href="{{ 'https://'.$socialItem->socialSite->master_url.'/'.$socialItem->url_name }}"><span class="  icon-paper-plane"></span> Visit</a>
                                                <a class="btn btn-info" href="{{ route('socialEdit',$socialItem->id) }}"><span class="icon-note"></span> Edit</a>
                                                <button type="button" data-id="{{ $socialItem->id }}" class="btn btn-danger moveTrash" href="#"><span class="icon-trash"></span> Move to Trash</button>
                                            </td>
                                            {{--  Modal   --}}
                                            <div class="modal fade" style="margin-top:30px !important" id="myModal{{ $socialItem->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: white;">&times;</span></button>
                                                            <h3 class="modal-title" id="myModalLabel">Change Priority</h3>
                                                        </div>
                                                        <form action="{{ route('socialPriorityUpdate') }}" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="hidden"  value="{{ $socialItem->id }}" name="social_id">
                                                                <label for="social_priority">{{ $socialItem->socialSite->site_name }}</label>
                                                                <input type="number" id="social_priority" value="{{ $socialItem->priority }}" name="social_priority" class="form-control">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="5" class="h4">No data to show.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="">
                                {{-- {{ $testItem->links() }} --}}
                            {{ $social->links() }}

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
@section('inline_css')
    <style>
        @media only screen and (min-width: 900px) {
            .priority-edit{
                display: none;
            }
            .priority-span:hover + .priority-edit{
                display: inline-block;
            }
            .priority-edit:hover{
                display: inline-block;
            }
        }

    </style>
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





