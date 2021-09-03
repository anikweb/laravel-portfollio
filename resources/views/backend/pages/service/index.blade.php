@extends('backend.master')
@section('content')
<div class="page-inner">
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="active">Services</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        {{--  Content Start  --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading clearfix">
                        <h2 class="panel-title">Services</h2>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered m-t-sm">
                                    <thead class="text-center">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Icon</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center" width="30%">Summary</th>
                                            <th class="text-center">Created</th>
                                            <th class="text-center">Last Update</th>
                                            <th class="text-center" colspan="3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $services->firstItem() + $loop->index  }}</td>
                                            <td>
                                                <i style="font-size: 30px" class="fa {{ $service->icon_name }}"></i>
                                            </td>
                                            <td>{{ $service->service_name }}</td>
                                            <td width="30%">{{ $service->summary }}</td>
                                            <td>{{ $service->created_at->format('d-M-Y, h:i A') }}</td>
                                            <td>{{ $service->updated_at->diffForHumans() }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('service.edit',$service->id) }}" class="btn btn-info"><i class="icon-note"></i>Edit</a>
                                                <form style="display: inline-block;" action="{{ route('service.destroy',$service->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                                <div>
                                    {{ $services->links() }}
                                </div>
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
   @if (session('success'))
        toastr["success"]("{{ session('success') }}")
    @elseif(session('fail'))
        toastr["error"]("{{ session('fail') }}")
    @endif
</script>
@endsection

