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

 @section('title', 'IKET - Break Type List')

 @section('content')
 <div class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="card ">
                  <div class="card-header ">
                      <h4 class="card-title">List Jenis Kerusakan</h4>
                      <p class="card-category">yang terdaftar di sistem</p>
                  </div>
                  <div class="card-body ">

                    <div class="table-responsive overflow-auto">
                      <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Kerusakan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          @forelse ($items as $item)
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->name }}</td>
                          @empty
                            <td colspan="3">Tidak ada data yang dapat ditampilkan</td>
                          @endforelse
                          </tr>
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