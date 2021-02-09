@section('title', "Dashboard" )
@extends('admin.layouts.main')
@section('main_contant')
<section class="content">
    <div class="container-fluid">
        <section class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users List</h1>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Users List</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <!-- <a href="#" class="btn btn-default">Add Database</a> -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Contact</th>
                                    <th>Current CTC</th>
                                    <th>Expected CTC</th>
                                    <th>Notice Peroid</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($users)
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    @php
                                    $gender = "Male";
                                    if($user->gender == 'F')
                                    $gender = "Female";
                                    @endphp
                                    <td>{{ $gender }}</td>
                                    <td>{{ $user->contact }}</td>
                                    <td>{{ $user->current_ctc }}</td>
                                    <td>{{ $user->expected_ctc }}</td>
                                    <td>{{ $user->notice_period }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.user.view',$user->id) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <!-- <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a> -->
                                        <a class="btn btn-danger btn-sm" href="{{ route('admin.user.delete',$user->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('custom_scripts')

@endsection
