@extends('welcome')
@section('content')
<div class="content">
<x-navbar></x-navbar>
@include('Copias.create')
<div class="d-flex justify-content-end mt-4 mb-4">
    <button type="button" class="btn btn-primary me-5" data-bs-toggle="modal" data-bs-target="#nuevo">
      Nuevo
    </button>
</div>
</div>
@endsection