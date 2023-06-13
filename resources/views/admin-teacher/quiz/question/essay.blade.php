@extends('layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ asset('/css/table.css') }}">
@endpush
@push('style')
  <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
@endpush

@section('body')
  @include('components.navbarAdmin')
  @include('components.spasi')
  <div class="page-wrapper">
    <div class="page-breadcrumb">
      <!-- alerts -->
      <div id="alerts"></div>
      <!-- Question -->
      <section id="header">
        <div class="container-fluid card">
          <div class="row">
            <div class="col-md-12">
              <div class="container-fluid">
                <div class="row p-5">
                  <div class="col-md-12 text-center">
                    <h3>Ujian CBT</h3>
                    <p>Essay</p>
                    <p></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="Soal">
        <div class="container-fluid card py-4 px-0">
          <div class="row">
            <div class="col-md-12">
              <div class="container-fluid ">
                <div class="row p-3 card-header shadow-sm">
                  <div class="col-md-12">
                    <h4 class="py-3">Daftar Soal Ujian</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah
                      Soal</button>
                  </div>
                </div>
                <div class="row card-body shadow-sm">
                  <div class="col-10">
                    <p>1. Apa itu item?</p>
                    <p>2. Apa itu item?</p>
                    <p>3. Apa itu item?</p>
                    <p>4. Apa itu item?</p>
                    <p>5. Apa itu item?</p>
                    <p>6. Apa itu item?</p>
                  </div>
                  <div class="col-2">
                    <div class="row h-100 align-items-center">
                      <div class="col-md-12">
                        <button type="button" class="btn btn-primary my-1" data-bs-toggle="modal"
                          data-bs-target="#edit"><i class="bi bi-pen"></i></button>
                        <button type="button" class="btn btn-primary my-1" data-bs-toggle="modal"
                          data-bs-target="#hapus"><i class="bi bi-trash-fill"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Buat Soal-->
          <form action="">
            <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Buat Soal Ujian</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div>
                      <label for="editor1">Pertanyaan</label>
                      <textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>
                      <script>
                        CKEDITOR.replace('editor1');
                      </script>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <!-- Modal Edit Soal-->
          <form action="">
            <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Soal Ujian</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div>
                      <label for="editor2">Pertanyaan</label>
                      <textarea name="editor2" id="editor2" rows="10" cols="80"></textarea>
                      <script>
                        CKEDITOR.replace('editor2');
                      </script>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
          </form>

          <!-- Modal Hapus-->
          <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
