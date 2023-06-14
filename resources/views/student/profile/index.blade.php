@extends('layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ asset('/css/table.css') }}">
@endpush

@section('body')
  @include('components.navbarStudent')
  @include('components.spasi')
  <div class="page-wrapper">
    <div class="page-breadcrumb">
      <!-- alerts -->
      <div id="alerts"></div>
      <!-- Profile -->
      <section id="headerProduk" style="height: 75vh;">
        <div class="container-fluid card py-4 h-100">
          <div class="row">
            <div class="col-md-6">
              <div class="container-fluid">
                <div class="row p-3">
                  <div class="col-md-12 text-center">
                    <h3 class="fs-2">Profile Siswa</h3>
                  </div>
                </div>
                <div class="row text-center">
                  <div class="col-md-12 p-4">
                    <div class="">
                      <img src="{{ asset('/images/logo.png') }}" alt="img" class="rounded-circle border border-2"
                        height="200px">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 text-center">
                    <button class="badge text-bg-info fs-6 rounded-4" data-bs-toggle="modal"
                      data-bs-target="#password">Ubah Password</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 gambar1">
              <div class="container h-100">
                <div class="row align-items-center h-100">
                  <div class="col-md-12">
                    <img src="{{ asset('/images/profile.svg') }}" alt="img" class="img-fluid" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Password-->
          <form action="">
            <div class="modal fade" id="password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Password Baru</label>
                      <div class="input-group">
                        <input type="password" name="password" value="{{ old('password') }}"
                          class="form-control
                          @error('password') is-invalid @enderror"
                          id="passwordInput" required>
                        <span class="input-group-append">
                          <span class="input-group-text toggle-password" id="togglePassword" style="cursor: pointer">
                            <i class="bi bi-eye-fill" alt="Show Password" id="eyeClosedIcon"></i>
                            <i class="bi bi-eye-slash" alt="Hide Password" id="eyeOpenIcon" style="display: none;"></i>
                          </span>
                        </span>
                        @error('password')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Komfirmasi Password Baru</label>
                      <div class="input-group">
                        <input type="password" name="password" value="{{ old('password') }}"
                          class="form-control
                          @error('password') is-invalid @enderror"
                          id="passwordInput" required>
                        <span class="input-group-append">
                          <span class="input-group-text toggle-password" id="togglePassword" style="cursor: pointer">
                            <i class="bi bi-eye-fill" alt="Show Password" id="eyeClosedIcon"></i>
                            <i class="bi bi-eye-slash" alt="Hide Password" id="eyeOpenIcon" style="display: none;"></i>
                          </span>
                        </span>
                        @error('password')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
    <footer class="footer text-center">
      © 2023 CBT Online by <a
        href="https://l.instagram.com/?u=http%3A%2F%2Fbit.ly%2F3UaE7in&e=AT0IbESTXiAOKa7dxGjRS7TwV1mU3eagwftwzG-WUCjc6a8XKAWg_czE-a9qrlrI9tTvLMe5y4ckTmhdMcbKBXki7cKHOUaoYvnoa9s">Adrian.com</a>
    </footer>
  </div>

  @push('script')
    <script src="{{ asset('/js/alerts.js') }}"></script>
    <script src="{{ asset('/js/password.js') }}"></script>
  @endpush
@endsection
