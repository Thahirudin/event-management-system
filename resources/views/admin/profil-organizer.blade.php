@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
    Profil Organizer
@endsection
@section('kategori')
    active active-menu
@endsection
@section('content')
               <div class="iq-card">
                  <div class="iq-card-body profile-page">
                     <div class="profile-header">
                        <div class="cover-container text-center">
                           <img src="{{ asset('uploads/organizers'). '/' .  $organizer->profil  }}" alt="user" class="rounded-circle img-fluid img-thumbnail" style="max-width: 200px; max-height: 200px;">
                           <div class="profile-detail mt-3">
                              <h3>{{ $organizer->nama }}</h3>
                              {{ $organizer->jabatan }}
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="iq-card">
                  <div class="iq-card-header d-flex justify-content-between align-items-center mb-0">
                     <div class="iq-header-title">
                        <h4 class="card-title mb-0">Personal Details</h4>
                     </div>
                  </div> 
                  <div class="iq-card-body">
                     <ul class="list-inline p-0 mb-0">
                        <li>
                           <div class="row align-items-center justify-content-between mb-3">
                              <div class="col-sm-6">
                                 <h6>Nama</h6>                                       
                              </div>
                              <div class="col-sm-6">
                              {{ $organizer->nama }}                                  
                              </div>
                           </div>
                        </li>
                        <li>
                           <div class="row align-items-center justify-content-between mb-3">
                              <div class="col-sm-6">
                                 <h6>Tanggal Lahir</h6>                                       
                              </div>
                              <div class="col-sm-6">
                               {{ $organizer->tanggal_lahir }}                                   
                              </div>
                           </div>
                        </li>
                        <li>
                           <div class="row align-items-center justify-content-between mb-3">
                              <div class="col-sm-6">
                                 <h6>Email</h6>                                       
                              </div>
                              <div class="col-sm-6">
                                {{ $organizer->email }}                                      
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>        
@endsection
@section('addJs')
    {{-- Masukkan dibawah ini jika ingin menambahkan JS --}}
@endsection
