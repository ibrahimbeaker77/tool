@extends('layouts.backend.web')

@section('content')
<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Add Package</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Package</li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form action="{{ route('packages.store') }}" method="POST">
                            @csrf
                        
                            <div class="card-header">
                                <div class="card-title">Add New Package</div>
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
                                    <label class="col-md-3 form-label">Package Name :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Recommended :</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="recommended">
                                            <option value="no">No</option>
                                            <option value="yes">Yes</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Package Type :</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="type">
                                            <option value="basic">Basic</option>
                                            <option value="classic">Classic</option>
                                            <option value="enterprise">Enterprise</option>
                                            <option value="custom">Custom</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Package Price :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="price">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Savings Price:</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="savings">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Included API :</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="api">
                                            <option value="no">No</option>
                                            <option value="yes">Yes</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Included plugins :</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="plugin">
                                            <option value="no">No</option>
                                            <option value="yes">Yes</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Package Validity :</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="validity">
                                            <option value="1">1 Month</option>
                                            <option value="2">2 Month</option>
                                            <option value="3">3 Month</option>
                                            <option value="4">4 Month</option>
                                            <option value="5">5 Month</option>
                                            <option value="6">6 Month</option>
                                            <option value="7">7 Month</option>
                                            <option value="8">8 Month</option>
                                            <option value="9">9 Month</option>
                                            <option value="10">10 Month</option>
                                            <option value="11">11 Month</option>
                                            <option value="12">12 Month</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">User Seats :</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="user_seats">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
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

                            </div>
                            <div class="card-footer">
                                <!--Row-->
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-primary">Add New Package</button>
                                        <a href="{{route('packages.index')}}" class="btn btn-default float-end">Discard</a>
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
