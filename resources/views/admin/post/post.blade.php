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
                        <li class="breadcrumb-item active text-capitalize">Post List</li>
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
                                <h3 class="card-title">Post List</h3>
                                <a href="{{route('post.create')}}" class="btn btn-outline-secondary">Create Post</a>
                            </div>
                        </div>
                        <div class="card-body">

                            <table class="table table-hover text-nowrap table-striped">
                                <thead class="bg-gradient-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>User name</th>
                                    <th>Category Name</th>
                                    <th>Related Tag</th>
                                    <th>Post Title</th>
                                    <th>Short Desc</th>
                                    <th>Thumbnail</th>
                                    <th>Published Date</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($posts->count())
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->user->name}}</td>
                                    <td>{{$post->category->name}}</td>
                                    <td>
                                        @foreach($post->tags as $tag)
                                            <span class="badge badge-primary">{{$tag->name}}</span>
                                        @endforeach
                                    </td>
                                    <td>{{$post->title}}</td>
                                    <td>{{ Illuminate\Support\Str::limit($post->description, 100) }}</td>
                                    <td>
                                        <div class="thumbnail" style="max-height: 70px;max-width: 70px;overflow: hidden;">
                                            <img src="{{asset($post->images)}}" class="img-fluid" alt="{{$post->title}}">
                                        </div>
                                    </td>
                                    <td>{{$post->published_at->diffForHumans()}}</td>
                                    <td class="text-center d-flex">
                                        <a href="{{route('post.show',[$post->id])}}" class="btn btn-info btn-sm mr-3"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('post.edit',[$post->id])}}" class="btn btn-warning btn-sm mr-3"><i class="fa fa-edit"></i></a>
                                        <form action="{{route('post.destroy',[$post->id])}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="9" class="alert alert-default-info text-indigo text-center">
                                            <h5>No Post found</h5>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>


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


$table->integer('item_id');
            $table->integer('color_id');
            $table->integer('size_id');
            $table->integer('quantity');
            $table->timestamps();
			
			protected $fillable = [
        'item_id','color_id','size_id','quantity'
    ];
