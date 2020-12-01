<!-- 
=========================================================
 Light Bootstrap Dashboard - v2.0.1
=========================================================

 Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.  -->

@extends('layouts.app')

@section('title', 'IKET - Buat User')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Buat Data User</h4>
                        <p class="card-category">Silakan isi form di bawah ini.</p>
                    </div>
                    <div class="card-body ">
                        <form method="POST" action="{{ route('user.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="username" class="form-control-label">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    name="username" id="username" placeholder="Username"
                                    value="{{ old('username') }}" autofocus>
                                @error('username')
                                @include('includes.error-field')
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password" class="form-control-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                    name="password" id="password" placeholder="Password" 
                                    value="">
                                @error('password')
                                @include('includes.error-field')
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="confirm_password" class="form-control-label">Confirm Password</label>
                                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" 
                                    name="confirm_password" id="confirm_password" placeholder="Confirm Password" 
                                    value="">
                                @error('confirm_password')
                                @include('includes.error-field')
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name" class="form-control-label">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    id="name" placeholder="Nama Departemen" value="{{ old('name') }}">
                                @error('name')
                                @include('includes.error-field')
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="dept_code" class="form-control-label">Departemen</label>
                                <select name="dept_code" id="dept_code"
                                    class="custom-select form-control @error('dept_code') is-invalid @enderror">
                                    <option value="" selected>Pilih Departemen</option>
                                    @foreach ($departments as $department)
                                    <option value="{{ $department->dept_code }}"
                                        {{ old('dept_code') == $department->dept_code ? "selected":"" }}>
                                        {{ $department->name }}</option>
                                    @endforeach
                                </select>
                                @error('name')
                                @include('includes.error-field')
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="role" class="form-control-label">Peran</label>
                                <input type="text" class="form-control @error('role') is-invalid @enderror" name="role"
                                    id="role" placeholder="" value="USER" readonly>
                                @error('role')
                                @include('includes.error-field')
                                @enderror
                            </div>

                            @include('includes.save-cancel-btn')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
