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

@section('title', 'IKET - Edit User')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Edit User</h4>
                        <p class="card-category">Silakan isi form di bawah ini.</p>
                    </div>
                    <div class="card-body ">
                        <form id="createForm" method="POST"
                            action="{{ route('user.update', $item->id) }}">
                            @method('PUT')
                            @csrf

                            <input type="hidden" name="is_edit" id="is_edit" value="true"/>

                            <div class="form-group">
                                <label for="username" class="form-control-label">Username</label>
                                <input type="text" class="form-control" name="username"
                                    id="username" placeholder=""
                                    value="{{ $item->username }}" readonly>
                                @error('username')
                                @include('includes.error-field')
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name" class="form-control-label">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="name" placeholder="Nama"
                                    value="{{ $item->name }}">
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
                                        {{ $item->dept_code == $department->dept_code ? "selected":"" }}>
                                        {{ $department->name }}</option>
                                    @endforeach
                                </select>
                                @error('dept_code')
                                @include('includes.error-field')
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="role" class="form-control-label">Peran</label>
                                <input type="text" class="form-control @error('role') is-invalid @enderror"
                                    name="role" id="role" placeholder=""
                                    value="USER" readonly>
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

