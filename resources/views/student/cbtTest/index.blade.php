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
      <!-- Ujian CBT -->
      <section id="header" style="min-height: 75vh;">
        <div class="container-fluid card py-4 h-100">
          <div class="row">
            <div class="col-md-12">
              <div class="container-fluid">
                <div class="row p-3">
                  <div class="col-md-12">
                    <h3>Daftar Ujian CBT</h3>
                    <p>Di sini anda bisa bergabung kedalam ujian dengan memasukkan kode ujian yang sudah diberikan oleh
                      guru.</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 p-4">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama Quiz</th>
                          <th scope="col">Soal</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody class="table-group-divider">
                        <tr>
                          <th scope="row">1</th>
                          <td>Ujian CBT</td>
                          <td>Pilihan Ganda</td>
                          <td><button style=" border: none;background: none; padding: 0"><span class="badge text-bg-info"
                                data-bs-toggle="modal" data-bs-target="#informasi">Mulai Ujian</span></button></td>
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
                                          <td>Maukkan Kode Quiz</td>
                                          <td>:</td>
                                          <td>
                                            <div class="mb-3">
                                              <input type="text" class="form-control" id="exampleFormControlInput1"
                                                style="height: 22px; width: 100px" required>
                                            </div>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary badge">Mulai</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                    <!-- Modal Hapus-->
                    <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">Apakah anda yakin ingin menghapusnya?</div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <button type="button" class="btn btn-primary">Ya</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
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
