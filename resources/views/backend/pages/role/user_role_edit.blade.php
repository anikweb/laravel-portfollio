@extends('backend.master')
@section('content')
<div class="page-inner">
    <div class="page-title">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="active">Edit User Role</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        {{--  Content Start  --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading clearfix">
                        <h2 class="panel-title">Edit User Role</h2>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('user.role.edit.post') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $user->id }}" name="user_id">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>{{ $user->name }} ({{ $user->email }})</h3>
                                </div>
                                <div class="col-md-12">
                                    <table>
                                        <thead >
                                            <th class="text-danger">X</th>
                                            <th>Roles</th>
                                        </thead>
                                        @foreach ($user->roles as $role)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" value="{{ $role->name }}" name="current_role[]" id="{{ $role->id }}">
                                                </td>
                                                <td>
                                                    <label for="{{ $role->id }}">{{ $role->name }}</label>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="col-md-12 m-t-sm">
                                    <div class="form-group">
                                        <label for="new_role">Add New Role</label>
                                        <select name="new_role" id="new_role" class="form-control" style="padding:5px 13px !important;">
                                            <option value="">-Select-</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">{{$role->name}}-</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center m-t-sm">
                                    <input class="btn btn-primary" type="submit" value="Update">
                                </div>
                            </div>
                        </form>
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
        toastr['success']("{{ session('success') }}")
    @elseif(session('fail'))
        toastr['error']("{{ session('fail') }}")
    @endif
</script>
@endsection

