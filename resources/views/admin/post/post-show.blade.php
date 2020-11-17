@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{route('post.index')}}">Post List</a></li>
                        <li class="breadcrumb-item active text-capitalize">Post Details</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-2 bg-gradient-indigo">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Details Post - <strong>{{$post->name}}</strong></h3>
                                <a href="{{route('post.index')}}" class="btn btn-outline-light">Post
                                    List</a>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="d-flex">
                                <p><strong class="text-primary">ID : </strong> {{$post->id}}</p>
                            </div>
                            <div class="d-flex">
                                <p><strong class="text-primary">Name : </strong> {{$post->name}}</p>
                            </div>
                            <div class="d-flex">
                                <p><strong class="text-primary">Slug : </strong> {{$post->slug}}</p>
                            </div>
                            <div class="d-flex">
                                <p><strong class="text-primary">Create Date : </strong> {{$post->created_at->diffForHumans()}}</p>
                            </div>
                            <div class="d-flex">
                                <p><strong class="text-primary">Description : </strong> {{$post->description}}</p>
                            </div>


                        </div>
                        <div class="card-footer bg-gradient-indigo">
                            <a href="{{route('post.edit',[$post->id])}}" class="btn btn-outline-warning">Edit Post</a>
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
