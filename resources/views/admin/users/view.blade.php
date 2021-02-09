@section('title', "Dashboard" )
@extends('admin.layouts.main')
@section('main_contant')
<section class="content">
    <div class="container-fluid">
        <section class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$user->name}}</h1>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">Personal Details</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <!-- <tr>
                                    <td colspan="2">{{$user->name}}</td>
                                </tr> -->
                                <tr>
                                    <td>Email</td>
                                    <td class="text-center">{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <td>Contact</td>
                                    <td class="text-center">{{ $user->contact }}</td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td class="text-center">{{ ($user->gender=='M')?'Male':'Female' }}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td class="text-center">{{ $user->address }}</td>
                                </tr>
                                <tr>
                                    <td>Education Detail</td>
                                    <td class="text-center">{{ $user->education_detail }}</td>
                                </tr>
                                <tr>
                                    <td>Preferred Location</td>
                                    <td class="text-center">{{ $user->preferred_location }}</td>
                                </tr>
                                <tr>
                                    <td>Current CTC</td>
                                    <td class="text-center">{{ $user->current_ctc }}</td>
                                </tr>
                                <tr>
                                    <td>Expected CTC</td>
                                    <td class="text-center">{{ $user->expected_ctc }}</td>
                                </tr>
                                <tr>
                                    <td>Notice Period</td>
                                    <td class="text-center">{{ $user->notice_period }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">Langauge Knowns</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                @foreach($user->rel_language as $lang)
                                <tr>
                                    <td>{{ $lang->language }}</td>
                                    <td>{{ ($lang->read == 1)?'Yes':'No' }}</td>
                                    <td>{{ ($lang->write == 1)?'Yes':'No' }}</td>
                                    <td>{{ ($lang->speak == 1)?'Yes':'No' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">Technical Skill</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                @foreach($user->rel_technicalex as $te)
                                <tr>
                                    <td>{{ $te->skill }}</td>
                                    <td>{{ $te->stage }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">Work Experience</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                @foreach($user->rel_workex as $we)
                                <tr>
                                    <td>{{ $we->company_name }}</td>
                                    <td>{{ $we->duration }}</td>
                                    <td>{{ $we->location }}</td>
                                    <td>{{ $we->designation }}</td>
                                </tr>
                                @endforeach
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
