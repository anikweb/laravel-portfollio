@extends('backend.master')
@section('content')
<div class="page-inner">
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="active">Add Role</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        {{--  Content Start  --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading clearfix">
                        <h2 class="panel-title">Role Form</h2>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('assign.user.post') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="user_id">User </label>
                                        <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror" style="padding:5px 13px !important;">
                                            <option value="">-Select-</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                            <div class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="role_name">Select Role</label>
                                        <select name="role_name" id="role_name" class="form-control @error('role_name') is-invalid @enderror" style="padding:5px 13px !important;">
                                            <option value="">-Select-</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">{{$role->name}}-</option>
                                            @endforeach
                                        </select>
                                        @error('role_name')
                                            <div class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 text-center m-t-sm">
                                    <input class="btn btn-primary" type="submit" value="Assign User">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{--  Content End  --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading clearfix">
                        <div class="panel-title">Users</div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th colspan="3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @foreach ($user->roles as $role)
                                                        <li>{{ $role->name }}</li>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a href="{{ route('user.role.edit',$user->id) }}" class="btn btn-info"><i class="icon-note"></i> Edit</a>
                                                    <a href="#" class="btn btn-danger"><i class="icon-trash"></i> Remove</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Main Wrapper -->
</div><!-- Page Inner -->
@endsection
@section('footer_js')
<script>
    @if (session('success'))
        toastr['success']("{{ session('success') }}")
    @elseif(session('fail'))
        toastr['error']("{{ session('fail') }}")
    @endif
</script>
@endsection


