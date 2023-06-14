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
      @include('components.alerts')
      <!-- Recap -->
      <section id="header" style="min-height: 75vh;">
        <div class="container-fluid card py-4 h-100">
          <div class="row">
            <div class="col-md-12">
              <div class="container-fluid">
                <div class="row p-3">
                  <div class="col-md-12">
                    <h3>Rekapan</h3>
                    <p>Informasi rekapan siswa</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 p-4">
                    <div class="table-responsive">
                      <table class="table text-center">
                        <thead>
                          <tr>
                            <th class="col-md-4 border-1">Nama Quiz</th>
                            <th class="col-md-4 border-1">Sekolah</th>
                            <th class="col-md-4 border-1">Quizz</th>
                            <th class="col-md-4 border-1">Rekapan</th>
                            <th class="col-md-4 border-1">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($quizzes as $quiz)
                            <tr>
                              <td class="border-1">{{ $quiz->quiz_name }}</td>
                              <td class="border-1">{{ $quiz->quiz_category }}</td>
                              <td class="border-1">
                                @if ($quiz->quiz_type == 'MC')
                                  Pilihan Ganda
                                @else
                                  Essay
                                @endif
                              </td>
                              <td class="border-1">
                                <a href="{{ route('admin.recap.quiz.index', ["quiz" => $quiz->id]) }}"
                                  style=" border: none;background: none; padding: 0">
                                  <span class="badge text-bg-primary">
                                    Lihat Rekap
                                  </span>
                                </a>
                              </td>
                              <td class="border-1">
                                <button style=" border: none;background: none; padding: 0"><span
                                    class="badge text-bg-info" data-bs-toggle="modal"
                                    data-bs-target="#showModal{{ $quiz->id }}">Informasi</span></button>
                              </td>
                              <td style="border: none">
                                {{-- show modal --}}
                                <div class="modal fade text-start" id="showModal{{ $quiz->id }}" tabindex="-1"
                                  aria-labelledby="showModal{{ $quiz->id }}Label" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="showModal{{ $quiz->id }}Label">Informasi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                          aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <h4 class="text-center">{{ $quiz->quiz_name }}</h4>
                                        <div class="row">
                                          <div class="col-6">
                                            <table class="table table-borderless table-sm">
                                              <tbody>
                                                <tr>
                                                  <td><span> Kode Quiz</span></td>
                                                  <td><span>: {{ $quiz->quiz_code }} </span></td>
                                                </tr>
                                                <tr>
                                                  <td><span> Sekolah</span></td>
                                                  <td><span>: {{ $quiz->quiz_category }} </span></td>
                                                </tr>
                                                <tr>
                                                  <td><span> Jenis Quiz</span></td>
                                                  <td>
                                                    <span>:
                                                      @if ($quiz->quiz_type == 'MC')
                                                        Pilihan Ganda
                                                      @else
                                                        Essay
                                                      @endif
                                                    </span>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td><span> Jumlah Soal</span></td>
                                                  <td><span>: {{ $quiz->question_count ? $quiz->question_count : 0 }}
                                                    </span></td>
                                                </tr>
                                                <tr>
                                                  <td><span> Waktu Mulai</span></td>
                                                  <td>
                                                    <span>
                                                      : {{ date('j M Y H:i', strtotime($quiz->start_time)) }}
                                                    </span>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td><span> Waktu Berakhir</span></td>
                                                  <td>
                                                    <span>
                                                      : {{ date('j M Y H:i', strtotime($quiz->end_time)) }}
                                                    </span>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td><span> Waktu Pengerjaan</span></td>
                                                  <td><span>: {{ $quiz->duration }} menit</span></td>
                                                </tr>
                                                <tr>
                                                  <td><span> Status</span></td>
                                                  <td>: <span class="badge text-bg-info">Aktif</span></td>
                                                </tr>
                                              </tbody>
                                            </table>
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
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
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
