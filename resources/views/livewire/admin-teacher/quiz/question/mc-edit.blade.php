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
                <h4 class="py-3">Edit Soal Ujian</h4>
                <form wire:submit.prevent="update({{ $question_id }})" method="POST">
                  <div class="">
                    <label for="question_body">Pertanyaan</label>
                    <div wire:ignore>
                      <textarea wire:model="question_body" name="question_body" id="question_body" rows="10" cols="80">{{ $question_body }}</textarea>
                    </div>
                    @error('question_body')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="">
                    <div wire:ignore>
                      <label for="optionA">Jawaban A</label>
                      <textarea name="optionA" id="optionA" rows="10" cols="80">{{ $optionA }}</textarea>
                    </div>
                    @error('optionA')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="">
                    <div wire:ignore>
                      <label for="optionB">Jawaban B</label>
                      <textarea name="optionB" id="optionB" rows="10" cols="80">{{ $optionB }}</textarea>
                    </div>
                    @error('optionB')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="">
                    <div wire:ignore>
                      <label for="optionC">Jawaban C</label>
                      <textarea name="optionC" id="optionC" rows="10" cols="80">{{ $optionC }}</textarea>
                    </div>
                    @error('optionC')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="">
                    <div wire:ignore>
                      <label for="optionD">Jawaban D</label>
                      <textarea name="optionD" id="optionD" rows="10" cols="80">{{ $optionD }}</textarea>
                    </div>
                    @error('optionD')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="">
                    <div wire:ignore>
                      <label for="optionE">Jawaban E</label>
                      <textarea name="optionE" id="optionE" rows="10" cols="80">{{ $optionE }}</textarea>
                    </div>
                    @error('optionE')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="">
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
                        <div class="col-md-12 d-flex justify-content-between">
                          <a href="{{ route('admin.question.index', ['quiz'=>$quiz->id]) }}" class="btn btn-primary">Kembali</a>
                          <button type="submit" id="addQuestion" class="btn btn-primary">Simpan</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <script>
    $(document).ready(function() {
      const question_body = CKEDITOR.replace('question_body');
      question_body.on('change', function(event) {
        @this.set('question_body', event.editor.getData());
      });
      const optionA = CKEDITOR.replace('optionA');
      optionA.on('change', function(event) {
        @this.set('optionA', event.editor.getData());
      });
      const optionB = CKEDITOR.replace('optionB');
      optionB.on('change', function(event) {
        @this.set('optionB', event.editor.getData());
      });
      const optionC = CKEDITOR.replace('optionC');
      optionC.on('change', function(event) {
        @this.set('optionC', event.editor.getData());
      });
      const optionD = CKEDITOR.replace('optionD');
      optionD.on('change', function(event) {
        @this.set('optionD', event.editor.getData());
      });
      const optionE = CKEDITOR.replace('optionE');
      optionE.on('change', function(event) {
        @this.set('optionE', event.editor.getData());
      });
      // CKEDITOR.instances['question_body'].setData('dasda');
      // CKEDITOR.instances['optionA'].setData('dasda');
    })
    </script>
</div>
