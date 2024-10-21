@extends('layouts.app')
@section('judul', 'Alamat RT | Dukdes')
@section('content')
    <div class="page-heading">
        <h3>Alamat RT</h3>
    </div>
    <div class="page-content">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Alamat RT
                    <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal"
                        data-bs-target="#tambahModal">Tambah</button>
                </h4>
            </div>
            <!-- table head dark -->
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>RT</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($address as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->description }}</td>
                                <td class="d-flex gap-2">
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $item->id }}"><i
                                            class="bi bi-pencil-fill"></i></button>
                                    <form action="{{ route('address.destroy', $item->id) }}" method="POST"
                                        id="deleteForm-{{ $item->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="confirmDelete({{ $item->id }})"
                                            class="btn btn-sm btn-danger fw-bold" type="button">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end -->
    <!-- Modal Tambah -->
    <div class="modal fade text-left" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Tambah Alamat RT</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('address.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <label for="alamat">RT: </label>
                        <div class="form-group">
                            <input id="alamat" name="address" value="{{ old('address') }}" type="text"
                                placeholder="Masukkan RT anda" class="form-control">
                        </div>
                        <label for="deskripsi">Deskripsi: </label>
                        <div class="form-group">
                            <textarea id="deskripsi" name="description" type="text" placeholder="Masukkan Deskripsi Alamat RT"
                                class="form-control">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tutup</span>
                        </button>
                        <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tambah</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal ubah -->
    @foreach ($address as $item)
        <div class="modal fade text-left" id="modalEdit{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Ubah Alamat RT</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="{{ route('address.update', $item->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <label for="alamat">RT: </label>
                            <div class="form-group">
                                <input id="alamat" name="address" type="text" placeholder="Masukkan RT anda"
                                    value="{{ $item->address }}" class="form-control">
                            </div>
                            <label for="deskripsi">Deskripsi: </label>
                            <div class="form-group">
                                <textarea id="deskripsi" name="description" type="text" placeholder="Masukkan Deskripsi Alamat RT anda"
                                    class="form-control">{{ $item->description }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Tutup</span>
                            </button>
                            <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Ubah</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <script type="text/javascript">
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm-' + id).submit();
                }
            });
        }
    </script>
@endsection
