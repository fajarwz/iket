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

 @section('title', 'IKET - Technician Dashboard')
 
 @section('content')
 <div class="content">
     <div class="container-fluid container-dashboard">

         <div class="row">
             <div class="container">
                <h3>&nbsp;Selamat Datang, {{ Auth::user()->name }}!</h3>
             </div>
         </div>

         <div class="row">
 
             <div class="col-md-3">
                 <div class="card-counter primary">
                     <i class="fas fa-calendar"></i>
                     <span class="count-numbers">{{ $req_today }}</span>
                     <span class="count-name">Request Hari Ini</span>
                 </div>
             </div>
 
             <div class="col-md-3">
                 <div class="card-counter primary">
                     <i class="fas fa-calendar-alt"></i>
                     <span class="count-numbers">{{ $req_alltime }}</span>
                     <span class="count-name">Request Sepanjang Waktu</span>
                 </div>
             </div>
 
         </div>
     </div>
 </div>
 @endsection
 