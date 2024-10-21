@extends('layouts.app')
@section('judul', 'Keluarga | Dukdes')
@section('content')
    <div class="page-heading">
        <h3>Keluarga</h3>
    </div>
    <div class="page-content">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Keluarga
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
                            <th>No.KK</th>
                            <th>Nama Kepala Keluarga</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($family as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->no_kk }}</td>
                                <td>{{ $item->head_family }}</td>
                                <td>{{ $item->address->address }}</td>
                                <td class="d-flex gap-2">
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $item->id }}"><i
                                            class="bi bi-pencil-fill"></i></button>
                                    <form action="{{ route('family.destroy', $item->id) }}" method="POST"
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
                    <h4 class="modal-title" id="myModalLabel33">Tambah Keluarga</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('family.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <label for="alamat">No KK: </label>
                        <div class="form-group">
                            <input id="alamat" name="no_kk" value="{{ old('no_kk') }}" type="text"
                                placeholder="Masukkan No Kartu Keluarga" class="form-control">
                        </div>
                        <label for="deskripsi">Nama Kepala Keluarga: </label>
                        <div class="form-group">
                            <input id="alamat" name="head_family" value="{{ old('head_family') }}" type="text"
                                placeholder="Masukkan Nama Kepala Keluarga" class="form-control">
                        </div>
                        <label for="deskripsi">Alamat RT: </label>
                        <div class="form-group">
                            <select name="address_id" class="form-select" id="basicSelect">
                                <option>Pilih RT</option>
                                @foreach ($address as $a)
                                    <option value="{{ $a->id }}"
                                        {{ old('address_id') == $a->id ? 'selected' : '' }}>
                                        {{ $a->address }}
                                    </option>
                                @endforeach
                            </select>
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
    @foreach ($family as $item)
        <div class="modal fade text-left" id="modalEdit{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Ubah Data Keluarga</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="{{ route('family.update', $item->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <label for="alamat">No KK: </label>
                            <div class="form-group">
                                <input id="alamat" name="no_kk" value="{{ $item->no_kk }}" type="text"
                                    placeholder="Masukkan Nomer Kartu Keluarga" class="form-control">
                            </div>
                            <label for="deskripsi">Nama Kepala Keluarga: </label>
                            <div class="form-group">
                                <input id="alamat" name="head_family" value="{{ $item->head_family }}"
                                    type="text" placeholder="Masukkan Nama Kepala Keluarga" class="form-control">
                            </div>
                            <label for="deskripsi">Alamat RT: </label>
                            <div class="form-group">
                                <select name="address_id" class="form-select" id="basicSelect">
                                    <option>Pilih RT</option>
                                    @foreach ($address as $a)
                                        <option value="{{ $a->id }}"
                                            {{ $a->id == $item->address_id ? 'selected' : '' }}>
                                            {{ $a->address }}
                                        </option>
                                    @endforeach
                                </select>
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
