@extends('layouts.admin')

@section('title')
    Story
@endsection
@section('before-path')
    Story List
@endsection
@section('breadcrumb-name')
    Show Story
@endsection
@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-2 bg-gradient-danger">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Details @yield('title') - <strong>{{$story->name}}</strong></h3>
                                <div class="buttons">
                                    <a href="{{route('story.index')}}" class="btn btn-outline-light">@yield('title')
                                        List</a>
                                    <a href="{{route('story.edit',[$story->id])}}" class="btn btn-outline-light">Edit @yield('title')</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="d-flex">
                                        <p><strong class="text-danger">Name : </strong> {{$story->name}}</p>
                                    </div>
                                    <div class="d-flex">
                                        <p><strong class="text-danger">ID : </strong> {{$story->user->name}}</p>
                                    </div>
                                    <div class="d-flex">
                                        <p><strong class="text-danger">@yield('title') : </strong> {{$story->category->name}}</p>
                                    </div>
                                    <div class="d-flex">
                                        <p><strong class="text-danger">Type : </strong> {{$story->type->name}}</p>
                                    </div>
                                    <div class="d-flex">
                                        <p><strong class="text-danger">Create Date : </strong> {{$story->created_at->diffForHumans()}}</p>
                                    </div>
                                    <div class="d-flex">
                                        @foreach($story->tags as $tag)
                                            <span class="badge badge-danger text-md mr-2 p-2">{{$tag->name}}</span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="d-flex">
                                        <p><strong class="text-danger">Like</strong></p>
                                    </div>
                                    <div class="d-flex">
                                        <p><strong class="text-danger">Comment</strong></p>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Story Thumbnail</h3>
                                        </div>
                                        <div class="card-img">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <img src="{{$story->thumbnail}}" alt="{{$story->name}}" class="img-fluid">
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <img src="{{$story->thumbnail}}" alt="{{$story->name}}" class="img-fluid">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <img src="{{$story->thumbnail}}" alt="{{$story->name}}" class="img-fluid">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <img src="{{$story->thumbnail}}" alt="{{$story->name}}" class="img-fluid">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <img src="{{$story->thumbnail}}" alt="{{$story->name}}" class="img-fluid">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <img src="{{$story->thumbnail}}" alt="{{$story->name}}" class="img-fluid">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <img src="{{$story->thumbnail}}" alt="{{$story->name}}" class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    {!! $story->story !!}
                                </div>
                            </div>



                        </div>
                        <div class="card-footer bg-gradient-danger d-flex justify-content-end">
                            <a href="{{route('story.edit',[$story->id])}}" class="btn btn-outline-light">Edit @yield('title')</a>
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
