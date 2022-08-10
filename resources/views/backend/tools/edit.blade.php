@extends('layouts.backend.web')
@section('content')

<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">tools</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('tools.index')}}">tool</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form action="{{ route('tools.update', $tool->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-header row">
                                <h3 class="card-title col-md-12">Edit Tool:</h3>
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
                                        <input type="text" class="form-control" name="title" value="{{$tool->title}}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Slug :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="slug" value="{{$tool->slug}}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Status :</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="status" value="{{$tool->status}}">
                                            <option value="0" {{ ($tool->status == "0") ? "selected" : '' }}>In Active</option>
                                            <option value="1" {{ ($tool->status == "1") ? "selected" : '' }}>Active</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Image</label>
                                    <div class="col-md-9">
                                    <img src="{{asset('assets/images/tools/'.$tool->feature)}}" width="100px">
                                        <input type="file" class="form-control" name="feature" value="{{$tool->feature}}">
                                    </div>
                                </div>
                                
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Category :</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="category_id">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $catrgory)
                                                @if($catrgory->status == "1")
                                                    <option value="{{$catrgory->id}}" {{ ($catrgory->id == $tool->category_id) ? "selected" : "" }}>{{$catrgory->title}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">
                                        <button href="submit" class="btn btn-primary">Edit Tool</button>
                                        <a href="{{route('tools.index')}}" class="btn btn-default float-end">Discard</a>
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