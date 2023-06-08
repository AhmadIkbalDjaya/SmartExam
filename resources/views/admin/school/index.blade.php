@extends('layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ asset('/css/table.css') }}">
@endpush

@section('body')
  @include('components.navbarAdmin')
  @include('components.spasi')
  <div class="page-wrapper">
    <div class="page-breadcrumb">
      <!-- alerts -->
      {{-- <div id="alerts"></div> --}}
      @include('components.alerts')
      <!-- sekolah -->
      <section id="headerProduk" style="min-height: 75vh;">
        <div class="container-fluid card py-4 h-100">
          <div class="row">
            <div class="col-md-8">
              <div class="container-fluid">
                <div class="row p-3">
                  <div class="col-md-12">
                    <h3>Sekolah</h3>
                    <p>Menambah, Mengedit, atau Menghapus Sekolah</p>
                  </div>
                  <div class="col-md-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                      Tambah Sekolah
                    </button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 p-4">
                    <div class="table-responsive">
                      <table class="table table-bordered text-center">
                        <thead>
                          <tr>
                            <th class="col-md-4">Kategori</th>
                            <th class="col-md-4">Nama Sekolah</th>
                            <th class="col-md-4">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($schools as $school)
                            <tr>
                              <td>{{ $school->school_category }}</td>
                              <td>{{ $school->school_name }}</td>
                              <td>
                                <button style=" border: none;background: none; padding: 0">
                                  <span class="badge text-bg-warning px-4" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $school->id }}">
                                    Edit
                                  </span>
                                </button>
                                <a href="#">
                                  <span class="badge text-bg-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $school->id }}">
                                    Delete
                                  </span>
                                </a>
                              </td>
                            </tr>
                            <!-- Modal Edit Sekolah-->
                            <form action="{{ route('admin.school.update', ['school' => $school->id]) }}" method="POST">
                              @method('patch')
                              @csrf
                              <div class="modal fade" id="editModal{{ $school->id }}" tabindex="-1"
                                aria-labelledby="editModal{{ $school->id }}Label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="editModal{{ $school->id }}Label">Edit Sekolah
                                      </h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Sekolah</label>
                                        {{-- <input type="text" name="school_name" value="{{ $school->school_name }}"
                                          class="form-control" id="exampleFormControlInput1" required /> --}}
                                        <input type="text" name="school_name" id="exampleFormControlInput1"
                                          value="{{ old('school_name', $school->school_name) }}"
                                          class="form-control @error('school_name') is-invalid @enderror" />
                                        @error('school_name')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                        @enderror
                                      </div>
                                      <select name="school_category"
                                        class="form-select @error('school_category') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option hidden>Kategori</option>
                                        <option value="SMP" {{ old('school_category', $school->school_category) == 'SMP' ? 'selected' : '' }}>
                                          SMP
                                        </option>
                                        <option value="SMA" {{ old('school_category', $school->school_category) == 'SMA' ? 'selected' : '' }}>
                                          SMA
                                        </option>
                                      </select>
                                      @error('school_category')
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                      @enderror
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </form>

                            <!-- Delete Modal-->
                            <div class="modal fade" id="deleteModal{{ $school->id }}" tabindex="-1"
                              aria-labelledby="deleteModal{{ $school->id }}Label" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteModal{{ $school->id }}Label">Hapus?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">Apakah anda yakin ingin menghapus {{ $school->school_name }}?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                      data-bs-dismiss="modal">Tidak</button>
                                    <form action="{{ route('admin.school.destroy', ['school' => $school->id]) }}"
                                      method="post">
                                      @method('delete')
                                      @csrf
                                      <button type="submit" class="btn btn-primary">Ya</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          @endforeach
                        </tbody>
                      </table>
                      <!-- Modal Tambah Sekolah-->
                      <form action="{{ route('admin.school.store') }}" method="POST">
                        @csrf
                        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel"
                          aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="createModalLabel">Tambah Sekolah</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="mb-3">
                                  <label for="exampleFormControlInput1" class="form-label">Nama Sekolah</label>
                                  <input type="text" name="school_name" id="exampleFormControlInput1"
                                    value="{{ old('school_name') }}"
                                    class="form-control @error('school_name') is-invalid @enderror" required/>
                                  @error('school_name')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                                <select name="school_category"
                                  class="form-select @error('school_category') is-invalid @enderror"
                                  aria-label="Default select example">
                                  <option hidden>Kategori</option>
                                  <option value="SMP" {{ old('school_category') == 'SMP' ? 'selected' : '' }}>SMP
                                  </option>
                                  <option value="SMA" {{ old('school_category') == 'SMA' ? 'selected' : '' }}>SMA
                                  </option>
                                </select>
                                @error('school_category')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                  data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 gambar1">
              <div class="container h-100">
                <div class="row align-items-center h-100">
                  <div class="col-md-12">
                    <img src="{{ asset('/images/class.svg') }}" alt="img" class="img-fluid" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <footer class="footer text-center">
      © 2023 CBT Online by <a
        href="https://l.instagram.com/?u=http%3A%2F%2Fbit.ly%2F3UaE7in&e=AT0IbESTXiAOKa7dxGjRS7TwV1mU3eagwftwzG-WUCjc6a8XKAWg_czE-a9qrlrI9tTvLMe5y4ckTmhdMcbKBXki7cKHOUaoYvnoa9s">Adrian.com</a>
    </footer>
  </div>
  @push('script')
    <script src="{{ asset('/js/password.js') }}"></script>
    <script src="{{ asset('/js/alerts.js') }}"></script>
  @endpush
@endsection
