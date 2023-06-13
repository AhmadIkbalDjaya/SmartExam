<div class="page-breadcrumb">
  <!-- Question -->
  <section id="header">
    <div class="container-fluid card">
      <div class="row">
        <div class="col-md-12">
          <div class="container-fluid">
            <div class="row p-5">
              <div class="col-md-12 text-center">
                <h3>{{ $quiz->quiz_name }}</h3>
                <p>Pilihan Ganda</p>
                <p></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- alerts -->
  @include('components.alerts')
  {{-- end alerts --}}
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
            @foreach ($questions as $question)
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
            @endforeach
            {{-- <div class="row card-body shadow-sm">
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
                    <button type="button" class="btn btn-primary my-1" data-bs-toggle="modal" data-bs-target="#edit"><i
                        class="bi bi-pen"></i></button>
                    <button type="button" class="btn btn-primary my-1" data-bs-toggle="modal"
                      data-bs-target="#hapus"><i class="bi bi-trash-fill"></i></button>
                  </div>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
      <!-- Create Question Modal-->
      <form wire:submit.prevent="store" method="POST">
        <div wire:ignore.self class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Buat Soal Ujian</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div wire:ignore>
                  <label for="question">Pertanyaan</label>
                  <textarea wire:model="question" name="question" id="question" rows="10" cols="80"></textarea>
                  <script>
                    const question = CKEDITOR.replace('question');
                    question.on('change', function (event) {
                      @this.set('question', event.editor.getData());
                    });
                  </script>
                </div>
              </div>
              <div class="modal-body">
                <div wire:ignore>
                  <label for="optionA">Jawaban A</label>
                  <textarea name="optionA" id="optionA" rows="10" cols="80"></textarea>
                  <script>
                    CKEDITOR.replace('optionA');
                  </script>
                </div>
              </div>
              <div class="modal-body">
                <div wire:ignore>
                  <label for="optionB">Jawaban B</label>
                  <textarea name="optionB" id="optionB" rows="10" cols="80"></textarea>
                  <script>
                    CKEDITOR.replace('optionB');
                  </script>
                </div>
              </div>
              <div class="modal-body">
                <div wire:ignore>
                  <label for="optionC">Jawaban C</label>
                  <textarea name="optionC" id="optionC" rows="10" cols="80"></textarea>
                  <script>
                    CKEDITOR.replace('optionC');
                  </script>
                </div>
              </div>
              <div class="modal-body">
                <div wire:ignore>
                  <label for="optionD">Jawaban D</label>
                  <textarea name="optionD" id="optionD" rows="10" cols="80"></textarea>
                  <script>
                    CKEDITOR.replace('optionD');
                  </script>
                </div>
              </div>
              <div class="modal-body">
                <div wire:ignore>
                  <label for="optionE">Jawaban E</label>
                  <textarea name="optionE" id="optionE" rows="10" cols="80"></textarea>
                  <script>
                    CKEDITOR.replace('optionE');
                  </script>
                </div>
              </div>
              <div class="modal-footer">
                <div class="container px-0">
                  <div class="row border-bottom py-3">
                    <p>Kunci Jawaban</p>
                    <div class="col-2">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
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
