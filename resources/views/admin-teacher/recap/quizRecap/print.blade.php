@extends('layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ asset('/css/table.css') }}">
@endpush

@section('body')
  @include('components.spasi')
  <div class="page-wrapper">
    <div class="page-breadcrumb">
      <!-- Print Quizz Recap -->
      <section id="header">
        <div class="container-fluid py-4">
          <div class="row">
            <div class="col-md-12">
              <form action="">
                <div class="row">
                  <div class="col-md-12">
                    <div class="container-fluid">
                      <div class="row p-3 border-bottom border-dark border-2">
                        <div class="col-2 text-end">
                          <img src="{{ asset('/images/logo.png') }}" alt="logo" height="70px">
                        </div>
                        <div class="col-8 text-center ">
                          <h3>Hasil Rekapan Quiz</h3>
                          <p>Hasil Rekapan Nilai Yang Mengikuti Ujian CBT</p>
                        </div>
                        <div class="col-2">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-8 col-md-3">
                          <table class="table table-borderless">
                            <tbody>
                              <tr>
                                <td>Nama Quiz</td>
                                <td>:</td>
                                <td>{{ $quiz->quiz_name }}</td>
                              </tr>
                              <tr>
                                <td>Sekolah</td>
                                <td>:</td>
                                <td>{{ $school_name }}</td>
                              </tr>
                              <br />
                              <tr>
                                <td>Quiz</td>
                                <td>:</td>
                                <td>
                                  @if ($quiz->quiz_type == 'MC')
                                    Pilihan Ganda
                                  @else
                                    Essay
                                  @endif
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 p-4">
                          <div class="table-responsive">
                            <table class="table table-bordered text-center">
                              <thead>
                                <tr>
                                  <th class="">Rank</th>
                                  <th class="col-md-4">Nama Siswa</th>
                                  <th class="col-md-4">NISN</th>
                                  <th class="col-md-4">Sekolah</th>
                                  <th class="col-md-4">Nilai</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($quizStudents as $quizStudent)
                                  <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $quizStudent->student->name }}</td>
                                    <td>{{ $quizStudent->student->username }}</td>
                                    <td>{{ $quizStudent->student->school->school_name }}</td>
                                    <td>{{ $quizStudent->score }}</td>
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
                <div class="row">
                  <div class="col-md-12">
                    <a href="{{ route('admin.recap.quiz.index', ["quiz" => $quiz->id]) }}">
                      <button type="button" class="btn btn-primary fs-6 print-button"><i
                          class="bi bi-arrow-left"></i></button>
                    </a>
                    <button type="button" class="btn btn-primary fs-6 print-button" onclick="window.print()"><i
                        class="bi bi-printer"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  @push('script')
    <script src="{{ asset('/js/alerts.js') }}"></script>
    <script src="{{ asset('/js/password.js') }}"></script>
  @endpush
@endsection
