@extends('layout.master')
@section('title', 'add-Category')
@section('content')

<main id="main" class="main">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Tambah Data Kategori Berita</h5><hr><br>
          <form method="POST" action="{{ route('category.store') }}">
            @csrf
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Jenis Kategori</label>
              <div class="col-sm-10">
                <input type="text" name="category_type" class="form-control">
              </div>
            </div><br>
            <div class="row mb-3">
              <div class="col-sm-12">
                <a class="btn btn-danger" href="{{ route('category.index') }}" role="button"><i class="bi bi-box-arrow-in-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary"><i class="bi bi-check2-circle"></i> Simpan</button>
              </div>
            </div>

          </form>
        </div>
        </div>
</main>
        @endsection
