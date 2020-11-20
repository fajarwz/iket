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

                    {{-- <a href="{{ route('user.request.create') }}" class="btn btn-sm btn-primary mb-2">
                      + Buat Request
                    </a> --}}

                    <a 
                      href="#dynModal" 
                      data-remote="{{ route('user.request.create') }}" 
                      data-toggle="modal"
                      data-target="#dynModal"
                      data-action="{{ route('user.request.store') }}"
                      data-title="Buat Request"
                      class="btn btn-primary btn-sm mb-2" id="">
                      + Buat Request
                    </a>

                    <div class="table-responsive">
                      <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Tanggal Request</th>
                            <th>Nama Pemohon</th>
                            <th>Departemen</th>
                            <th>IP Komputer</th>
                            <th>Nama Komputer</th>
                            <th>Jenis Kerusakan</th>
                            <th>Jenis Perbaikan</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($items as $item)
                            <tr>
                              <td>{{ $item->id }}</td>
                              <td>{{ $item->request_created_date }}</td>
                              <td>{{ $item->client_name }}</td>
                              <td>
                                @foreach ($departments as $department)
                                    @if ($department->id === $item->department_id)
                                      {{ $department->id. ' - ' .$department->name }}
                                    @endif
                                @endforeach
                              </td>
                              
                              @foreach ($computers as $computer)
                                @if ($computer->id === $item->computer_id)
                                  <td>
                                    {{ $computer->ip }}
                                  </td>
                                  <td>
                                    {{ $computer->comp_name }}
                                  </td>
                                @endif
                              @endforeach

                              <td>
                                @foreach ($break_types as $break_type)
                                    @if ($break_type->id === $item->break_id)
                                      {{ $break_type->name }}
                                    @endif
                                @endforeach
                              </td>
                              
                              <td>{{ $item->kind_of_repair }}</td>
                              <td>{{ $item->description }}</td>
                              <td>
                                <a href="{{ route('user.request.print') }}">Print</a>
                                {{-- <a href="{{ route('travel-package.edit', $item->id) }}" class="btn btn-info">
                                  <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('travel-package.destroy', $item->id) }}" method="POST"
                                  class="d-inline">
                                  @csrf
                                  @method('delete')
                                  <button class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                  </button>
                                </form> --}}
                              </td>
                            </tr>
                          @empty
                            <tr>
                              <td colspan="10" class="text-center">
                                Data Kosong
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