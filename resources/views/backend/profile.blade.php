@extends('layouts.backend.web')
@section('content')

<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Profile</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Password</div>
                        </div>
                        <form action="{{route('profile.update',$user->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">New Password</label>
                                    <div class="wrap-input100 validate-input input-group" id="Password-toggle1">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 form-control" type="password" name="password" placeholder="New Password" autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Confirm Password</label>
                                    <div class="wrap-input100 validate-input input-group" id="Password-toggle2">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 form-control" type="password" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <input type="submit" class="btn btn-primary" value="Update Password">
                            </div>
                        </form>
                    </div>
                    <div class="card panel-theme">
                        <div class="card-header">
                            <div class="float-start">
                                <h3 class="card-title">Edit Profile Picture</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <form action="{{route('profile.update',$user->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body no-padding">
                                <div class="text-center chat-image mb-5">
                                    <div class="avatar avatar-xxl chat-profile mb-3 brround">
                                        @php $profile = !empty($user->image) ? $user->image : 'default.png'; @endphp
                                        <a class=""><img alt="avatar" src="{{asset('assets/images/users/'.$profile)}}" class="brround"></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Change Profile</label>
                                            <input name="image" type="file" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <input type="submit" class="btn btn-primary my-1" value="Update Picture">
                            </div>
                        </form>
                    </div>
                    <div class="card panel-theme">
                        <div class="card-header">
                            <div class="float-start">
                                <h3 class="card-title">Contact Information</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-body no-padding">
                            <ul class="list-group no-margin">
                                @foreach ($companyInformation as $detail)
                                    <li class="list-group-item d-flex ps-3">
                                        <div class="social social-profile-buttons me-2">
                                            <a class="social-icon text-primary" href="{{$detail->link}}"><i class="{{$detail->icon}}"></i></a>
                                        </div>
                                        <a href="{{$detail->link}}" class="my-auto">{{$detail->value}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Profile Information</h3>
                        </div>
                        <form action="{{route('profile.update',$user->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Email address</label>
                                            <input type="email" class="form-control" name="email" value="{{$user->email}}" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Company (Optional)</label>
                                            <input type="text" class="form-control" name="company" value="{{$user->company}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Website (Optional)</label>
                                            <input type="text" class="form-control" name="website" value="{{$user->website}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">About Me</label>
                                            <textarea class="form-control" name="about"  rows="6">{{$user->about}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <input type="submit" class="btn btn-primary my-1" value="Update Profile">
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Notifications</div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mg-b-10">
                                        <label class="custom-switch ps-0">
                                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                            <span class="custom-switch-indicator me-3"></span>
                                            <span class="custom-switch-description mg-l-10">Two Step Verification</span>
                                        </label>
                                    </div>
                                    <div class="form-group mg-b-10">
                                        <label class="custom-switch ps-0">
                                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked="">
                                            <span class="custom-switch-indicator me-3"></span>
                                            <span class="custom-switch-description mg-l-10">Show Email Notification</span>
                                        </label>
                                    </div>
                                    <div class="form-group mg-b-10">
                                        <label class="custom-switch ps-0">
                                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked="">
                                            <span class="custom-switch-indicator me-3"></span>
                                            <span class="custom-switch-description mg-l-10">Security Alert</span>
                                        </label>
                                    </div>
                                    <div class="form-group mg-b-10">
                                        <label class="custom-switch ps-0">
                                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked="">
                                            <span class="custom-switch-indicator me-3"></span>
                                            <span class="custom-switch-description mg-l-10">Subscribe</span>
                                        </label>
                                    </div>
                                    <div class="form-group mg-b-10">
                                        <label class="custom-switch ps-0">
                                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked="">
                                            <span class="custom-switch-indicator me-3"></span>
                                            <span class="custom-switch-description mg-l-10">Always Sign In</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Account Infomation</div>
                                </div>
                                <div class="card-body">
                                    <ul class="task-list">
                                        <li class="d-sm-flex">
                                            <div>
                                                <i class="task-icon bg-primary"></i>
                                                <h6 class="fw-semibold">Account Status<span class="text-muted fs-11 mx-2 fw-normal">09 July 2021</span></h6>
                                                <p class="text-muted fs-12">Active</p>
                                            </div>
                                        </li>
                                        <li class="d-sm-flex">
                                            <div>
                                                <i class="task-icon bg-secondary"></i>
                                                <h6 class="fw-semibold">Account Type<span class="text-muted fs-11 mx-2 fw-normal"></span></h6>
                                                <p class="text-muted fs-12">Free</p>
                                            </div>
                                        </li>
                                        <li class="d-sm-flex">
                                            <div>
                                                <i class="task-icon bg-info"></i>
                                                <h6 class="fw-semibold">API Key<span class="text-muted fs-11 mx-2 fw-normal">Active</span></h6>
                                                <p class="text-muted fs-12"><input type="text" class="form-control" value="716d554eeeb5d3c6c7a05b6b661e2119" readonly=""></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Delete Account</div>
                        </div>
                        <div class="card-body">
                            <p>Its Advisable for you to request your data to be sent to your Email.</p>
                            <label class="custom-control custom-checkbox mb-0">
                                <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="">
                                <span class="custom-control-label">Yes, Send my data to my Email.</span>
                            </label>
                        </div>
                        <div class="card-footer text-end">
                            <a href="javascript:void(0)" class="btn btn-danger my-1">Deactivate Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CONTAINER END -->
    </div>
</div>

@endsection