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
                        <form action="{{ route('role.update',$role->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>{{ $role->name }}</h3>
                                </div>
                                <div class="col-md-12">
                                    <label for="permission">Choose Permission <span class="text-danger">*</span></label>
                                    @error('permissions[]')
                                        <div class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @foreach ($permissions as $permission)
                                            <input
                                                @foreach ($role->permissions as $RolePermission)
                                                    @if ($RolePermission->name == $permission->name )
                                                    checked
                                                    @endif
                                                @endforeach
                                                value="{{ $permission->name }}" type="checkbox" name="permissions[]" id="permission{{ $permission->id }}" class="@error('permissions[]') is-invalid @enderror">
                                            <label for="permission{{ $permission->id }}">{{ Illuminate\Support\Str::title($permission->name) }}</label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
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

