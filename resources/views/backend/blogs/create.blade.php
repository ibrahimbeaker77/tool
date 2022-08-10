@extends('layouts.backend.web')

@section('content')
<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Add Blog</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        
                            <div class="card-header">
                                <div class="card-title">Add New Blog</div>
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
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Slug :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="slug">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Feature :</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="feature">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Category :</label>
                                    <div class="col-md-9">
                                        <select name="category_id" class="form-control">
                                            <option value="">Select please</option>
                                            @foreach($categories as $catrgory)
                                                @if($catrgory->status == "1")
                                                    <option value="{{$catrgory->id}}">{{$catrgory->title}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Reading Time :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="reading_time" placeholder="7 Min To Read">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Auth :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="auth" placeholder="Aasim Ghaffar">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Role :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="role" placeholder="Content Manager">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Description :</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="description" rows="7" id="editor"></textarea>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Publish Date :</label>
                                    <div class="col-md-9">
                                        <input type="date" class="form-control" name="publish_time">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <!--Row-->
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-primary">Add New Blog</button>
                                        <a href="{{route('blogs.index')}}" class="btn btn-default float-end">Discard</a>
                                    </div>
                                </div>
                                <!--End Row-->
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
<!--app-content close-->
@endsection