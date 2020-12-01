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

@section('title', 'IKET - User List')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">List User</h4>
                        <p class="card-category">Semua user</p>
                    </div>
                    <div class="card-body ">

                        <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm mb-2">
                            <i class="fas fa-plus"></i>&nbsp;&nbsp;Buat Data User
                        </a>

                        <div class="table-responsive overflow-auto">
                            <table class="table table-bordered" id="user-table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Departemen</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('after-style')
{{-- Datatables  --}}
<link href="{{ asset('assets/css/datatables.min.css') }}" rel="stylesheet" />
@endpush

@push('after-script')
{{-- DataTables  --}}
<script src="{{ asset('assets/js/datatables.min.js') }}" type="text/javascript"></script>

<script>
    $(function () {
        $('#user-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('user.json') }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'department.name',
                    name: 'department.name'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ],
            order: [1, 'asc'],
            stateSave: true
        });
    });

</script>
@endpush

@include('includes.notification')
