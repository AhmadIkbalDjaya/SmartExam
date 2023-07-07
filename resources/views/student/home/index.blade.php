@extends('layouts.main')

@push('style')
  {{-- <link rel="stylesheet" href="{{ asset('/css/style.css') }}"> --}}
@endpush

@section('body')
  @include('components.navbarStudent')
  @include('components.spasi')
  <div class="page-wrapper">
    <div class="page-breadcrumb" style="min-height: 83vh">
      <div class="container h-100">
        <div class="row align-items-center h-100">
          <div class="col-md-12">
            <h1 class="text-center py-4">Data</h1>
            <div class="container">
              <div class="row">
                <div class="col-md-4">
                  <div class="card p-4 text-center rounded-4">
                    <h5>Total Soal Ujian</h5>
                    <div style="height: 100px; width: 100px; margin: auto" class="rounded-circle bg-info">
                      <h3 style="margin-top: 40px">
                        {{ $quiz_count }}
                      </h3>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card p-4 text-center rounded-4">
                    <h5>Total Ujian Yang Dikerjakan</h5>
                    <div style="height: 100px; width: 100px; margin: auto" class="rounded-circle bg-info">
                      <h3 style="margin-top: 40px">
                        {{ $done_quiz_count }}
                      </h3>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card p-4 text-center rounded-4" style="height:175px">
                    <h5>Soal Ujian CBT</h5>
                    <a href="{{ route('student.quiz.index') }}">
                      Soal Ujian
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer text-center">
      © 2023 CBT Online by <a
        href="https://l.instagram.com/?u=http%3A%2F%2Fbit.ly%2F3UaE7in&e=AT0IbESTXiAOKa7dxGjRS7TwV1mU3eagwftwzG-WUCjc6a8XKAWg_czE-a9qrlrI9tTvLMe5y4ckTmhdMcbKBXki7cKHOUaoYvnoa9s">Adrian.com</a>
    </footer>
  </div>
@endsection
