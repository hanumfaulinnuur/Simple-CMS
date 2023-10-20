@extends('layout.master')
@section('title', 'add-Berita')
@section('content')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Tambah Data Kategori Berita</h5><hr><br>

          <form method="POST" enctype="multipart/form-data" action="{{ route('artikel.store') }}">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                  <select name="category_id" class="form-select" aria-label="Default select example">
                    <option selected>Pilih jenis kategori</option>
                    @foreach ($category as $ca)
                    <option value="{{ $ca->id }}">{{ $ca->category_type }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Judul Berita</label>
              <div class="col-sm-10">
                <input type="text" name="title" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Author</label>
              <div class="col-sm-10">
                <input type="name" name="author" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
                <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Liputan</label>
                <div class="col-sm-10">
                  <input type="date" name="date" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Dokumentasi Gambar</label>
                <div class="col-sm-10">
                  <input class="form-control" name="picture" type="file"  accept="image/*">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Isi Berita</label>
                <div class="col-sm-10">
                  <textarea name="body" class="form-control" style="height: 100px"></textarea>
                </div>
              </div>

              <br><div class="row mb-3">
                <div class="col-sm-12">
                  <a class="btn btn-danger" href="{{ route('artikel.index') }}" role="button"><i class="bi bi-box-arrow-in-left"></i> Kembali</a>
                  <button type="submit" class="btn btn-primary"><i class="bi bi-check2-circle"></i> Simpan</button>
                </div>
              </div>
          </form>
        </div>
        </div>
</main>
@endsection