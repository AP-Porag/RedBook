@extends('layouts.admin')

@section('title')
    Story
@endsection
@section('before-path')
    Story List
@endsection
@section('breadcrumb-name')
     Create Story
@endsection

@section('style')
    <style>

    </style>
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
                                <a href="{{route('story.index')}}" class="btn btn-outline-danger">@yield('before-path')</a>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    <form action="{{route('story.store')}}" method="post">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="category_id">Select Category</label>
                                                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" value="{{ old('name') }}">
                                                            <option value="" selected class="d-none">--Select a Category--</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('name')
                                                        <span class="invalid-feedback alert alert-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="type_id">Select Type</label>
                                                        <select name="type_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" value="{{ old('name') }}">
                                                            <option value="" selected class="d-none">--Select a Type--</option>
                                                            @foreach($types as $type)
                                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('name')
                                                        <span class="invalid-feedback alert alert-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name">Give a title of your story</label>
                                                        <input type="text" name="name"
                                                               class="form-control @error('name') is-invalid @enderror"
                                                               name="name" value="{{ old('name') }}" id="name"
                                                               placeholder="Enter name">
                                                        @error('name')
                                                        <span class="invalid-feedback alert alert-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Select Tags</label>
                                                        <div class="form-group border p-3">
                                                            <div class="checkbox">
                                                                @foreach($tags as $tag)
                                                                    <label class="mr-3">
                                                                        <input value="{{$tag->id}}" type="checkbox" name="tags[]" >
                                                                        {{$tag->name}}
                                                                    </label>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row ml-1 mb-3 " style="max-height: 180px; min-height: 180px;">
                                                <div class="col-md-3 card" style="max-height: 180px; min-height: 180px;">
                                                    <img :src="imagePreview" alt="" class="img-fluid">
                                                    <span class="text-capitalize text-danger"
                                                          v-if="imagePreview == null">Upload a Thumbnail for Post</span>
                                                </div>
                                                <div class="col-md-9 align-self-end">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" @change="imageSelected"
                                                                       name="thumbnail"
                                                                       class="custom-file-input custom-file-label"
                                                                       id="thumbnail">
                                                                <label class="custom-file-label"
                                                                       for="thumbnail"></label>
                                                            </div>
                                                            <div class="input-group-append">
                                                                            <span class="input-group-text bg-danger"
                                                                                  id="">Upload Thumbnail</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="description">Write Your Summery</label>
                                                            <textarea type="text" name="summery" rows="7"
                                                                      class="form-control"
                                                                      id="description"
                                                                      placeholder="Enter description" v-model="fields.description"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="description">Write Your Story</label>
                                                            <textarea type="text" name="story" rows="7"
                                                                      class="form-control"
                                                                      id="description"
                                                                      placeholder="Enter description" v-model="fields.description"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer text-right">
                                            <button type="submit" class="btn btn-danger">Save @yield('title')
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
@section('script')
    <script>


    </script>
@endsection
