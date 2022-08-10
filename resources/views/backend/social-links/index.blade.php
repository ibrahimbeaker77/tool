@extends('layouts.backend.web')
@section('content')

<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Social Links</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Social Links</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header row">
                            <h3 class="card-title col-md-12">Social Links: <a href="{{route('social-links.create')}}" class="btn btn-success float-right">Add Social Link</a></h3>
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
                                            <th>Social Name</th>
                                            <th>Social Icon</th>
                                            <th>Social Link</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($socialLinks as $detail)
                                            <tr>
                                                <td>{{$detail->id}}</td>
                                                <td>{{$detail->name}}</td>
                                                <td>{{$detail->icon}}</td>
                                                <td>{{$detail->link}}</td>
                                                <td>{{ ($detail->status == 1) ? 'Active' : 'In Active' }}</td>
                                                <td>{{$detail->created_at}}</td>
                                                <td class="text-center align-middle">
                                                    <form action="{{ route('social-links.destroy', $detail->id) }}" method="POST">
                                                        <div class="btn-group align-top btn-list">
                                                            <a class="btn btn-sm btn-primary badge" href="{{ route('social-links.edit', $detail->id) }}"><i class="fa fa-edit"></i></a>

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