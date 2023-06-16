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
      <section id="headerProduk">
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
                        height="190px">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-borderless">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Nama </td>
                          <td>:</td>
                          <td>Annisa</td>
                        </tr>
                        <tr>
                          <td>Username</td>
                          <td>:</td>
                          <td>annisaaa</td>
                        </tr>
                        <tr>
                          <td>NISN</td>
                          <td>:</td>
                          <td>673536353</td>
                        </tr>
                        <tr>
                          <td>Sekolah</td>
                          <td>:</td>
                          <td>SMAN 1 GOWA</td>
                        </tr>
                        <tr>
                          <td>Jenis Kelamin</td>
                          <td>:</td>
                          <td>Laki-Laki</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-12 text-center">
                    <button class="badge text-bg-info fs-6 rounded-4" data-bs-toggle="modal"
                      data-bs-target="#password">Ubah Password</button>
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

      {{-- recap hasil ujian --}}
      <section id="header">
        <div class="container-fluid card py-4 h-100">
          <div class="row">
            <div class="col-md-12">
              <div class="container-fluid">
                <div class="row p-3">
                  <div class="col-md-12">
                    <h3>Daftar Hasil Ujian CBT</h3>
                    <p>Melihat hasil ujian CBT yang sudah dikerjakan</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 p-4">
                    <table class="table">
                      <thead>
                        <tr class="text-center">
                          <th scope="col">No</th>
                          <th scope="col">Nama Quiz</th>
                          <th scope="col">Soal</th>
                          <th scope="col">Nilai</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody class="table-group-divider">
                        <tr class="text-center">
                          <th scope="row">1</th>
                          <td>Ujian CBT</td>
                          <td>Pilihan Ganda</td>
                          <td>90</td>
                          <td><button style=" border: none;background: none; padding: 0"><span
                                class="badge text-bg-info" data-bs-toggle="modal"
                                data-bs-target="#informasi">Informasi</span></button></td>
                        </tr>
                      </tbody>
                    </table>
                    {{-- Informasi Ujian --}}
                    <form action="">
                      <div class="modal fade" id="informasi" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="container">
                                <div class="row">
                                  <div class="col-md-12">
                                    <table class="table table-borderless">
                                      <thead>
                                        <tr>
                                          <th scope="col"></th>
                                          <th scope="col"></th>
                                          <th scope="col"></th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>Nama Quiz</td>
                                          <td>:</td>
                                          <td>Ujian CBT</td>
                                        </tr>
                                        <tr>
                                          <td>Pilih Quiz</td>
                                          <td>:</td>
                                          <td>Pilihan Ganda</td>
                                        </tr>
                                        <tr>
                                          <td>Tanggal Mulai</td>
                                          <td>:</td>
                                          <td>20 juni 2023</td>
                                        </tr>
                                        <tr>
                                          <td>Waktu Mulai</td>
                                          <td>:</td>
                                          <td>09.00</td>
                                        </tr>
                                        <tr>
                                          <td>Waktu Berakhir</td>
                                          <td>:</td>
                                          <td>10.00</td>
                                        </tr>
                                        <tr>
                                          <td>Waktu Pengerjaan</td>
                                          <td>:</td>
                                          <td>60 menit</td>
                                        </tr>
                                        <tr>
                                          <td>Nilai Ujian</td>
                                          <td>:</td>
                                          <td class="fw-bold fs-3">90</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
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
