@extends('backend.master')
@section('content')
<div class="page-inner">
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="active">Testimonials</li>
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
                                        <th style="text-align: center">Designation</th>
                                        <th style="text-align: center">Image</th>
                                        <th style="text-align: center">Praise</th>
                                        <th style="text-align: center">Created at</th>
                                        @if (auth()->user()->can('edit testimonial')||auth()->user()->can('delete testimonial'))
                                            <th colspan="2" style="text-align: center">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testimonial as $key=> $testItem)
                                        <tr>
                                            <th scope="row">{{$testimonial->firstItem()+$key }}</th>
                                            <td>{{ $testItem->name }}</td>
                                            <td>{{ $testItem->designation }}</td>
                                            <td>
                                                <img title="{{ $testItem->name }}" style="border-radius:50%" width="100px" src="{{ asset('front/images/testimonial/'.$testItem->image) }}" alt="{{ $testItem->name }}">
                                            </td>
                                            <td>{{ $testItem->praise }}</td>
                                            <td>{{ $testItem->created_at->diffForHumans() }}</td>
                                            @can('edit testimonial')
                                                <td>
                                                    <a class="btn btn-info" href="{{ route('testimonialEdit',$testItem->id) }}"><span class="icon-note"></span> Edit</a>
                                                </td>
                                            @endcan
                                            @can('delete testimonial')
                                                <td>
                                                    <button type="button" data-id="{{ $testItem->id }}" class="btn btn-danger moveTrash" href="#"><span class="icon-trash"></span> Move to Trash</button>
                                                </td>
                                            @endcan

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="">
                                {{-- {{ $testItem->links() }} --}}
                            {{ $testimonial->links() }}

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





