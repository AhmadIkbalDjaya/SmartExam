@extends('layouts.main')

@push('style')
  {{-- <link rel="stylesheet" href="{{ asset('/css/style.css') }}"> --}}
@endpush

@section('body')
  {{-- @include('components.navbarAdmin') --}}
  @include('components.navbarTeacher')
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
                  <div class="card p-3 text-center rounded-4">
                    <h5>Jumlah Data Sekolah</h5>
                    <div style="height: 80px; width: 80px; margin: auto" class="rounded-circle bg-info">
                      <h3 style="margin-top: 28px">
                        {{ $school_count }}
                      </h3>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card p-3 text-center rounded-4">
                    <h5>Jumlah Data Guru</h5>
                    <div style="height: 80px; width: 80px; margin: auto" class="rounded-circle bg-info">
                      <h3 style="margin-top: 28px">
                        {{ $teacher_count }}
                      </h3>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card p-3 text-center rounded-4">
                    <h5>Jumlah Data Siswa</h5>
                    <div style="height: 80px; width: 80px; margin: auto" class="rounded-circle bg-info">
                      <h3 style="margin-top: 28px">
                        {{ $student_count }}
                      </h3>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card p-3 text-center rounded-4">
                    <h5>Jumlah Data Ruangan</h5>
                    <div style="height: 80px; width: 80px; margin: auto" class="rounded-circle bg-info">
                      <h3 style="margin-top: 28px">32</h3>
                    </div>
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
