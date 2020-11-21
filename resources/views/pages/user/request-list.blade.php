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

                    {{-- <a 
                      id="create-request"
                      href="#dynModal" 
                      data-remote="{{ route('user.request.create') }}" 
                      data-toggle="modal"
                      data-target="#dynModal"
                      data-action="{{ route('user.request.store') }}"
                      data-title="Buat Request"
                      class="btn btn-primary btn-sm mb-2" id="">
                      <i class="fas fa-plus"></i>&nbsp;&nbsp;Buat Request
                    </a> --}}

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
                            <th>Nama Komputer</th>
                            <th>Jenis Kerusakan</th>
                            <th>Jenis Perbaikan</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        {{-- <tbody>
                          @forelse ($items as $item)
                            <tr>
                              <td>{{ $item->id }}</td>
                              <td>{{ $item->request_created_date }}</td>
                              <td>{{ $item->client_name }}</td>
                              <td>{{ $item->department->id. ' - ' .$item->department->name }}</td>
                              <td>{{ $item->computer->ip }}</td>
                              <td>{{ $item->computer->comp_name }}</td>
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
                              <td colspan="10" class="text-center">
                                Data Kosong
                              </td>
                            </tr>
                          @endforelse
                        </tbody> --}}

                      </table>
                    </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<!-- Modal -->
{{-- <div class="modal fade" id="theModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Buat Request</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">
              <div class="alert alert-danger" style="display:none"></div>
              <form id="createForm" method="POST" action="{{ route('user.request.store') }}">

                {{ csrf_field() }}  
                  
                  <div class="form-group">
                    <label for="request_created_date" class="form-control-label">Tanggal Request</label>
                    <input type="text" class="form-control" name="request_created_date" 
                      id="request_created_date" placeholder="" value="{{ \Carbon\Carbon::today('Asia/Phnom_Penh')->toDateString() }}" readonly>
                  </div>
                  
                  <div class="form-group">
                    <label for="client_name" class="form-control-label">Nama Pemohon</label>
                    <input type="text" class="form-control" name="client_name" 
                      id="client_name" placeholder="Nama Pemohon" value="{{ old('client_name') }}" autofocus>
                    @error('client_name')
                      <div class="text-muted">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label for="department_id" class="form-control-label">Departemen</label>
                    <select 
                      name="department_id" 
                      id="department_id" 
                      class="custom-select form-control"
                    >
                      <option value="" selected>Pilih Departemen</option>
                      @foreach ($departments as $department)
                        <option value="{{ $department->id }}" {{ old("department_id") === $department->id ? "selected":"" }}>{{ $department->name }}</option>  
                      @endforeach
                    </select>
                    @error('department_id')
                      <div class="text-muted">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label for="computer_id" class="form-control-label">Komputer</label>
                    <select 
                      name="computer_id" 
                      id="computer_id" 
                      class="custom-select form-control"
                    >
                      <option value="" selected>Pilih Komputer</option>
                      @foreach ($computers as $computer)
                        <option value="{{ $computer->id }}" {{ old("computer_id") === $computer->id ? "selected":"" }}>{{ $computer->ip. ' (' .$computer->comp_name.')' }}</option>  
                      @endforeach
                    </select>
                    @error('computer_id')
                      <div class="text-muted">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label for="break_id" class="form-control-label">Jenis Kerusakan</label>
                    <select 
                      name="break_id" 
                      id="break_id" 
                      class="custom-select form-control"
                    >
                      <option value="" selected>Pilih Jenis Kerusakan</option>
                      @foreach ($break_types as $break_type)
                        <option value="{{ $break_type->id }}" {{ old("break_id") === $break_type->id ? "selected":"" }}>{{ $break_type->name }}</option>
                      @endforeach
                    </select>
                    @error('break_id')
                      <div class="text-muted">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label for="kind_of_repair" class="form-control-label">Jenis Perbaikan</label>
                    <select 
                      name="kind_of_repair" 
                      id="kind_of_repair" 
                      class="custom-select form-control"
                    >
                      <option value="" selected>Pilih Jenis Perbaikan</option>
                      <option value="PERBAIKAN">PERBAIKAN</option>
                      <option value="FASILITAS">FASILITAS</option>
                    </select>
                    @error('kind_of_repair')
                      <div class="text-muted">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label for="description" class="form-control-label">Deskripsi</label>
                    <textarea 
                      class="form-control" 
                      name="description" 
                      id="description" 
                      placeholder="Deskripsi"
                      rows="2"
                    >{{ old('description') }}</textarea>
                    @error('description')
                      <div class="text-muted">{{ $message }}</div>
                    @enderror
                  </div>


              </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary mr-2" id="formSubmit">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>--}}
 @endsection 