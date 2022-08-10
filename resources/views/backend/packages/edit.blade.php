@extends('layouts.backend.web')
@section('content')

<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Packages</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Packages</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form action="{{ route('packages.update', $package->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card-header row">
                                <h3 class="card-title col-md-12">Edit Package:</h3>
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
                                        <input type="text" class="form-control" name="name" value="{{$package->name}}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Recommended :</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="recommended">
                                            <option value="no" {{($package->recommended == "no") ? 'selected' : ''}}>No</option>
                                            <option value="yes" {{($package->recommended == "yes") ? 'selected' : ''}}>Yes</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Package Type :</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="type">
                                            <option value="basic" {{($package->type == 'basic') ? 'selected' : ''}}>Basic</option>
                                            <option value="classic" {{($package->type == 'classic') ? 'selected' : ''}}>Classic</option>
                                            <option value="enterprise" {{($package->type == 'enterprise') ? 'selected' : ''}}>Enterprise</option>
                                            <option value="custom" {{($package->type == 'custom') ? 'selected' : ''}}>Custom</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Package Price :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="price" value="{{$package->price}}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Savings Price:</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="savings" value="{{$package->savings}}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Included API :</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="api">
                                            <option value="no" {{($package->api == 'no') ? 'selected' : ''}}>No</option>
                                            <option value="yes" {{($package->api == 'yes') ? 'selected' : ''}}>Yes</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Included plugins :</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="plugin">
                                            <option value="no" {{($package->plugin == 'no') ? 'selected' : ''}}>No</option>
                                            <option value="yes" {{($package->plugin == 'yes') ? 'selected' : ''}}>Yes</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Package Validity :</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="validity">
                                            <option value="1" {{($package->validity == '1') ? 'selected' : ''}}>1 Month</option>
                                            <option value="2" {{($package->validity == '2') ? 'selected' : ''}}>2 Month</option>
                                            <option value="3" {{($package->validity == '3') ? 'selected' : ''}}>3 Month</option>
                                            <option value="4" {{($package->validity == '4') ? 'selected' : ''}}>4 Month</option>
                                            <option value="5" {{($package->validity == '5') ? 'selected' : ''}}>5 Month</option>
                                            <option value="6" {{($package->validity == '6') ? 'selected' : ''}}>6 Month</option>
                                            <option value="7" {{($package->validity == '7') ? 'selected' : ''}}>7 Month</option>
                                            <option value="8" {{($package->validity == '8') ? 'selected' : ''}}>8 Month</option>
                                            <option value="9" {{($package->validity == '9') ? 'selected' : ''}}>9 Month</option>
                                            <option value="10" {{($package->validity == '10') ? 'selected' : ''}}>10 Month</option>
                                            <option value="11" {{($package->validity == '11') ? 'selected' : ''}}>11 Month</option>
                                            <option value="12" {{($package->validity == '12') ? 'selected' : ''}}>12 Month</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">User Seats :</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="user_seats">
                                            <option value="0" {{($package->user_seats == '0') ? 'selected' : ''}}>0</option>
                                            <option value="1" {{($package->user_seats == '1') ? 'selected' : ''}}>1</option>
                                            <option value="2" {{($package->user_seats == '2') ? 'selected' : ''}}>2</option>
                                            <option value="3" {{($package->user_seats == '3') ? 'selected' : ''}}>3</option>
                                            <option value="4" {{($package->user_seats == '4') ? 'selected' : ''}}>4</option>
                                            <option value="5" {{($package->user_seats == '5') ? 'selected' : ''}}>5</option>
                                            <option value="6" {{($package->user_seats == '6') ? 'selected' : ''}}>6</option>
                                            <option value="7" {{($package->user_seats == '7') ? 'selected' : ''}}>7</option>
                                            <option value="8" {{($package->user_seats == '8') ? 'selected' : ''}}>8</option>
                                            <option value="9" {{($package->user_seats == '9') ? 'selected' : ''}}>9</option>
                                            <option value="10" {{($package->user_seats == '10') ? 'selected' : ''}}>10</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Status :</label>
                                    <div class="col-md-9">
                                        <select name="status" id="" class="form-select">
                                            <option value="1" {{ ($package->status == 1) ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ ($package->status == 0) ? 'selected' : '' }}>In Active</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">
                                        <button href="submit" class="btn btn-primary">Edit Package</button>
                                        <a href="{{route('packages.index')}}" class="btn btn-default float-end">Discard</a>
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