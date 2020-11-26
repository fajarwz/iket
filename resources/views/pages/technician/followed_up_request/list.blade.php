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
                            <th>ID Request</th>
                            <th>Tanggal Request</th>
                            <th>Nama Pemohon</th>
                            <th>Jenis Kerusakan</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Target</th>
                            <th>Tanggal Selesai</th>
                            <th>Teknisi</th>
                            <th>Selesai/Batal</th>
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
  $(function() {
    $('#f-up-request-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{{ route('technician.f-up-request.json') }}',
      columns: [
          {data: 'request_id', name: 'request_id'},
          {data: 'user_request.request_created_date', name: 'user_request.request_created_date'},
          {data: 'user_request.client_name', name: 'user_request.client_name'},
          {data: 'user_request.break_type.name', name: 'user_request.break_type.name'},
          {data: 'user_request.description', name: 'user_request.description'},
          {data: 'target_date', name: 'target_date'},
          {data: 'target_completion_date', name: 'target_completion_date'},
          {data: 'technician', name: 'technician'},
          // {data: 'is_done', name: 'is_done'},
          {
            "data": "is_done",
            "render": function ( data, type, row, meta ) {
              // return '<a href="'+data+'">Download</a>';
              if (data === 'YES'){
                return '<span class="badge badge-success">SELESAI</span>';
              } else if (data === 'CANCELED') {
                return '<span class="badge badge-danger">BATAL</span>'; 
              } else {
                return '';
              }
            }
          },
          {data: 'action', name: 'action'} 
      ],
      order: [0, 'desc']
    });
  });
  </script>
@endpush