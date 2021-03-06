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
    <link rel="stylesheet" href="{{asset('admin/dist/css/summernote-bs4.css')}}">
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
                                <a href="{{route('story.index')}}"
                                   class="btn btn-outline-danger">@yield('before-path')</a>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    <form action="{{route('story.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="category_id">Select Category</label>
                                                        <select name="category_id" id="category_id"
                                                                class="form-control @error('category_id') is-invalid @enderror">
                                                            <option value="" selected class="d-none">--Select a
                                                                Category--
                                                            </option>
                                                            @foreach($categories as $category)
                                                                <option
                                                                    value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                        <span class="invalid-feedback alert alert-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="type_id">Select Type</label>
                                                        <select name="type_id" id="type_id" @change="onChange($event)" v-model="type"
                                                                class="form-control @error('type_id') is-invalid @enderror">
                                                            <option value="" selected class="d-none">--Select a Type--
                                                            </option>
                                                            @foreach($types as $type)
                                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('type_id')
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
                                                               value="{{ old('name') }}" id="name"
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
                                                            <div class="checkbox @error('tags') is-invalid @enderror">
                                                                @foreach($tags as $tag)
                                                                    <label class="mr-3">
                                                                        <input value="{{$tag->id}}" type="checkbox"
                                                                               name="tags[]">
                                                                        {{$tag->name}}
                                                                    </label>
                                                                @endforeach
                                                            </div>
                                                            @error('tags')
                                                            <span class="invalid-feedback alert alert-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row ml-1 mb-3 "
                                                 style="max-height: 180px; min-height: 180px;">
                                                <div class="col-md-3 card"
                                                     style="max-height: 180px; min-height: 180px;">
                                                    <img src="" alt="" class="img-fluid" id="blah" style="max-height: 180px; min-height: 180px;">
                                                    <span class="text-capitalize text-danger"
                                                    >Upload a Thumbnail for Post</span>
                                                </div>
                                                <div class="col-md-9 align-self-end">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="image"
                                                                       class="form-control @error('image') is-invalid @enderror" id="imgInp">
                                                                @error('image')
                                                                <span class="invalid-feedback alert alert-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror

                                                            </div>
                                                            <div class="input-group-append">
                                                                            <span class="input-group-text bg-danger"
                                                                                  id="">Upload Thumbnail</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row" v-show="show">
                                                <div class="col-md-12" v-if="type == 1">
                                                    <div class="form-group">
                                                        <label for="summery">Write Your Summery</label>
                                                        <textarea type="text" name="summery"
                                                                  class="form-control @error('summery') is-invalid @enderror" id="summery"></textarea>
                                                        @error('summery')
                                                        <span class="invalid-feedback alert alert-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12" v-else>
                                                    <div class="form-group">
                                                        <label for="story">Write Your Story</label>
                                                        <textarea type="text" name="story"
                                                                  class="form-control @error('story') is-invalid @enderror" id="story"></textarea>
                                                        @error('story')
                                                        <span class="invalid-feedback alert alert-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                        @enderror
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
    <script src="{{asset('admin/dist/js/summernote-bs4.js')}}"></script>
    <script>

        $('#summery').summernote({
            placeholder: 'Write your summery',
            tabsize: 2,
            height: 500
        });
        $('#story').summernote({
            placeholder: 'Write your story',
            tabsize: 2,
            height: 500
        });


        $(document).ready(function () {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            $("#imgInp").change(function () {
                readURL(this);
            });

        });

    </script>
@endsection
