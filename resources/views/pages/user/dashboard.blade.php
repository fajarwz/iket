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

@section('title', 'IKET - User Dashboard')

@section('content')
<div class="content">
    <div class="container-fluid container-dashboard">
        
        <div class="row">
            <div class="container">
               <h3>&nbsp;Selamat Datang, {{ Auth::user()->name }}!</h3>
            </div>
        </div>

        <div class="row">

            <div class="col-md-3">
                <div class="card-counter primary">
                    <i class="fas fa-calendar"></i>
                    <span class="count-numbers">{{ $req_today_count }}</span>
                    <span class="count-name">Request Hari Ini</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-counter primary">
                    <i class="fas fa-calendar-alt"></i>
                    <span class="count-numbers">{{ $req_alltime_count }}</span>
                    <span class="count-name">Request Sepanjang Waktu</span>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Request Hari ini</h4>
                        <p class="card-category">diambil dari 3 request terbaru</p>
                    </div>
                    <div class="card-body ">
  
                      <a 
                        href="{{ route('user.request.create') }}" 
                        class="btn btn-primary btn-sm mb-2">
                          <i class="fas fa-plus"></i>&nbsp;&nbsp;Buat Request
                      </a>
  
                      <div class="table-responsive overflow-auto">
                        <table class="table table-bordered" id="request-table" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Tanggal Request</th>
                              <th>Nama Pemohon</th>
                              <th>Departemen</th>
                              <th>IP Komputer</th>
                              <th>Jenis Kerusakan</th>
                              <th>Jenis Perbaikan</th>
                              <th>Deskripsi</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse ($req_today_list as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->request_created_date }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->user->department->name }}</td>
                                    <td>{{ $item->computer->ip }}</td>
                                    <td>{{ $item->break_type->name }}</td>
                                    <td>{{ $item->kind_of_repair }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <a 
                                            href="{{ route('user.request.print', $item->id) }}" 
                                            class="btn btn-primary btn-sm mb-2" id="">
                                            <i class="fas fa-print"></i>&nbsp;&nbsp;Print
                                        </a>
                                    </td>
                                </tr>
                            @empty 
                                <tr>
                                    <td colspan="9" class="text-center">
                                        Belum ada request yang dibuat hari ini, klik tombol Buat Request untuk membuat
                                    </td>
                                </tr>
                            @endforelse
                          </tbody>
                        </table>
                      </div>
  
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
