@extends('layouts.backend.web')
@section('content')

<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Blog</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-header row">
                                <h3 class="card-title col-md-12">Edit Blog:</h3>
                            </div>
                            <div class="card-body">

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <span>{{ $error }}</span>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Title :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="title" value="{{$blog->title}}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Slug :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="slug" value="{{$blog->slug}}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Feature :</label>
                                    <div class="col-md-9">
                                        <img src="{{asset('assets/images/media/blogs/'.$blog->feature)}}" width="100px">
                                        <input type="file" class="form-control" name="feature" value="{{$blog->feature}}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Category :</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="category_id">
                                            @foreach($categories as $catrgory)
                                                @if($catrgory->status == "1")
                                                    <option value="{{$catrgory->id}}" {{ ($catrgory->id == $blog->category_id) ? "selected" : "" }}>{{$catrgory->title}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Reading Time :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="reading_time" value="{{$blog->reading_time}}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Auth :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="auth" value="{{$blog->auth}}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Role :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="role" value="{{$blog->role}}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Description :</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="description" rows="7" id="editor">{{$blog->description}}</textarea>
                                    </div>
                                </div>
                                
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Publish Date :</label>
                                    <div class="col-md-9">
                                        <input type="date" class="form-control" name="publish_time" value="{{$blog->publish_time}}">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">
                                        <button href="submit" class="btn btn-primary">Edit Blog</button>
                                        <a href="{{route('blogs.index')}}" class="btn btn-default float-end">Discard</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ROW END -->
        </div>
        <!-- CONTAINER END -->
    </div>
</div>

@endsection