@extends('layouts.backend.web')

@section('content')
<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Add Tools</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tools</li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form action="{{ route('tools.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        
                            <div class="card-header">
                                <div class="card-title">Add New Tool</div>
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
                                    <label class="col-md-3 form-label">Categories :</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="category_id">
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
                                    <label class="col-md-3 form-label">Status :</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">In Active</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="feature">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <!--Row-->
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-primary">Add New Tool</button>
                                        <a href="{{route('tools.index')}}" class="btn btn-default float-end">Discard</a>
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
