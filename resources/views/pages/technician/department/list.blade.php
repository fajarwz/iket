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

@section('title', 'IKET - Department List')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">List Departemen</h4>
                        <p class="card-category">yang terdaftar di sistem</p>
                    </div>
                    <div class="card-body ">

                        <a href="{{ route('department.create') }}" class="btn btn-primary btn-sm mb-2">
                            <i class="fas fa-plus"></i>&nbsp;&nbsp;Buat Data Departemen
                        </a>

                        <div class="table-responsive overflow-auto">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)
                                    <tr>
                                        <td>{{ $item->dept_code }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{ route('department.edit', $item->id) }}"
                                                class="btn btn-primary btn-sm mb-2" id="">
                                                <i class="fas fa-edit"></i>&nbsp;&nbsp;Edit
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3">Tidak ada data yang dapat ditampilkan</td>
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

@push('after-style')
{{-- Datatables  --}}
<link href="{{ asset('assets/css/datatables.min.css') }}" rel="stylesheet" />
@endpush

@push('after-script')
{{-- DataTables  --}}
<script src="{{ asset('assets/js/datatables.min.js') }}" type="text/javascript"></script>

<script>
    $('#computer-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('
        computer.json ') }}',
        columns: [{
                data: 'ip',
                name: 'ip'
            },
            {
                data: 'comp_name',
                name: 'comp_name'
            },
            {
                data: 'user_name',
                name: 'user_name'
            },
            {
                data: 'action',
                name: 'action'
            }
        ]
    });

</script>
@endpush
