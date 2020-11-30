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

@section('title', 'IKET - Edit Request')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Edit Request</h4>
                        <p class="card-category">Silakan isi form di bawah ini.</p>
                    </div>
                    <div class="card-body ">
                        <form id="createForm" method="POST"
                            action="{{ route('technician.f-up-request.update', $item->id) }}">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="request_created_date" class="form-control-label">Tanggal Request</label>
                                <input type="text" class="form-control" name="request_created_date"
                                    id="request_created_date" placeholder=""
                                    value="{{ $item->user_request->request_created_date }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="client_name" class="form-control-label">Pemohon</label>
                                <input type="text" class="form-control @error('client_name') is-invalid @enderror"
                                    name="client_name" id="client_name" placeholder="Nama Pemohon"
                                    value="{{ $item->user_request->client_name }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="department_id" class="form-control-label">Departemen</label>
                                <select name="department_id" id="department_id"
                                    class="custom-select form-control @error('department_id') is-invalid @enderror"
                                    readonly>
                                    <option value="{{ $item->user_request->department->id }}" selected>
                                        {{ $item->user_request->department->name }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="computer_id" class="form-control-label">Komputer</label>
                                <select name="computer_id" id="computer_id"
                                    class="custom-select form-control @error('computer_id') is-invalid @enderror"
                                    readonly>
                                    <option value="{{ $item->user_request->computer->id }}" selected>
                                        {{ $item->user_request->computer->ip. ' (' .$item->user_request->computer->comp_name. ')' }}
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="break_id" class="form-control-label">Jenis Kerusakan</label>
                                <select name="break_id" id="break_id"
                                    class="custom-select form-control @error('break_id') is-invalid @enderror" readonly>
                                    <option value="{{ $item->user_request->break_type->id }}" selected>
                                        {{ $item->user_request->break_type->name }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="kind_of_repair" class="form-control-label">Jenis Perbaikan</label>
                                <select name="kind_of_repair" id="kind_of_repair"
                                    class="custom-select form-control @error('kind_of_repair') is-invalid @enderror"
                                    readonly>
                                    <option value="{{ $item->user_request->kind_of_repair }}" selected>
                                        {{ $item->user_request->kind_of_repair }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description" class="form-control-label">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    name="description" id="description" placeholder="Deskripsi" rows="4"
                                    readonly>{{ $item->user_request->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="target_date" class="form-control-label">Tanggal Target</label>
                                <input type="text"
                                    class="form-control datepicker @error('target_date') is-invalid @enderror"
                                    name="target_date" id="target_date" placeholder=""
                                    value="{{ ($item->target_date) ? $item->target_date : old('target_date') }}"
                                    autofocus>
                                @error('target_date')
                                @include('includes.error-field')
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="target_completion_date" class="form-control-label">Tanggal Selesai</label>
                                <input type="text"
                                    class="form-control datepicker @error('target_completion_date') is-invalid @enderror"
                                    name="target_completion_date" id="target_completion_date" placeholder=""
                                    value="{{ ($item->target_completion_date) ? $item->target_completion_date : old('target_completion_date') }}">
                                @error('target_completion_date')
                                @include('includes.error-field')
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="technician" class="form-control-label">Teknisi</label>
                                <select name="technician" id="technician"
                                    class="custom-select form-control @error('technician') is-invalid @enderror">
                                    <option value="" selected>Pilih Teknisi</option>
                                    @foreach ($technicians as $technician)
                                    <option value="{{ $technician->name }}"
                                        {{ $item->technician == $technician->name || old('technician') == $technician->name ? "selected" : "" }}>
                                        {{ ($technician->name) ? $technician->name : old('technician') }}</option>
                                    @endforeach
                                </select>
                                @error('technician')
                                @include('includes.error-field')
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="is_done" class="form-control-label">Status</label>
                                <div class="form-control @error('is_done') is-invalid @enderror">
                                    <div class="form-check d-inline">
                                        <input class="form-check-input" type="radio" name="is_done" id="BELUM SELESAI"
                                            value="BELUM SELESAI"
                                            {{ $item->is_done == 'BELUM SELESAI' ? "checked" : "" }}>
                                        <label class="form-check-label" for="BELUM SELESAI">
                                            BELUM SELESAI
                                        </label>
                                    </div>&nbsp;
                                    <div class="form-check d-inline">
                                        <input class="form-check-input" type="radio" name="is_done" id="SELESAI"
                                            value="SELESAI" 
                                            {{ $item->is_done == 'SELESAI' ? "checked" : "" }}>
                                        <label class="form-check-label" for="SELESAI">
                                            SELESAI
                                        </label>
                                    </div>&nbsp;
                                    <div class="form-check d-inline">
                                        <input class="form-check-input" type="radio" name="is_done" id="BATAL"
                                            value="BATAL" 
                                            {{ $item->is_done == 'BATAL' ? "checked" : "" }}>
                                        <label class="form-check-label" for="BATAL">
                                            BATAL
                                        </label>
                                    </div>
                                </div>
                                @error('is_done')
                                @include('includes.error-field')
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="technician_note" class="form-control-label">Catatan Teknisi</label>
                                <textarea class="form-control @error('technician_note') is-invalid @enderror"
                                    name="technician_note" id="technician_note" placeholder="Catatan Teknisi"
                                    rows="4">{{ old('technician_note') }}</textarea>
                                @error('technician_note')
                                @include('includes.error-field')
                                @enderror
                            </div>

                            @include('includes.save-cancel-btn')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('before-style')
<link rel="stylesheet" href="{{ asset('assets/gijgo/css/gijgo.min.css') }}">
@endpush

@push('after-script')
<script src="{{ asset('assets/gijgo/js/gijgo.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.datepicker').each(function () {
            $(this).datepicker({
                format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap4',
                icons: {
                    rightIcon: '<i class="fas fa-calendar-alt"></i>'
                }
            })
        })
    });

</script>
@endpush
