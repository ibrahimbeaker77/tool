@extends('layouts.backend.web')
@section('content')

<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Users</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header row">
                            <h3 class="card-title col-md-12">Users: <a href="{{route('users.create')}}" class="btn btn-success float-right">Add User</a></h3>
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
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>phone</th>
                                            <th>company</th>
                                            <th>Website</th>
                                            <th>Status</th>
                                            <th>Role</th>
                                            <th>membership</th>
                                            <th>Api key status</th>
                                            <th>Created At</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $detail)
                                            <tr>
                                                <td>{{$detail->id}}</td>
                                                @php $profile = !empty($detail->image) ? $detail->image : 'default.png'; @endphp
                                                <td><img src="{{asset('assets/images/users/'.$profile)}}" width="50px"></td>
                                                <td>{{$detail->name}}</td>
                                                <td>{{$detail->email}}</td>
                                                <td>{{$detail->phone}}</td>
                                                <td>{{$detail->company}}</td>
                                                <td>{{$detail->website}}</td>
                                                <td>{{($detail->status == "0") ? "In Active" : "Active"}}</td>
                                                <td>{{($detail->role == "1") ? "Admin" : "Customer"}}</td>
                                                <td>{{($detail->membership == "2") ? "Free" : "Paid"}}</td>
                                                <td>{{($detail->apiKeyStatus == "0") ? "In Active" : "Active"}}</td>
                                                <td>{{$detail->created_at}}</td>
                                                <td class="text-center align-middle">
                                                    <form action="{{ route('users.destroy', $detail->id) }}" method="POST">
                                                        <div class="btn-group align-top btn-list">
                                                            <a class="btn btn-sm btn-primary badge" href="{{ route('users.show', $detail->id) }}"><i class="fa fa-info"></i></a>
                                                            
                                                            <a class="btn btn-sm btn-primary badge" href="{{ route('users.edit', $detail->id) }}"><i class="fa fa-edit"></i></a>

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