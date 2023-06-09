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
      <!-- Guru -->
      <section id="headerProduk" style="min-height: 75vh;">
        <div class="container-fluid card py-4 h-100">
          <div class="row">
            <div class="col-md-8">
              <div class="container-fluid">
                <div class="row p-3">
                  <div class="col-md-12">
                    <h3>Guru</h3>
                    <p>Menambah, Mengedit, atau Menghapus Guru</p>
                  </div>
                  <div class="col-md-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                      Tambah Guru
                    </button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 p-4">
                    <div class="table-responsive">
                      <table class="table table-bordered text-center">
                        <thead>
                          <tr>
                            <th class="col-md-4">Username</th>
                            <th class="col-md-4">Sekolah</th>
                            <th class="col-md-4">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($teachers as $teacher)
                            <tr>
                              <td>{{ $teacher->username }}</td>
                              <td>{{ $teacher->school->school_name }}</td>
                              <td>
                                <button style=" border: none;background: none; padding: 0">
                                  <span class="badge text-bg-info" data-bs-toggle="modal"
                                    data-bs-target="#showModal{{ $teacher->id }}">
                                    Informasi
                                  </span>
                                </button>
                                <button style=" border: none;background: none; padding: 0">
                                  <span class="badge text-bg-warning px-4" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $teacher->id }}">
                                    Edit
                                  </span>
                                </button>
                                <a href="#">
                                  <span class="badge text-bg-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $teacher->id }}">
                                    Delete
                                  </span>
                                </a>
                              </td>
                            </tr>

                            {{-- Show Modal --}}
                            <div class="modal fade" id="showModal{{ $teacher->id }}" tabindex="-1"
                              aria-labelledby="showModal{{ $teacher->id }}Label" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="showModal{{ $teacher->id }}Label">Informasi</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="container">
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div>
                                            <span> Username : </span>
                                            <span> {{ $teacher->username }} </span>
                                          </div>
                                          <br>
                                          <div>
                                            <span> Password : </span>
                                            <span> {{ $teacher->password }} </span>
                                          </div>
                                          <br>
                                          <div>
                                            <span> Sekolah : </span>
                                            <span> {{ $teacher->school->school_name }} </span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                      data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            {{-- End Show Modal --}}
                            <!-- Modal Edit Guru-->
                            <form action="{{ route('admin.teacher.update', ['teacher' => $teacher->id]) }}"
                              method="POST">
                              @method('patch')
                              @csrf
                              <div class="modal fade" id="editModal{{ $teacher->id }}" tabindex="-1"
                                aria-labelledby="editModal{{ $teacher->id }}Label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="editModal{{ $teacher->id }}Label">Edit Guru</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Username</label>
                                        <input type="text" name="username" id="exampleFormControlInput1"
                                          value="{{ old('username', $teacher->username) }}"
                                          class="form-control @error('username') is-invalid @enderror" required />
                                        @error('username')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                        @enderror
                                      </div>
                                      <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                                        <sub class="d-block mb-2">Kosongkan jika tidak ingin mengganti password</sub>
                                        <div class="input-group">
                                          <input type="password" name="password"
                                            class="form-control
                                          @error('password') is-invalid @enderror"
                                            id="passwordInput">
                                          <span class="input-group-append">
                                            <span class="input-group-text toggle-password" id="togglePassword"
                                              style="cursor: pointer">
                                              <i class="bi bi-eye-fill" alt="Show Password" id="eyeClosedIcon"></i>
                                              <i class="bi bi-eye-slash" alt="Hide Password" id="eyeOpenIcon"
                                                style="display: none;"></i>
                                            </span>
                                          </span>
                                          @error('password')
                                            <div class="invalid-feedback">
                                              {{ $message }}
                                            </div>
                                          @enderror
                                        </div>
                                      </div>
                                      <select class="form-select @error('school_id') is-invalid @enderror"
                                        name="school_id" aria-label="Default select example">
                                        <option hidden>Pilih Sekolah</option>
                                        @foreach ($schools as $school)
                                          <option value="{{ $school->id }}"
                                            {{ old('school_id', $teacher->school->id) == $school->id ? 'selected' : '' }}>
                                            {{ $school->school_name }}</option>
                                        @endforeach
                                      </select>
                                      @error('school_id')
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
                            {{-- End Edit Modal --}}
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $teacher->id }}" tabindex="-1"
                              aria-labelledby="deleteModal{{ $teacher->id }}Label" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteModal{{ $teacher->id }}Label">Hapus?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">Apakah anda yakin ingin menghapus {{ $teacher->username }}?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                      Tidak
                                    </button>
                                    <form action="{{ route('admin.teacher.destroy', ['teacher' => $teacher->id]) }}"
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
                      <!-- Teacher Create Modal -->
                      <form action="{{ route('admin.teacher.store') }}" method="POST">
                        @csrf
                        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel"
                          aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Guru</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="mb-3">
                                  <label for="exampleFormControlInput1" class="form-label">Username</label>
                                  <input type="text" name="username" id="exampleFormControlInput1"
                                    value="{{ old('username') }}"
                                    class="form-control @error('username') is-invalid @enderror" required />
                                  @error('username')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="exampleFormControlInput1" class="form-label">Password</label>
                                  <div class="input-group">
                                    <input type="password" name="password" value="{{ old('password') }}"
                                      class="form-control
                                      @error('password') is-invalid @enderror"
                                      id="passwordInput" required>
                                    <span class="input-group-append">
                                      <span class="input-group-text toggle-password" id="togglePassword"
                                        style="cursor: pointer">
                                        <i class="bi bi-eye-fill" alt="Show Password" id="eyeClosedIcon"></i>
                                        <i class="bi bi-eye-slash" alt="Hide Password" id="eyeOpenIcon"
                                          style="display: none;"></i>
                                      </span>
                                    </span>
                                    @error('password')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                  </div>
                                </div>
                                <select class="form-select @error('school_id') is-invalid @enderror" name="school_id"
                                  aria-label="Default select example">
                                  <option hidden>Pilih Sekolah</option>
                                  @foreach ($schools as $school)
                                    <option value="{{ $school->id }}"
                                      {{ old('school_id') == $school->id ? 'selected' : '' }}>
                                      {{ $school->school_name }}</option>
                                  @endforeach
                                </select>
                                @error('school_id')
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
                    <img src="{{ asset('/images/teacher.svg') }}" alt="img" class="img-fluid" />
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
