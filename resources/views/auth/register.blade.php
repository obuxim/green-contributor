@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    Register
                </div>
                <div class="card-body">
                    @include('partials.flash')
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                placeholder="Enter your full name...">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                                placeholder="email@domain.extension">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="custom-select">
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Enter your street address..." value="{{ old('address') }}">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" name="city"
                                        placeholder="Enter your city..." value="{{ old('city') }}">
                                </div>
                                <div class="col-4">
                                    <label for="zip">ZIP/Postal Code</label>
                                    <input type="text" class="form-control" id="zip" name="zip"
                                        placeholder="Enter your zip code..." value="{{ old('zip') }}">
                                </div>
                                <div class="col-4">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" id="country" name="country"
                                        placeholder="Enter your country name..." value="{{ old('country') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="teacher_code">Teacher Code</label>
                            <input type="text" class="form-control" id="teacher_code" name="teacher_code"
                                placeholder="Enter your teacher code..." value="{{ old('teacher_code') }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter your password...">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required autocomplete="new-password"
                                placeholder="Confirm your password...">
                        </div>
                       
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Register</button>
                            <p><a href="{{ route('login') }}">Have an account? Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection