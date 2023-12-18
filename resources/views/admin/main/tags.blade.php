@extends('admin.layouts.default')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tags</h1>
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
                <div class="col-4">
                    <a href="{{ route('admin.tag.create') }}" class="btn btn-block btn-primary btn-lg">Add new tag</a>
                </div>
            </div>
            <div class="row">
                <div class="col-6 mt-3">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tag</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->title }}</td>
                                        <td><a href="{{ route('admin.tag.show', $tag->id) }}">SHOW</a></td>
                                        <td><a href="{{ route('admin.tag.edit', $tag->id) }}">EDIT</a></td>
                                        <td>
                                            <form action="{{ route('admin.tag.delete', $tag->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="text-danger bg-transparent border-0"><strong>DELETE</strong></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
