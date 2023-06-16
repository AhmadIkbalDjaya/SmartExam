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
                        @foreach ($quizzes as $quiz)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $quiz->quiz_name }}</td>
                            <td>
                              @if ($quiz->quiz_type == 'MC')
                                Pilihan Ganda
                              @else
                                Essay
                              @endif
                            </td>
                            <td>
                              <button style=" border: none;background: none; padding: 0">
                                <span class="badge text-bg-info" data-bs-toggle="modal"
                                  data-bs-target="#startModal{{ $quiz->id }}">
                                  Mulai Ujian
                                </span>
                              </button>
                            </td>
                          </tr>
                          {{-- Start Modal --}}
                          <div class="modal fade" id="startModal{{ $quiz->id }}" tabindex="-1"
                            aria-labelledby="startModal{{ $quiz->id }}Label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="startModal{{ $quiz->id }}Label">Informasi</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </div>
                                <div class="container-fluid">
                                  <div class="row">
                                    <div class="col-12">
                                      <div class="modal-body">
                                        <div class="row">
                                          <div class="col-5">
                                            <div>Nama Quiz:</div>
                                          </div>
                                          <div class="col-1">:</div>
                                          <div class="col-6">{{ $quiz->quiz_name }}</div>
                                        </div>
                                        <div class="row">
                                          <div class="col-5">
                                            <div>Pilih Quiz:</div>
                                          </div>
                                          <div class="col-1">:</div>
                                          <div class="col-6">
                                            @if ($quiz->quiz_type == "MC")
                                              Pilihan Ganda
                                            @else
                                              Essay
                                            @endif
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-5">
                                            <div>Waktu Mulai:</div>
                                          </div>
                                          <div class="col-1">:</div>
                                          <div class="col-6">{{ date('j M Y H:i', strtotime($quiz->start_time)) }}</div>
                                        </div>
                                        <div class="row">
                                          <div class="col-5">
                                            <div>Waktu Berakhir:</div>
                                          </div>
                                          <div class="col-1">:</div>
                                          <div class="col-6">{{ date('j M Y H:i', strtotime($quiz->end_time)) }}</div>
                                        </div>
                                        <div class="row">
                                          <div class="col-5">
                                            <div>Waktu Pengerjaan:</div>
                                          </div>
                                          <div class="col-1">:</div>
                                          <div class="col-6">{{ $quiz->duration }} Menit</div>
                                        </div>
                                        <div class="row">
                                          <div class="col-5">
                                            <div>Masukkan Kode Quiz:</div>
                                          </div>
                                          <div class="col-1">:</div>
                                          <div class="col-6">
                                            <div class="mb-3">
                                              <input type="text" class="form-control" id="exampleFormControlInput1" style="height: 22px; width: 100px" required>
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
                              </div>
                            </div>
                          </div>

                        @endforeach
                      </tbody>
                    </table>
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
