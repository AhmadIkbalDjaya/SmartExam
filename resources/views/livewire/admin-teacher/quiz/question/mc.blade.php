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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                  Tambah Soal
                </button>
              </div>
            </div>
            @foreach ($questions as $question)
              <div class="row card-body shadow-sm">
                <div class="col-10 row">
                  <div class="col-1 text-center">
                    {{ $loop->iteration }}.
                  </div>
                  <div class="col-11 px-0">
                    {!! $question->question !!}
                  </div>
                  <ol type="A">
                    @foreach ($question->option as $option)
                      <li>{!! $option->option_body !!}</li>
                    @endforeach
                  </ol>
                  <div>
                    Jawaban Benar: 
                    @foreach ($question->option as $option)
                      {{ $option->is_correct ?  "$option->option" : ""}}
                    @endforeach
                  </div>
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
          </div>
        </div>
      </div>
      <!-- Create Question Modal-->
      <form wire:submit.prevent="store" method="POST">
        <div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="createModalLabel">Buat Soal Ujian</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <label for="question">Pertanyaan</label>
                <div wire:ignore>
                  <textarea wire:model="question" name="question" id="question" rows="10" cols="80"></textarea>
                  <script>
                    $(document).ready(function() {
                      const question = CKEDITOR.replace('question');
                      question.on('change', function(event) {
                        @this.set('question', event.editor.getData());
                      })
                      $('#addQuestion').click(function(event) {
                        CKEDITOR.instances["question"].setData('');
                      })
                    })
                  </script>
                </div>
                @error('question')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="modal-body">
                <div wire:ignore>
                  <label for="optionA">Jawaban A</label>
                  <textarea name="optionA" id="optionA" rows="10" cols="80"></textarea>
                  <script>
                    const optionA = CKEDITOR.replace('optionA');
                    optionA.on('change', function(event) {
                      @this.set('optionA', event.editor.getData());
                    });
                  </script>
                </div>
                @error('optionA')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="modal-body">
                <div wire:ignore>
                  <label for="optionB">Jawaban B</label>
                  <textarea name="optionB" id="optionB" rows="10" cols="80"></textarea>
                  <script>
                    const optionB = CKEDITOR.replace('optionB');
                    optionB.on('change', function(event) {
                      @this.set('optionB', event.editor.getData());
                    });
                  </script>
                </div>
                @error('optionB')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="modal-body">
                <div wire:ignore>
                  <label for="optionC">Jawaban C</label>
                  <textarea name="optionC" id="optionC" rows="10" cols="80"></textarea>
                  <script>
                    const optionC = CKEDITOR.replace('optionC');
                    optionC.on('change', function(event) {
                      @this.set('optionC', event.editor.getData());
                    });
                  </script>
                </div>
                @error('optionC')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="modal-body">
                <div wire:ignore>
                  <label for="optionD">Jawaban D</label>
                  <textarea name="optionD" id="optionD" rows="10" cols="80"></textarea>
                  <script>
                    const optionD = CKEDITOR.replace('optionD');
                    optionD.on('change', function(event) {
                      @this.set('optionD', event.editor.getData());
                    });
                  </script>
                </div>
                @error('optionD')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="modal-body">
                <div wire:ignore>
                  <label for="optionE">Jawaban E</label>
                  <textarea name="optionE" id="optionE" rows="10" cols="80"></textarea>
                  <script>
                    const optionE = CKEDITOR.replace('optionE');
                    optionE.on('change', function(event) {
                      @this.set('optionE', event.editor.getData());
                    });
                  </script>
                </div>
                @error('optionE')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="modal-footer">
                <div class="container px-0">
                  <div class="row border-bottom py-3">
                    <p>Kunci Jawaban</p>
                    <div class="col-2">
                      <div class="form-check">
                        <input class="form-check-input" wire:model="correct" value="A" type="radio"
                          name="correct" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                          A
                        </label>
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="form-check">
                        <input class="form-check-input" wire:model="correct" value="B" type="radio"
                          name="correct" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                          B
                        </label>
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="form-check">
                        <input class="form-check-input" wire:model="correct" value="C" type="radio"
                          name="correct" id="flexRadioDefault3">
                        <label class="form-check-label" for="flexRadioDefault3">
                          C
                        </label>
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="form-check">
                        <input class="form-check-input" wire:model="correct" value="D" type="radio"
                          name="correct" id="flexRadioDefault4">
                        <label class="form-check-label" for="flexRadioDefault4">
                          D
                        </label>
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="form-check">
                        <input class="form-check-input" wire:model="correct" value="E" type="radio"
                          name="correct" id="flexRadioDefault5">
                        <label class="form-check-label" for="flexRadioDefault5">
                          E
                        </label>
                      </div>
                    </div>
                    @error('correct')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="row my-3">
                    <div class="col-md-12 text-end">
                      <button type="submit" id="addQuestion" class="btn btn-primary">Simpan</button>
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
