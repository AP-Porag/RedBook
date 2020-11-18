@extends('layouts.admin')

@section('title')
    Type
@endsection

@section('breadcrumb-name')
    Type List
@endsection

@section('content')

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-2">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">@yield('breadcrumb-name')</h3>
                                <a href="{{route('category.create')}}" class="btn btn-outline-danger">Create @yield('title')</a>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-hover text-nowrap table-striped">
                                    <thead class="bg-gradient-danger">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Story Count</th>
                                        <th>Description</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($types->count())
                                        @foreach($types as $type)
                                            <tr>
                                                <td>{{$type->id}}</td>
                                                <td>{{$type->name}}</td>
                                                <td>{{$type->slug}}</td>
                                                <td>{{$type->stories->count()}}</td>
                                                <td>
                                                    <p>{{$type->description}}</p>
                                                </td>
                                                <td class="text-center d-flex">
                                                    <a href="{{route('type.show',[$type->id])}}" class="btn btn-info btn-sm mr-3"><i class="fa fa-eye"></i></a>
                                                    <a href="{{route('type.edit',[$type->id])}}" class="btn btn-warning btn-sm mr-3"><i class="fa fa-edit"></i></a>
                                                    <form action="{{route('type.destroy',[$type->id])}}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="alert alert-default-danger text-danger text-center">
                                                <h5>No @yield('title') found</h5>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="pagination justify-content-end">
                                {{$types->links()}}
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
