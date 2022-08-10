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
                        <div class="card-header row">
                            <h3 class="card-title col-md-12">Packages: <a href="{{route('packages.create')}}" class="btn btn-success float-right">Add Package</a></h3>
                        </div>
                        <div class="card-body">
                            
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <span>{{ $message }}</span>
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="data-table table border dataTable no-footer text-nowrap text-md-nowrap table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Package Name</th>
                                            <th>Recommended</th>
                                            <th>Package Type</th>
                                            <th>Package Price</th>
                                            <th>Savings Price</th>
                                            <th>Included API</th>
                                            <th>Included Plugin</th>
                                            <th>Package Validity</th>
                                            <th>User Seats</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($packages as $detail)
                                            <tr>
                                                <td>{{$detail->id}}</td>
                                                <td>{{$detail->name}}</td>
                                                <td>{{$detail->recommended}}</td>
                                                <td>{{$detail->type}}</td>
                                                <td>{{$detail->price}}</td>
                                                <td>{{$detail->savings}}</td>
                                                <td>{{$detail->api}}</td>
                                                <td>{{$detail->plugin}}</td>
                                                <td>{{$detail->validity}}</td>
                                                <td>{{$detail->user_seats}}</td>
                                                <td>{{ ($detail->status == 1) ? 'Active' : 'In Active' }}</td>
                                                <td>{{$detail->created_at}}</td>
                                                <td class="text-center align-middle">
                                                    <form action="{{ route('packages.destroy', $detail->id) }}" method="POST">
                                                        <div class="btn-group align-top btn-list">
                                                            <a class="btn btn-sm btn-primary badge" href="{{ route('packages.edit', $detail->id) }}"><i class="fa fa-edit"></i></a>

                                                            @csrf
                                                            @method('DELETE')

                                                            <button class="btn btn-sm btn-danger badge" type="submit" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ROW END -->

        </div>
        <!-- CONTAINER END -->
    </div>
</div>

@endsection