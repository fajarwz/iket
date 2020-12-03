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

@section('title', 'IKET - Edit Teknisi')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Edit Teknisi</h4>
                        <p class="card-category">Silakan isi form di bawah ini.</p>
                    </div>
                    <div class="card-body ">
                        <form id="createForm" method="POST"
                            action="{{ route('technician.update', $item->id) }}">
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

                            @include('includes.save-cancel-btn')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

