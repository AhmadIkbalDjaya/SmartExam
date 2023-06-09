@extends('layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ asset('/css/table.css') }}">
  @livewireStyles
@endpush

@section('body')
  @include('components.navbarAdmin')
  @include('components.spasi')
  <div class="page-wrapper">
    @livewire('school.index')
    {{-- <div class="page-breadcrumb">
      <!-- alerts -->
      @include('components.alerts')
      <!-- sekolah -->
      <section id="headerProduk" style="min-height: 75vh;">
        <div class="container-fluid card py-4 h-100">
          <div class="row">
            <div class="col-md-8">
              <div class="container-fluid">
                <div class="row p-3">
                  <div class="col-md-12">
                    <h3>Sekolah</h3>
                    <p>Menambah, Mengedit, atau Menghapus Sekolah</p>
                  </div>
                  <div class="col-md-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                      Tambah Sekolah
                    </button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 p-4">
                    @livewire('school.index')
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 gambar1">
              <div class="container h-100">
                <div class="row align-items-center h-100">
                  <div class="col-md-12">
                    <img src="{{ asset('/images/class.svg') }}" alt="img" class="img-fluid" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div> --}}
    <footer class="footer text-center">
      © 2023 CBT Online by <a
        href="https://l.instagram.com/?u=http%3A%2F%2Fbit.ly%2F3UaE7in&e=AT0IbESTXiAOKa7dxGjRS7TwV1mU3eagwftwzG-WUCjc6a8XKAWg_czE-a9qrlrI9tTvLMe5y4ckTmhdMcbKBXki7cKHOUaoYvnoa9s">Adrian.com</a>
    </footer>
  </div>
  @push('script')
    <script src="{{ asset('/js/password.js') }}"></script>
    <script src="{{ asset('/js/alerts.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
    @livewireScripts
  @endpush
@endsection
