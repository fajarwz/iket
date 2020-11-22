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

 @section('title', 'IKET - Request List')

 @section('content')
 <div class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="card ">
                  <div class="card-header ">
                      <h4 class="card-title">List Request</h4>
                      <p class="card-category">Request dari semua user</p>
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
                      </table>
                    </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
 @endsection 