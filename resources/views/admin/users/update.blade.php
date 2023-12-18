@extends('admin.layouts.default')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Update user "{{$show->name}}"</h1>
                </div><!-- /.col -->
               <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{ route('admin.user.update', $show->id) }}" method="POST" class="col-6">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name-user">User name</label>
                        <input type="text" class="form-control" id="name-user" name="name" placeholder="User name" value="{{$show->name}}">
                        @error('name')
                        <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email-user">User email</label>
                        <input type="email" class="form-control" id="email-user" name="email" placeholder="User email" value="{{$show->email}}">
                        @error('email')
                        <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group w-50">
                        <label>User level (role)</label>
                        <select name="role" class="form-control">
                            <option selected disabled style="display: none" value="">Select the user level</option>
                            @foreach($roles as $id => $role)
                                <option value="{{$id}}">{{$role}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('role'))
                            <p style="color: red">The user level field is required.</p>
                        @endif
                    </div>

                    <div class="form-group w-50">
                        <input type="hidden" name="user_id" value="{{ $show->id }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update user</button>
                </form>
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
