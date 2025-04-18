@extends('layouts.app')

@section('title', 'SGCA')
    
@section('content')

<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('img/01.jpg') }}" class="d-block w-100" alt="carrusel1">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('img/02.jpeg') }}" class="d-block w-100" alt="carrusel2">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('img/03.jpeg') }}" class="d-block w-100" alt="carrusel3">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

@endsection