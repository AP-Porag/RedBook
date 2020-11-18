@extends('layouts.admin')

@section('title')
    Story
@endsection

@section('breadcrumb-name')
    Story List
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
                                <a href="{{route('story.create')}}"
                                   class="btn btn-outline-danger">Create @yield('title')</a>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-hover text-nowrap table-striped">
                                    <thead class="bg-gradient-danger">
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Story</th>
                                        <th>Chapter Count</th>
                                        <th>Tags</th>
                                        <th>Thumbnail</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($stories->count())
                                        @foreach($stories as $story)
                                            <tr>
                                                <td>{{$story->id}}</td>
                                                <td>{{$story->category->name}}</td>
                                                <td>{{$story->type->name}}</td>
                                                <td>{{ Str::limit($story->name, 20)}}</td>
                                                <td>{{ Str::limit($story->story, 50)}}</td>
                                                <td>
                                                    @if($story->chapters->count() > 0)
                                                        {{$story->chapters->count()}}
                                                    @else
                                                        {{$story->type->name}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @foreach($story->tags as $tag)
                                                        <span class="badge badge-primary">{{$tag->name}}</span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <div class="image" style="width: 120px;">
                                                        <img src="{{$story->thumbnail}}" alt="{{$story->name}}"
                                                             class="img-fluid">
                                                    </div>
                                                </td>
                                                <td class="text-center d-flex">
                                                    <a href="{{route('story.show',[$story->id])}}"
                                                       class="btn btn-info btn-sm mr-3"><i class="fa fa-eye"></i></a>
                                                    <a href="{{route('story.edit',[$story->id])}}"
                                                       class="btn btn-warning btn-sm mr-3"><i
                                                            class="fa fa-edit"></i></a>
                                                    <form action="{{route('story.destroy',[$story->id])}}"
                                                          method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-trash"></i></button>
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
                                {{$stories->links()}}
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
