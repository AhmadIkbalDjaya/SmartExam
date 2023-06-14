@extends('layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ asset('/css/table.css') }}">
@endpush

@section('body')
  @include('components.navbarAdmin')
  @include('components.spasi')
  <div class="page-wrapper">
    <div class="page-breadcrumb">
      <!-- Quizz Recap -->
      <section id="header">
        <div class="container-fluid card py-4">
          <div class="row">
            <div class="col-md-12">
              <div class="container-fluid">
                <div class="row p-3">
                  <div class="col-md-12 text-center">
                    <h3>Rekapan Quiz</h3>
                    <p>{{ $quiz->quiz_name }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="header">
        <livewire:admin-teacher.recap.show :quiz="$quiz"/>
        {{-- <div class="container-fluid card py-4">
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
                            @foreach ($quizStudents as $quizStudent)
                              <tr>
                                <td>{{ $quizStudent->student->name }}</td>
                                <td>{{ $quizStudent->student->username }}</td>
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
              <div class="col-md-12 d-flex justify-content-between">
                <a href="{{ route('admin.recap.index') }}">
                  <i class="bi bi-arrow-left"></i>
                </a>
                <a href="{{ route('admin.print.index') }}" type="submit" class="btn btn-primary fs-6"><i
                    class="bi bi-printer"></i></a>
              </div>
            </div>
          </form>
        </div> --}}
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
