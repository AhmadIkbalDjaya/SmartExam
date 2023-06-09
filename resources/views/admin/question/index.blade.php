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
                    <p>Pilihan Ganda</p>
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
                    <ul class="lowercase">
                      <li>Item 1</li>
                      <li>Item 2</li>
                      <li>Item 3</li>
                      <li>Item 4</li>
                      <li>Item 5</li>
                    </ul>
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
                <div class="row card-body shadow-sm">
                  <div class="col-10">
                    <p>1. Apa itu item?</p>
                    <ul class="lowercase">
                      <li>Item 1</li>
                      <li>Item 2</li>
                      <li>Item 3</li>
                      <li>Item 4</li>
                      <li>Item 5</li>
                    </ul>
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
                  <div class="modal-body">
                    <div>
                      <label for="editor2">Jawaban A</label>
                      <textarea name="editor2" id="editor2" rows="10" cols="80"></textarea>
                      <script>
                        CKEDITOR.replace('editor2');
                      </script>
                    </div>
                  </div>
                  <div class="modal-body">
                    <div>
                      <label for="editor3">Jawaban B</label>
                      <textarea name="editor3" id="editor3" rows="10" cols="80"></textarea>
                      <script>
                        CKEDITOR.replace('editor3');
                      </script>
                    </div>
                  </div>
                  <div class="modal-body">
                    <div>
                      <label for="editor4">Jawaban C</label>
                      <textarea name="editor4" id="editor4" rows="10" cols="80"></textarea>
                      <script>
                        CKEDITOR.replace('editor4');
                      </script>
                    </div>
                  </div>
                  <div class="modal-body">
                    <div>
                      <label for="editor5">Jawaban D</label>
                      <textarea name="editor5" id="editor5" rows="10" cols="80"></textarea>
                      <script>
                        CKEDITOR.replace('editor5');
                      </script>
                    </div>
                  </div>
                  <div class="modal-body">
                    <div>
                      <label for="editor6">Jawaban E</label>
                      <textarea name="editor6" id="editor6" rows="10" cols="80"></textarea>
                      <script>
                        CKEDITOR.replace('editor6');
                      </script>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <div class="container px-0">
                      <div class="row border-bottom py-3">
                        <p>Kunci Jawaban</p>
                        <div class="col-2">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                              id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                              A
                            </label>
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                              id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                              B
                            </label>
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                              id="flexRadioDefault3">
                            <label class="form-check-label" for="flexRadioDefault3">
                              C
                            </label>
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                              id="flexRadioDefault4">
                            <label class="form-check-label" for="flexRadioDefault4">
                              D
                            </label>
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                              id="flexRadioDefault5">
                            <label class="form-check-label" for="flexRadioDefault5">
                              E
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="row my-3">
                        <div class="col-md-12 text-end">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <!-- Modal Edit Soal-->
          <form action="">
            <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Soal Ujian</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div>
                      <label for="editor7">Pertanyaan</label>
                      <textarea name="editor7" id="editor7" rows="10" cols="80"></textarea>
                      <script>
                        CKEDITOR.replace('editor7');
                      </script>
                    </div>
                  </div>
                  <div class="modal-body">
                    <div>
                      <label for="editor8">Jawaban A</label>
                      <textarea name="editor8" id="editor8" rows="10" cols="80"></textarea>
                      <script>
                        CKEDITOR.replace('editor8');
                      </script>
                    </div>
                  </div>
                  <div class="modal-body">
                    <div>
                      <label for="editor9">Jawaban B</label>
                      <textarea name="editor9" id="editor9" rows="10" cols="80"></textarea>
                      <script>
                        CKEDITOR.replace('editor9');
                      </script>
                    </div>
                  </div>
                  <div class="modal-body">
                    <div>
                      <label for="editor10">Jawaban C</label>
                      <textarea name="editor10" id="editor10" rows="10" cols="80"></textarea>
                      <script>
                        CKEDITOR.replace('editor10');
                      </script>
                    </div>
                  </div>
                  <div class="modal-body">
                    <div>
                      <label for="editor11">Jawaban D</label>
                      <textarea name="editor11" id="editor11" rows="10" cols="80"></textarea>
                      <script>
                        CKEDITOR.replace('editor11');
                      </script>
                    </div>
                  </div>
                  <div class="modal-body">
                    <div>
                      <label for="editor12">Jawaban E</label>
                      <textarea name="editor12" id="editor12" rows="10" cols="80"></textarea>
                      <script>
                        CKEDITOR.replace('editor12');
                      </script>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <div class="container px-0">
                      <div class="row border-bottom py-3">
                        <p>Kunci Jawaban</p>
                        <div class="col-2">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                              id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                              A
                            </label>
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                              id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                              B
                            </label>
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                              id="flexRadioDefault3">
                            <label class="form-check-label" for="flexRadioDefault3">
                              C
                            </label>
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                              id="flexRadioDefault4">
                            <label class="form-check-label" for="flexRadioDefault4">
                              D
                            </label>
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                              id="flexRadioDefault5">
                            <label class="form-check-label" for="flexRadioDefault5">
                              E
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="row my-3">
                        <div class="col-md-12 text-end">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <!-- Modal Hapus-->
          <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
