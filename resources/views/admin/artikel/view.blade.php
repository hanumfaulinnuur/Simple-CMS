@extends('layout.master')
@section('title', 'View-Berita')
@section('content')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">List Berita Yang Tersimpan</h5>
  
          @if (Session::has('success'))
           <div class="alert alert-info">{{ Session('success') }}</div>
         @endif
  
          <table class="table table-striped table-bordered ">
            <thead>
              <tr >
                <th  scope="col">No</th>
                <th  scope="col">ID</th>
                <th scope="col">Kategori</th>
                <th scope="col">Slug</th>
                <th scope="col">Tanggal Liputan</th>
                <th scope="col">Gambar</th>
                <th scope="col">Author</th>
                <th class="text-center" scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($berita as $key => $B)
              <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $B->id }}</td>
                <td>{{ $B->category->category_type}}</td>
                <td>{{ $B->slug}}</td>
                <td>{{ $B->date}}</td>
                <td><img src="{{ asset('upload/'.$B->picture) }}" width="60px"></td>
                <td>{{ $B->author}}</td>
                <td class="text-center">
                  <a class="btn btn-primary" href="{{ route('artikel.edit', $B->id) }}"><i class="bi bi-pencil-square"></i></a>
                  <form action="{{ route('artikel.destroy', $B->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class=" btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                  </form>
                </td>
              </tr>                
              @endforeach
            </tbody>
          </table>
  
        </div>
    </div>
  </main>
@endsection