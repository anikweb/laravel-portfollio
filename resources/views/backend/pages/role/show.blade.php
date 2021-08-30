@extends('backend.master')
@section('content')
<div class="page-inner">
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li><a href="{{ route('role.index') }}">Roles</a></li>
                <li class="active">{{ $role->name }}</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        {{--  Content Start  --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading clearfix">
                        <h2 class="panel-title">{{ $role->name }}</h2>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered m-t-sm">
                                        <tr>
                                            <td style="font-weight:bold">Name of Role</td>
                                            <td>{{ $role->name }}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold">Permissions</td>
                                            <td>
                                                <ol>
                                                    @foreach ($role->permissions as $permission)
                                                    <li>{{ Illuminate\Support\Str::title($permission->name) }}</li>
                                                    @endforeach
                                                </ol>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold">Users</td>
                                            <td>
                                                <ol>
                                                    @forelse ($role->users as $user)
                                                        <li>{{ $user->name }} ({{ $user->email }})</li>
                                                    @empty
                                                        <span> <i class="icon-info"></i> No User Assigned</span>
                                                    @endforelse
                                                </ol>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold">Created</td>
                                            <td>{{ $role->created_at->format('d-M-Y, h:i A') }}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold">Last Update</td>
                                            <td>{{ $role->created_at->diffForHumans() }}</td>
                                        </tr>
                                    </table>
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

