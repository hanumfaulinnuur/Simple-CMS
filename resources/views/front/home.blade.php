@extends('layout.master')
@section('content')
@section('title', 'Dahboard')

<br><br>
<div class="container mt-5 ">
    <div class="row">
        @foreach($artikel as $ar)
        <div class="col-6">
          <a href="{{ url('/detail', $ar->id) }}">
            <div class="card mb-3" style="width: auto;">
                <img src="{{ asset('upload/'.$ar->picture) }}" class="card-img-top" alt="...">
              </a>
                <div class="card-body">
                  <h5 class="card-title">{{ $ar->title }}</h5>
                  <p class="card-text">{{ $ar->category->category_type }}</p>
                  <p class="card-text"><small class="text-body-secondary">Last updated {{ $ar->updated_at->format('h:m, d-m-Y') }}</small></p>
                </div>
              </div>
          
        </div>
    @endforeach
</div>
@endsection