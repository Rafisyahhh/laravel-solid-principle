@extends('layouts.app')
@section('judul', 'Penduduk Desa | Dukdes')
@section('content')
    <div class="page-heading">
        <h3>Penduduk Desa</h3>
    </div>
    <div class="page-content">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Penduduk
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
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Pendidikan</th>
                            <th>Pekerjaan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resident as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset('storage/' . $item->foto) }}" style="width:5rem;" alt=""
                                        srcset=""></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->place_birth }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->date_birth)->translatedFormat('d F Y') }}</td>
                                <td>{{ $item->gender }}</td>
                                <td>{{ $item->address->address }}</td>
                                <td>{{ $item->education->education }}</td>
                                <td>{{ $item->work->work }}</td>
                                <td>{{ $item->status->status }}</td>
                                <td class="d-flex gap-2">
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $item->id }}"><i
                                            class="bi bi-pencil-fill"></i></button>
                                    <form action="{{ route('resident.destroy', $item->id) }}" method="POST"
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
                    <h4 class="modal-title" id="myModalLabel33">Tambah Penduduk Desa</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('resident.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <label for="alamat">Foto: </label>
                                <div class="form-group">
                                    <input id="alamat" name="foto" value="{{ old('foto') }}" type="file"
                                        placeholder="Masukkan Foto" class="form-control">
                                </div>
                                <label for="alamat">Nama: </label>
                                <div class="form-group">
                                    <input id="alamat" name="name" value="{{ old('name') }}" type="text"
                                        placeholder="Masukkan Nama Penduduk" class="form-control">
                                </div>
                                <label for="deskripsi">Tempat Lahir: </label>
                                <div class="form-group">
                                    <input id="alamat" name="place_birth" value="{{ old('place_birth') }}"
                                        type="text" placeholder="Masukkan Tempat Lahir" class="form-control">
                                </div>
                                <label for="deskripsi">Tanggal Lahir: </label>
                                <div class="form-group">
                                    <input id="alamat" name="date_birth" value="{{ old('date_birth') }}" type="date"
                                        placeholder="Masukkan Tanggal Lahir" class="form-control">
                                </div>
                                <label for="deskripsi">Jenis Kelamin: </label>
                                <div class="form-group">
                                    <select name="gender" class="form-select" id="basicSelect">
                                        <option>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">
                                            Laki-laki
                                        </option>
                                        <option value="Perempuan">
                                            Perempuan
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
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
                                <label for="deskripsi">Pendidikan: </label>
                                <div class="form-group">
                                    <select name="education_id" class="form-select" id="basicSelect">
                                        <option>Pilih Pendidikan</option>
                                        @foreach ($education as $e)
                                            <option value="{{ $e->id }}"
                                                {{ old('education_id') == $e->id ? 'selected' : '' }}>
                                                {{ $e->education }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="deskripsi">Pekerjaan: </label>
                                <div class="form-group">
                                    <select name="work_id" class="form-select" id="basicSelect">
                                        <option>Pilih Pekerjaan</option>
                                        @foreach ($work as $w)
                                            <option value="{{ $w->id }}"
                                                {{ old('work_id') == $w->id ? 'selected' : '' }}>
                                                {{ $w->work }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="deskripsi">Status: </label>
                                <div class="form-group">
                                    <select name="status_id" class="form-select" id="basicSelect">
                                        <option>Pilih Status</option>
                                        @foreach ($status as $s)
                                            <option value="{{ $s->id }}"
                                                {{ old('status_id') == $s->id ? 'selected' : '' }}>
                                                {{ $s->status }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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
    @foreach ($resident as $item)
        <div class="modal fade text-left" id="modalEdit{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Ubah Data Penduduk</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="{{ route('resident.update', $item->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <label for="alamat">Foto: </label>
                                    <div class="form-group">
                                        <input id="alamat" name="foto" value="{{ old('foto') }}" type="file"
                                            placeholder="Masukkan Foto" class="form-control">
                                    </div>
                                    <label for="alamat">Nama: </label>
                                    <div class="form-group">
                                        <input id="alamat" name="name" value="{{ $item->name }}" type="text"
                                            placeholder="Masukkan Nama Penduduk" class="form-control">
                                    </div>
                                    <label for="deskripsi">Tempat Lahir: </label>
                                    <div class="form-group">
                                        <input id="alamat" name="place_birth" value="{{ $item->place_birth }}"
                                            type="text" placeholder="Masukkan Tempat Lahir" class="form-control">
                                    </div>
                                    <label for="deskripsi">Tanggal Lahir: </label>
                                    <div class="form-group">
                                        <input id="alamat" name="date_birth" value="{{ $item->date_birth }}"
                                            type="date" placeholder="Masukkan Tanggal Lahir" class="form-control">
                                    </div>
                                    <label for="deskripsi">Jenis Kelamin: </label>
                                    <div class="form-group">
                                        <select name="gender" class="form-select" id="basicSelect">
                                            <option>Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki" @if ($item->gender == 'Laki-laki') selected @endif>
                                                Laki-laki
                                            </option>
                                            <option value="Perempuan" @if ($item->gender == 'Perempuan') selected @endif>
                                                Perempuan
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
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
                                    <label for="deskripsi">Pendidikan: </label>
                                    <div class="form-group">
                                        <select name="education_id" class="form-select" id="basicSelect">
                                            <option>Pilih Pendidikan</option>
                                            @foreach ($education as $e)
                                                <option value="{{ $e->id }}"
                                                    {{ $e->id == $item->education_id ? 'selected' : '' }}>
                                                    {{ $e->education }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="deskripsi">Pekerjaan: </label>
                                    <div class="form-group">
                                        <select name="work_id" class="form-select" id="basicSelect">
                                            <option>Pilih Pekerjaan</option>
                                            @foreach ($work as $w)
                                                <option value="{{ $w->id }}"
                                                    {{ $w->id == $item->work_id ? 'selected' : '' }}>
                                                    {{ $w->work }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="deskripsi">Status: </label>
                                    <div class="form-group">
                                        <select name="status_id" class="form-select" id="basicSelect">
                                            <option>Pilih Status</option>
                                            @foreach ($status as $s)
                                                <option value="{{ $s->id }}"
                                                    {{ $s->id == $item->status_id ? 'selected' : '' }}>
                                                    {{ $s->status }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
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
