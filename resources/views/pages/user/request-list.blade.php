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

                    <div class="table-responsive">
                      <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                              <th>ID</th>
                              <th>Title</th>
                              <th>Location</th>
                              <th>Departure Date</th>
                              <th>Type</th>
                              <th>Duration</th>
                              <th>Price</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($items as $item)
                            {{-- <tr>
                              <td>{{ $item->id }}</td>
                              <td>{{ $item->title }}</td>
                              <td>{{ $item->location }}</td>
                              <td>{{ $item->departure }}</td>
                              <td>{{ $item->type }}</td>
                              <td>{{ $item->duration }}</td>
                              <td>${{ $item->price }}</td>
                              <td>
                                <a href="{{ route('travel-package.edit', $item->id) }}" class="btn btn-info">
                                  <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('travel-package.destroy', $item->id) }}" method="POST"
                                  class="d-inline">
                                  @csrf
                                  @method('delete')
                                  <button class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                  </button>
                                </form>
                              </td>
                            </tr> --}}
                          @empty
                            <tr>
                              <td colspan="8" class="text-center">
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