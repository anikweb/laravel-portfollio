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
                        <form action="{{ route('role.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="role_name">Name of Role <span class="text-danger">*</span></label>
                                        <input type="text" name="role_name" value="{{ old('role_name') }}" id="role_name" class="form-control @error('role_name') is-invalid @enderror">
                                        @error('role_name')
                                            <div class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                        @enderror
                                    </div>
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
                                            <input value="{{ $permission->name }}" type="checkbox" name="permissions[]" id="permission{{ $permission->id }}" class="@error('permissions[]') is-invalid @enderror">
                                            <label for="permission{{ $permission->id }}">{{ Illuminate\Support\Str::title($permission->name) }}</label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <input class="btn btn-primary" type="submit" value="Add Role">
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

