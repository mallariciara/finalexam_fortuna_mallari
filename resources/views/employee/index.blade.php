@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Employee Management') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <a href="{{ route('employee.create') }}" class="btn btn-info">Add New Employee</a> <br> <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body p-0">
                                @if(session('success'))
                                    <div class="alert alert-success m-3">{{ session('success') }}</div>
                                @endif
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Middle Name</th>
                                            <th>Address</th>
                                            <th>Date of Birth</th>
                                            <th>Contact</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employee as $items)
                                        <tr>
                                            <td>{{ $items->id }}</td>
                                            <td>{{ $items->fname }}</td>
                                            <td>{{ $items->mname }}</td>
                                            <td>{{ $items->lname }}</td>
                                            <td>{{ $items->address }}</td>
                                            <td>{{ $items->dob }}</td>
                                            <td>{{ $items->contact }}</td>
                                            <td>
                                                <a href="{{ route('employee.edit', $items->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <form action="{{ route('employee.destroy', $items->id) }}" method="POST" style="display:inline-block; margin-left: 5px;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this employee?')">Delete</button>
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
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection