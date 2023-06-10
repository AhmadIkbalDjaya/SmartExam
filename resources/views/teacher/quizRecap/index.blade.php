@extends('layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ asset('/css/table.css') }}">
@endpush

@section('body')
  @include('components.navbarTeacher')
  @include('components.spasi')
  <div class="page-wrapper">
    <div class="page-breadcrumb">
      <!-- alerts -->
      <div id="alerts"></div>
      <!-- Quizz Recap -->
      <section id="header">
        <div class="container-fluid card py-4">
          <div class="row">
            <div class="col-md-12">
              <div class="container-fluid">
                <div class="row p-3">
                  <div class="col-md-12 text-center">
                    <h3>Rekapan Quiz</h3>
                    <p>Informasi rekapan nilai quiz</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="header">
        <div class="container-fluid card py-4">
          <form action="">
            <div class="row">
              <div class="col-md-12">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-3">
                      <select class="form-select" aria-label="Default select example">
                        <option selected>Semua Sekolah</option>
                        <option value="1">SMA 1 Gowa</option>
                        <option value="2">SMA 2 Gowa</option>
                        <option value="3">SMA 3 Gowa</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 p-4">
                      <div class="table-responsive">
                        <table class="table table-bordered text-center">
                          <thead>
                            <tr>
                              <th class="col-md-4">Nama Siswa</th>
                              <th class="col-md-4">NISN</th>
                              <th class="col-md-4">Nilai</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Alda</td>
                              <td>67543</td>
                              <td>90</td>
                            </tr>
                            <tr>
                              <td>Sukina</td>
                              <td>67573</td>
                              <td>85</td>
                            </tr>
                          </tbody>
                        </table>
                        {{-- Informasi --}}
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
                                      <div>
                                        <span> Nama : </span>
                                        <span> Ujian CBT </span>
                                      </div>
                                      <br>
                                      <div>
                                        <span> Tanggal Mulai : </span>
                                        <span> 20-06-2023 </span>
                                      </div>
                                      <br>
                                      <div>
                                        <span> Waktu Mulai : </span>
                                        <span> 08.00 </span>
                                      </div>
                                      <br>
                                      <div>
                                        <span> Waktu Berakhir : </span>
                                        <span> 10.00 </span>
                                      </div>
                                      <br>
                                      <div>
                                        <span> Waktu Pengerjaan : </span>
                                        <span> 3 jam </span>
                                      </div>
                                      <br>
                                      <div>
                                        <span> Kode Quizz : </span>
                                        <span> 6487 </span>
                                      </div>
                                      <br>
                                      <div>
                                        <span> Sekolah : </span>
                                        <span> SMA </span>
                                      </div>
                                      <br>
                                      <div>
                                        <span> Quiz : </span>
                                        <span> Pilihan Ganda </span>
                                      </div>
                                      <br>
                                      <div>
                                        <span> Status : </span>
                                        <span class="badge text-bg-info"> Aktif </span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal Hapus-->
                        <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel"
                          aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
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
            <div class="row">
              <div class="col-md-12">
                <a href="{{ route('teacher.print.index') }}" type="submit" class="btn btn-primary fs-6"><i
                    class="bi bi-printer"></i></a>
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
