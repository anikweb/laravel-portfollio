@extends('backend.master')
@section('content')
<div class="page-inner">
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="active">Roles</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        {{--  Content Start  --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading clearfix">
                        <h2 class="panel-title">Roles</h2>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered m-t-sm">
                                    <thead class="text-center">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Name of Role</th>
                                            <th class="text-center">Created</th>
                                            <th class="text-center" colspan="3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->created_at->format('d-M-Y, h:i A') }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('role.show',$role->id) }}" class="btn btn-primary"><i class="icon-eye"></i> Details</a>
                                                <a href="{{ route('role.edit',$role->id) }}" class="btn btn-info"><i class="icon-note"></i> Edit</a>
                                                <a href="#" class="btn btn-danger"><i class="icon-trash"></i> Remove</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                                <div>
                                    {{ $roles->links() }}
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

