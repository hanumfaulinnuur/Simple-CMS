@extends('layout.master')
@section('title', 'View-Category')
@section('content')

<main id="main" class="main">
  <div class="card">
      <div class="card-body">
        <h5 class="card-title">List User Yang Terdaftar</h5>

        @if (Session::has('success'))
         <div class="alert alert-info">{{ Session('success') }}</div>
       @endif

        <table class="table table-striped table-bordered ">
          <thead>
            <tr >
              <th  scope="col">No</th>
              <th  scope="col">ID</th>
              <th scope="col">Jenis Kategori</th>
              <th scope="col">Slug</th>
              <th class="text-center" scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($category as $key => $ca)
            <tr>
              <th scope="row">{{ $key+1 }}</th>
              <td>{{ $ca->id }}</td>
              <td>{{ $ca->category_type}}</td>
              <td>{{ $ca->slug}}</td>
              <td class="text-center">
                <a class="btn btn-primary" href="{{ route('category.edit', $ca->id) }}"><i class="bi bi-pencil-square"></i>Edit</a>
                <form action="{{ route('category.destroy', $ca->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('delete')
                  <button class=" btn btn-danger"><i class="bi bi-trash3-fill"></i> Delete</button>
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