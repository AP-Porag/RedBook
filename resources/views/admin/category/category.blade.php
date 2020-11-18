@extends('layouts.admin')

@section('title')
    Category
@endsection

@section('breadcrumb-name')
    Category List
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
                                        <th>Background</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($categories->count())
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{$category->id}}</td>
                                                <td>{{$category->name}}</td>
                                                <td>{{$category->slug}}</td>
                                                <td>{{$category->stories->count()}}</td>
                                                <td>
                                                    <div class="image" style="width: 120px;">
                                                        <img src="{{$category->background}}" alt="{{$category->name}}" class="img-fluid">
                                                    </div>
                                                </td>
                                                <td class="text-center d-flex">
                                                    <a href="{{route('category.show',[$category->id])}}" class="btn btn-info btn-sm mr-3"><i class="fa fa-eye"></i></a>
                                                    <a href="{{route('category.edit',[$category->id])}}" class="btn btn-warning btn-sm mr-3"><i class="fa fa-edit"></i></a>
                                                    <form action="{{route('category.destroy',[$category->id])}}" method="post">
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
                                {{$categories->links()}}
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
