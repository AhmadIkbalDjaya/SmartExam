@extends('layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ asset('/css/table.css') }}">
@endpush

@section('body')
  @include('components.navbarStudent')
  @include('components.spasi')

  <div class="page-wrapper pt-5">
    <div class="page-breadcrumb">
      <section id="quiz">
        <div class="container-fluid px-3">
          <div class="row">
            <div class="col-md-2">
              <div class="container card rounded-3 shadow-sm px-0">
                <div class="row">
                  <div class="col-md-12 p-4">
                    <div class="d-flex">
                      <p>Soal</p>
                      <h3 class="text-dark ps-2">1</h3>
                    </div>
                    <p>Selesaikan ujian tepat waktu !</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card shadow-sm rounded-3">
                <div class="container px-1">
                  <div class="row">
                    <div class="col-md-12 p-4">
                      <div>
                        <p>apa yang dimaksud dengannnnnnnnnnnnnnnn serta sebutakn pejsjh hsgsh uagusag jhsjghsjjgds usghsg
                          hh nnnnnnn?</p>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
                        <label class="form-check-label" for="flexRadioDefault1"> a. Benar </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" />
                        <label class="form-check-label" for="flexRadioDefault2"> b. salah </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" />
                        <label class="form-check-label" for="flexRadioDefault3"> c. salah & benar </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4" />
                        <label class="form-check-label" for="flexRadioDefault4"> d. salah semua </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5" />
                        <label class="form-check-label" for="flexRadioDefault5"> e. benar semua </label>
                      </div>
                    </div>
                  </div>
                  <div class="row p-2">
                    <div class="col-6">
                      <button type="button" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Halaman Sebelumnya</button>
                    </div>
                    <div class="col-6 text-end">
                      <button type="button" class="btn btn-primary">Halaman Selanjutnya <i class="bi bi-arrow-right"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card shadow-sm rounded-3">
                <div class="card-header">Semua Nomor</div>
                <div class="card-body p-0">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12 py-4">
                        <button type="button" class="btn btn-info p-0 mt-1" style="height: 40px; width: 30px">1</button>
                        <button type="button" class="btn btn-info p-0 mt-1" style="height: 40px; width: 30px">2</button>
                      </div>
                    </div>
                    <div class="row py-4 pt-0 pb-2">
                      <div class="col-md-12 d-flex">
                        <p>Waktu Tersisa</p>
                        <strong id="countdown" class="ps-3"></strong>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      @push('script')
        <script src="{{ asset('/js/time.js') }}"></script>
      @endpush
    </div>
  </div>
@endsection
