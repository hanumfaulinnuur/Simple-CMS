@extends('layout.master')
@section('content')
@section('title', 'Detail')
<div class="container pt-5 mt-5">
        <div class="card p-3 shadow-lg p-5 mb-5 bg-body-tertiary rounded">
            <a class="btn btn-link position-absolute top-0 start-20 my-4" href="{{route('home') }}" role="button">Kembali</a>
        <h3 class="fw-semibold text-uppercase mt-4">{{ $detail->title }}</h3>
        <div class="badge bg-info text-wrap mb-2" style="width: 10rem;">{{ $detail->category->category_type}}</div>
        <h5 class="fw-light">Penulis : {{ $detail->author }}</h5>
        <h6 class="fw-light">liputan pada {{ $detail->date }} | di update pada {{ $detail->updated_at->format('h:m, d-m-Y') }}</h6>
        <hr>
        <img src="{{ asset('upload/'.$detail->picture) }}" class=" img-fluid  rounded mx-auto d-block">
        <p style="text-align: justify;">{{ $detail->body }}</p>
        
    </div>
</div>
@endsection