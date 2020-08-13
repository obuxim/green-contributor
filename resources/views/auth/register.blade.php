@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h2>Register</h2></div>
                    <div class="card-body">
                        @include('includes.flash')
                        <ul class="nav nav-pills nav-fill mb-3" id="registrationTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#registerStudent" role="tab" aria-controls="pills-home" aria-selected="true">Student</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#registerTeacher" role="tab" aria-controls="pills-profile" aria-selected="false">Teacher</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="registrationTabsContent">
                            <div class="tab-pane fade show active" id="registerStudent" role="tabpanel" aria-labelledby="pills-home-tab">
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="first_name">First Name</label>
                                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Jane">
                                            </div>
                                            <div class="col-6">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Doe">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="registerTeacher" role="tabpanel" aria-labelledby="pills-profile-tab">
                                I am teacher
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
