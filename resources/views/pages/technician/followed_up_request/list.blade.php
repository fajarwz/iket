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

 @section('title', 'IKET - Followed Up Request List')

 @section('content')
 <div class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="card ">
                  <div class="card-header ">
                      <h4 class="card-title">List Request Ditindaklanjuti</h4>
                      <p class="card-category">Request dari semua user</p>
                  </div>
                  <div class="card-body ">

                    <div class="table-responsive overflow-auto">
                      <table class="table table-bordered" id="f-up-request-table" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Tanggal Request</th>
                            <th>Nama Pemohon</th>
                            <th>Jenis Kerusakan</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Target</th>
                            <th>Tanggal Selesai</th>
                            <th>Teknisi</th>
                            <th>Selesai/Cancel</th>
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