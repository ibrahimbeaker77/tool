@extends('layouts.backend.web')
@section('content')

<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">User</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header row">
                            <h3 class="card-title col-md-12">View User:</h3>
                        </div>
                        <div class="card-body">
                            <table width="100%" class="data-table table border dataTable no-footer text-nowrap text-md-nowrap table-striped mb-0">
                                <tr>
                                    <th>Name</th>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <th>phone</th>
                                    <td>{{$user->phone}}</td>
                                </tr>
                                <tr>
                                    <th>Company</th>
                                    <td>{{$user->company}}</td>
                                </tr>
                                <tr>
                                    <th>Website</th>
                                    <td>{{$user->website}}</td>
                                </tr>
                                <tr>
                                    <th>About</th>
                                    <td>{{$user->about}}</td>
                                </tr>
                                <tr>
                                    <th>Two Step Verification</th>
                                    <td>{{($user->twoStepVerification == "0") ? "Disable" : "Enable"}}</td>
                                </tr>
                                <tr>
                                    <th>Two Step Verification Status</th>
                                    <td>{{($user->twoStepVerificationStatus == "0") ? "In Active" : "Active"}}</td>
                                </tr>
                                <tr>
                                    <th>Email Notification</th>
                                    <td>{{($user->emailNotification == "0") ? "In Disable" : "Enable"}}</td>
                                </tr>
                                <tr>
                                    <th>Security Alert</th>
                                    <td>{{($user->securityAlert == "0") ? "Disable" : "Enable"}}</td>
                                </tr>
                                <tr>
                                    <th>Always SignIn</th>
                                    <td>{{($user->alwaysSignIn == "0") ? "In Disable" : "Enable"}}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{($user->status == "0") ? "In Active" : "Active"}}</td>
                                </tr>
                                <tr>
                                    <th>Membership</th>
                                    <td>{{($user->membership == "2") ? "Free" : "Paid"}}</td>
                                </tr>
                                <tr>
                                    <th>Image</th>
                                    @php $profile = !empty($user->image) ? $user->image : 'default.png'; @endphp
                                    <td><img src="{{asset('assets/images/users/'.$profile)}}" width="200px"></td>
                                </tr>
                                <tr>
                                    <th>API Key</th>
                                    <td>{{$user->apiKey}}</td>
                                </tr>
                                <tr>
                                    <th>API Key Status</th>
                                    <td>{{($user->apiKeyStatus == "0") ? "In Active" : "Active"}}</td>
                                </tr>
                                <tr>
                                    <th>Email Verified at</th>
                                    <td>{{$user->email_verified_at}}</td>
                                </tr>
                                <tr>
                                    <th>Created at</th>
                                    <td>{{$user->created_at}}</td>
                                </tr>
                                <tr>
                                    <th>Roles</th>
                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                            </table>                          
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <a href="{{route('users.index')}}" class="btn btn-default float-end">Discard</a>
                                </div>
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