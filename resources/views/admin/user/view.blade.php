@extends('layout.master')
@section('title', 'Home')
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
              <tr class="text-center">
                <th  scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Jenis Akun</th>
                <th scope="col">Tanggal Bergabung</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $us)
              <tr>
                <th class="text-center" scope="row">{{ $us->id }}</th>
                <td>{{ $us->name }}</td>
                <td>{{ $us->email }}</td>
                <td>{{ ($us->type == 0) ? "Reader" : "Administrator" }}</td>
                <td>{{ $us->created_at }}</td>
                <td class="text-center">
                  <form action="{{ route('user.destroy', $us->id) }}" method="POST" class="d-inline">
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