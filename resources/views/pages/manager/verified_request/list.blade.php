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

 @section('title', 'IKET - Verified Request List')
 
 @section('content')
 <div class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-12">
                 <div class="card ">
                     <div class="card-header ">
                         <h4 class="card-title">List Request Diverifikasi</h4>
                         <p class="card-category">Request dari semua user</p>
                     </div>
                     <div class="card-body ">
 
                         <div class="table-responsive overflow-auto">
                             <table class="table table-bordered" id="verified-request-table" width="100%" cellspacing="0">
                                 <thead>
                                     <tr>
                                         <th>ID Req.</th>
                                         <th>Tgl Req.</th>
                                         <th>Pemohon</th>
                                         <th>Jenis Kerusakan</th>
                                         <th>Deskripsi</th>
                                         <th>Tgl Target</th>
                                         <th>Tgl Selesai</th>
                                         <th>Teknisi</th>
                                         <th>Status</th>
                                         <th>Catatan Teknisi</th>
                                         <th>TTD</th>
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
         $('#verified-request-table').DataTable({
             processing: true,
             serverSide: true,
             ajax: '{{ route('manager.verified-request.json') }}',
             columns: [{
                     data: 'followed_up_request.request_id',
                     name: 'followed_up_request.request_id'
                 },
                 {
                     data: 'followed_up_request.user_request.request_created_date',
                     name: 'followed_up_request.user_request.request_created_date'
                 },
                 {
                     data: 'followed_up_request.user_request.client_name',
                     name: 'followed_up_request.user_request.client_name'
                 },
                 {
                     data: 'followed_up_request.user_request.break_type.name',
                     name: 'followed_up_request.user_request.break_type.name'
                 },
                 {
                     data: 'followed_up_request.user_request.description',
                     name: 'followed_up_request.user_request.description'
                 },
                 {
                     data: 'followed_up_request.target_date',
                     name: 'followed_up_request.target_date'
                 },
                 {
                     data: 'followed_up_request.target_completion_date',
                     name: 'followed_up_request.target_completion_date'
                 },
                 {
                     data: 'followed_up_request.technician',
                     name: 'followed_up_request.technician'
                 },
                 {
                     "data": "followed_up_request.is_done",
                     "render": function (data, type, row, meta) {
                         if (data === 'SELESAI') {
                             return '<span class="badge badge-success">SELESAI</span>';
                         } else if (data === 'BATAL') {
                             return '<span class="badge badge-danger">BATAL</span>';
                         } else if (data === 'BELUM SELESAI') {
                             return '<span class="badge badge-secondary">BELUM SELESAI</span>';
                         } else {
                             return '';
                         }
                     }
                 },
                 {
                     data: 'followed_up_request.technician_note',
                     name: 'followed_up_request.technician_note'
                 },
                 {
                     data: 'action',
                     name: 'action'
                 }
             ],
             order: [0, 'desc'],
             stateSave: true
         });
     });
 
 </script>
 @endpush
 
 @include('includes.notification')