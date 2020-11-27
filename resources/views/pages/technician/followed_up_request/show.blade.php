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

@section('title', 'IKET - Followed Up Request Show')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Lihat Request Ditindaklanjuti</h4>
                        <p class="card-category">Request dari {{ $item->user_request->client_name }}</p>
                    </div>
                    <div class="card-body ">

                        <div class="table-responsive overflow-auto">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $item->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Request</th>
                                        <td>{{ $item->user_request->request_created_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Pemohon</th>
                                        <td>{{ $item->user_request->client_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Departemen</th>
                                        <td>{{ $item->user_request->department->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>IP Komputer</th>
                                        <td>{{ $item->user_request->computer->ip }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kerusakan</th>
                                        <td>{{ $item->user_request->break_type->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Perbaikan</th>
                                        <td>{{ $item->user_request->kind_of_repair }}</td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <td>{{ $item->user_request->description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Target</th>
                                        <td>{{ $item->target_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Selesai</th>
                                        <td>{{ $item->target_completion_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>Teknisi</th>
                                        <td>{{ $item->technician }}</td>
                                    </tr>
                                    <tr>
                                        <th>Selesai/Batal</th>
                                        <td>
                                            @if ($item->is_done == 'SELESAI')
                                            <span class="badge badge-success">SELESAI</span>
                                            @elseif ($item->is_done == 'BATAL')
                                            <span class="badge badge-danger">BATAL</span>
                                            @elseif ($item->is_done == 'BELUM SELESAI')
                                            <span class="badge badge-secondary">BELUM SELESAI</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td>
                                            <a href="{{ route('technician.f-up-request.edit', $item->id) }}"
                                                class="btn btn-primary btn-sm mb-2" id="">
                                                <i class="fas fa-edit"></i>&nbsp;&nbsp;Edit
                                            </a>
                                        </td>
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
