@extends('layouts.index')
@section('content')
<nav class="navbar navbar-expand-lg bg-white">
  <a class="navbar-brand" href="#">Laptop's</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto navbar-right-top">
          <li class="nav-item dropdown nav-user">
              <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-user"></i></a>
              <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                  {{-- <div class="nav-user-info">
                      <p class="mb-0 nav-user-name">{{Auth::user()->username}}</p>
                  </div> --}}
                  <a class="dropdown-item" href="/logout">
                      <i class="fas fa-power-off mr-2"></i>Logout
                  </a>
              </div>
          </li>
      </ul>
  </div>
</nav>
<div class="card">
  <div class="card-header text-center">
    <div class="text"  style="text-align: left;">
      <img src="{{asset('assets/img/wk.png')}}" class="rounded-circle" width="40" style="margin-left: 950px;">
      <h3>Lab RPL/PPLG</h3>
      <h4>Laptop Landing</h4>
    </div>
    <center><img src="{{asset('assets/img/pplg.jpeg')}}" class="round-circle" width="75"></center>
    <div class="link">
      <a href="">Laptop Landing</a>
      <a class="arrow">>></a>
      <a href="create" class="text-primary">New</a>
      <a class="arrow">>></a>
      <a href="/home" class="text-primary">Data</a>
      <br><br>
  </div>
  </div>
  <div class="card-body">
    <div class="text" style="text-align:">
      <h2>Laptop Landing Data</h2>
      <h4>Data sort by date loaned</h4>
    </div>
    @if (Session::get('notAllowed'))
    <div class="alert alert-success w-100 text-center">
        {{Session::get('notAllowed')}}
    </div>
    @endif
    @if (Session::get('yes'))
    <div class="alert alert-success w-100 text-center">
        {{Session::get('yes')}}
    </div>
    @endif
    @if (Session::get('done'))
    <div class="alert alert-success w-100 text-center">
        {{Session::get('done')}}
    </div>
    @endif
    @if (Session::get('successAdd'))
    <div class="alert alert-success w-100 text-center">
        {{Session::get('successAdd')}}
    </div>
  @endif
  @if (Session::get('successDelete'))
    <div class="alert alert-success w-100 text-center">
        {{Session::get('successDelete')}}
    </div>
  @endif
  <div class="container mx-auto">
      <table class="table text-center">
          <thead>
            <tr>
              <th scope="col">Nis</th>
              <th scope="col">Nama</th>
              <th scope="col">Rayon</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Date</th>
              <th scope="col">Return Date</th>
              <th scope="col">Guru</th>
              <th scope="col" colspan="2">Action</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            @foreach($laptops as $laptop)
            <tr>
              <td>{{ $laptop->nis}}</td>
              <td>{{ $laptop->nama }}</td>
              <td>{{ $laptop->rayon}}</td>
              <td>{{ $laptop->keterangan}}</td>
              <td>{{ $laptop->deskripsi}}</td>
              <td>{{ \Carbon\Carbon::parse($laptop['tanggal_pinjam'])->format('j F, Y') }}</td>
              <td>{{ $laptop['status'] ? \Carbon\Carbon::parse($laptop['done_time'])->format('j F, Y')  : '-'}}</td>
              {{-- <td>{{  \Carbon\Carbon::parse ($laptop['tanggal_pinjam'])->format ('J,F, Y')}}</td>
              <td>{{  is_null ($laptop['return_date'])? '-' : \Carbon\Carbon::parse ($laptop['return_date'])->format ('J,F, Y')}}</td> --}}
              <td>{{  $laptop['guru']}}</td>
              {{-- <td><a href="/edit/{{$laptop['id']) }}" class="fas fa-pen text-dark btn"></a> --}}
                <td><form action="/complated/{{$laptop['id']}}" method="POST">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="fa-solid fa-arrow-up"></button>
                </form></td>
                <td><form action="{{ route('delete', $laptop['id'])}}" method="POST">
                  @csrf 
                  @method('DELETE')
                  <button class="fa-solid fa-trash"></button>
                </form></td>
            </tr>
            @endforeach

          </tbody>
        </table>
  </div>
  </div>
  @endsection
