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
                        <li class="breadcrumb-item active text-capitalize">Edit Post</li>
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
                        <div class="card-header border-2">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Edit Post - <strong>{{$post->title}}</strong></h3>
                                <a href="{{route('post.index')}}" class="btn btn-outline-secondary">Post
                                    List</a>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    <form action="{{route('post.update',[$post->id])}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="name">Post Title</label>
                                                <input type="text" name="title"
                                                       class="form-control @error('title') is-invalid @enderror"
                                                       value="{{$post->title ,old('title') }}" id="title"
                                                       placeholder="Enter title">
                                                @error('title')
                                                <span class="invalid-feedback alert alert-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="category_id">Post Category</label>
                                                <select name="category_id" id="category_id"
                                                        class="form-control @error('category_id') is-invalid @enderror"
                                                        value="{{ old('name') }}">
                                                    <option value="" selected class="d-none">--Select a Category--
                                                    </option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}"
                                                                @if ($post->category_id == $category->id) selected @endif>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <span class="invalid-feedback alert alert-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <label for="images">Post Title</label>
                                                        <input type="file" name="images"
                                                               class="form-control @error('images') is-invalid @enderror"
                                                               value="{{$post->images, old('images') }}" id="images"
                                                               placeholder="Enter title">
                                                        @error('images')
                                                        <span class="invalid-feedback alert alert-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="thumbnail text-right">
                                                            <img src="{{asset($post->images)}}" class="img-size-64"
                                                                 alt="{{$post->title}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div style="border: 1px solid #ced4da;border-radius: 4px;">
                                                    <div class="row p-3">
                                                        @foreach($tags as $tag)
                                                            <div class="col-md-3 custom-control custom-checkbox">
                                                                <input
                                                                    class="custom-control-input @error('tags[]') is-invalid @enderror"
                                                                    name="tags[]" type="checkbox" id="tag{{$tag->id}}"
                                                                    value="{{$tag->id}}"
                                                                    @foreach($post->tags as $tg)

                                                                    @if($tag->id == $tg->id)checked @endif

                                                                    @endforeach

                                                                >
                                                                <label for="tag{{$tag->id}}"
                                                                       class="custom-control-label">{{$tag->name}}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea type="text" name="description"
                                                          class="form-control @error('images') is-invalid @enderror"
                                                          id="description" placeholder="Enter description"
                                                          rows="4">{{$post->description}}</textarea>
                                                @error('description')
                                                <span class="invalid-feedback alert alert-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer text-right">
                                            <button type="submit" class="btn bg-gradient-secondary">Update Post
                                            </button>
                                        </div>
                                    </form>
                                </div>
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
