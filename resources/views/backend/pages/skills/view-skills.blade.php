@extends('backend.master')
@section('content')
<div class="page-inner">
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="active">Skiils</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        {{--  Content Start  --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Responsive table</h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">#</th>
                                        <th style="text-align: center">Name</th>
                                        <th style="text-align: center">Percentage</th>
                                        <th style="text-align: center">Created at</th>
                                        <th colspan="2" style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($skills as $key=> $skillItem)
                                        <tr>
                                            <th style="text-align: center" scope="row">{{$skills->firstItem()+$key }}</th>
                                            <td style="text-align: center">{{ $skillItem->name }}</td>
                                            <td style="text-align: center">{{ $skillItem->percentage.'%' }}</td>
                                            <td style="text-align: center">{{ $skillItem->created_at->diffForHumans() }}</td>
                                            <td style="text-align: center">
                                                <a class="btn btn-info" href="{{ route('skillEdit',$skillItem->id) }}"><span class="icon-note"></span> Edit</a>
                                            </td>
                                            <td style="text-align: center">
                                                <button type="button" data-id="{{ $skillItem->id }}" class="btn btn-danger moveTrash" href="#"><span class="icon-trash"></span> Move to Trash</button>
                                            </td>
                                        </tr>
                                    @empty
                                    <td style="text-align: center" colspan="5" class="text-danger">Skills Empty</td>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="">
                                {{-- {{ $testItem->links() }} --}}
                            {{ $skills->links() }}

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
<script>
    // Skills delete
    $('.moveTrash').click(function(){
        var skillId = $(this).attr('data-id');
        // alert();
        swal({
            title: "Are you sure?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Skill has been deleted!", {
                icon: "success",
                });
                setTimeout(function(){
                    window.location.href = "delete-skill/"+skillId;
                },1000);
            } else {
                swal("Skill is safe!");
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





