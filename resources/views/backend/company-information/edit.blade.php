@extends('layouts.backend.web')
@section('content')

<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Company Information</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Company Information</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form action="{{ route('company-information.update', $companyInformation->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card-header row">
                                <h3 class="card-title col-md-12">Edit Company Information:</h3>
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
                                    <label class="col-md-3 form-label">Name :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" value="{{$companyInformation->name}}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Icon :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="icon" value="{{$companyInformation->icon}}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Value :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="value" value="{{$companyInformation->value}}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Link :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="link" value="{{$companyInformation->link}}">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Status :</label>
                                    <div class="col-md-9">
                                        <select name="status" id="" class="form-select">
                                            <option value="1" {{ ($companyInformation->status == 1) ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ ($companyInformation->status == 0) ? 'selected' : '' }}>In Active</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">
                                        <button href="submit" class="btn btn-primary">Edit Company Information</button>
                                        <a href="{{route('company-information.index')}}" class="btn btn-default float-end">Discard</a>
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