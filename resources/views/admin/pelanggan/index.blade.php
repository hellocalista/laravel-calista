@extends('layouts.admin.app')

@section('content')

<!-- Main Content -->
<div class="py-4">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="#">
                    <i class="fas fa-home text-danger"></i>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('pelanggan.index') }}" class="text-danger">
                    Pelanggan
                </a>
            </li>
        </ol>
    </nav>

    <!-- Judul -->
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">

        <div class="mb-3 mb-lg-0">
            <h1 class="h4 text-danger fw-bold">
                <i class="fas fa-heart me-2"></i>
                Data Pelanggan ♡
            </h1>

            <p class="text-muted mb-0">
                Daftar seluruh data pelanggan 💗
            </p>
        </div>

        <div>
            <a href="{{ route('pelanggan.create') }}"
               class="btn btn-danger text-white rounded-pill shadow-sm">

                <i class="fas fa-plus-circle me-2"></i>
                Tambah Pelanggan
            </a>
        </div>

    </div>
<form method="GET" action="{{ route('pelanggan.index') }}" onchange="this.form.submit()" class="mb-3">
          <div class="row">
              <div class="col-md-2">
                  <select name="gender" onchange="this.form.submit()" class="form-select">
                      <option value="">All</option>
                      <option value="Male" >Male</option>
                      <option value="Female">Female</option>
                  </select>
              </div>
              <div class="col-md-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" id="exampleInputIconRight" value="{{request('search')}}" placeholder="Search" aria-label="Search">
        <button type="submit" class="input-group-text" id="basic-addon2">
					@if(request('search'))
							<a href="{{ request()->fullUrlWithQuery(['search'=> null]) }}" class="btn btn-outline-secondary ml-3" id="clear-search"> Clear</a>
					@endif
			</div>
</div>
        <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
</div>
          </div>
          
      </form>
      
    <!-- Tabel -->
    <div class="row">
        <div class="col-12 mb-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <h5 class="fw-bold text-danger mb-0">
                            <i class="fas fa-users me-2"></i>
                            Daftar Pelanggan
                        </h5>

                        <span class="badge bg-danger rounded-pill">
                            Customer List ♡
                        </span>

                    </div>

                    <div class="table-responsive">

                        <table id="table-pelanggan"
                               class="table table-hover align-middle mb-0">

                            <thead class="table-danger">
                                <tr>
                                    <th>No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Birthday</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($dataPelanggan as $item)

                                    <tr>

                                        <td>
                                            <span class="badge bg-danger rounded-pill">
                                                {{ $loop->iteration }}
                                            </span>
                                        </td>

                                        <td>{{ $item->first_name }}</td>

                                        <td>{{ $item->last_name }}</td>

                                        <td>{{ $item->birthday }}</td>

                                        <td>{{ $item->gender }}</td>

                                        <td>
                                            <i class="far fa-envelope text-danger me-1"></i>
                                            {{ $item->email }}
                                        </td>

                                        <td>
                                            <i class="fas fa-phone text-danger me-1"></i>
                                            {{ $item->phone }}
                                        </td>

                                        <td class="text-center">

                                            <!-- Edit -->
                                            <a href="{{ route('pelanggan.edit', $item->pelanggan_id) }}"
                                               class="btn btn-sm btn-outline-danger rounded-pill mb-1">

                                                <i class="fas fa-edit me-1"></i>
                                                Edit
                                            </a>

                                            <!-- Hapus -->
                                            <form action="{{ route('pelanggan.destroy', $item->pelanggan_id) }}"
                                                  method="POST"
                                                  class="d-inline">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-sm btn-danger rounded-pill mb-1"
                                                        onclick="return confirm('Yakin ingin menghapus pelanggan ini?')">

                                                    <i class="fas fa-trash-alt me-1"></i>
                                                    Hapus

                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="8" class="text-center py-5">

                                            <i class="fas fa-heart-broken fa-2x text-danger mb-3"></i>

                                            <p class="text-muted mb-0">
                                                Belum ada data pelanggan ♡
                                            </p>

                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $dataPelanggan->links('pagination::bootstrap-5') }}
                    </div>

                    <div class="text-center mt-3">
                        <small class="text-muted">
                            Made with love ♡
                        </small>
                    </div>

                </div>
            </div>

        </div>
    </div>

    

</div>


@endsection