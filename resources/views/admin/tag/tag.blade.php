@extends('layouts.admin')

@section('title')
    Tag
@endsection

@section('breadcrumb-name')
    Tag List
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
                                <a href="{{route('tag.create')}}" class="btn btn-outline-danger">Create @yield('title')</a>
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
                                        <th class="text-center">Used</th>
                                        <th class="text-center">Story Count</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($tags->count())
                                        @foreach($tags as $tag)
                                            <tr>
                                                <td>{{$tag->id}}</td>
                                                <td>{{$tag->name}}</td>
                                                <td>{{$tag->slug}}</td>
                                                <td>
                                                    <P class="text-right text-danger">{{number_format((float)(($tag->stories->count()/$story->count())*100), 2, '.', '')}}  <span class="text-dark">%</span></P>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{($tag->stories->count()/$story->count())*100}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td class="text-center">{{$tag->stories->count()}}</td>
                                                <td class="text-center d-flex justify-content-center">
                                                    <div class="text-center">
                                                        <a href="{{route('tag.show',[$tag->id])}}" class="btn btn-info btn-sm mr-3"><i class="fa fa-eye"></i></a>
                                                        <a href="{{route('tag.edit',[$tag->id])}}" class="btn btn-warning btn-sm mr-3"><i class="fa fa-edit"></i></a>
                                                    </div>
                                                    <div class="text-center">
                                                        <form action="{{route('tag.destroy',[$tag->id])}}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
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
                                {{$tags->links()}}
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
