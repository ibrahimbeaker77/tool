@extends('layouts.backend.web')
@section('content')

<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Contact Us</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form action="{{ route('contact.update', $contact->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card-header row">
                                <h3 class="card-title col-md-12">Edit Contact Us:</h3>
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
                                    <label class="col-md-3 form-label">First Name :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="f_name" value="{{$contact->f_name}}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Last Name :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="l_name" value="{{$contact->l_name}}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Email :</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="email" value="{{$contact->email}}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Phone :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="phone" value="{{$contact->phone}}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Subject :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="subject" value="{{$contact->subject}}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Website URL :</label>
                                    <div class="col-md-9">
                                        <input type="url" class="form-control" name="url" value="{{$contact->url}}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Status :</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="status" value="{{$contact->status}}">
                                            <option value="0" {{$contact->status == "0" ? "selected" : ""}}>Pending</option>
                                            <option value="1" {{$contact->status == "1" ? "selected" : ""}}>Process</option>
                                            <option value="2" {{$contact->status == "2" ? "selected" : ""}}>Complete</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Description :</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="description" rows="7">{{$contact->description}}</textarea>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">
                                        <button href="submit" class="btn btn-primary">Edit Contact Us</button>
                                        <a href="{{route('contact.index')}}" class="btn btn-default float-end">Discard</a>
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