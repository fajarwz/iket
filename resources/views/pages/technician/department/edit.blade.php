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

 @section('title', 'IKET - Edit Department')
 
 @section('content')
 <div class="content">
     <div class="container-fluid">
         <div class="row justify-content-center">
             <div class="col-6">
                 <div class="card ">
                     <div class="card-header ">
                         <h4 class="card-title">Edit Departemen</h4>
                         <p class="card-category">Silakan isi form di bawah ini.</p>
                     </div>
                     <div class="card-body ">
                         <form id="createForm" method="POST" action="{{ route('department.update', $item->id) }}">
                            @method('PUT')   
                            @csrf
                             <div class="form-group">
                              <label for="dept_code" class="form-control-label">Kode</label>
                              <input type="text" class="form-control @error('dept_code') is-invalid @enderror" 
                              name="dept_code" id="dept_code" 
                              placeholder="Kode Departemen"
                              value="{{ $item->dept_code }}" autofocus>
                              @error('dept_code')
                                @include('includes.error-field')
                              @enderror
                            </div>
                         
                             <div class="form-group">
                              <label for="name" class="form-control-label">Nama</label>
                              <input type="text" class="form-control @error('name') is-invalid @enderror" 
                              name="name" id="name" 
                              placeholder="Nama Departemen"
                              value="{{ $item->name }}" >
                              @error('name')
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
