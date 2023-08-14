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
                <p>Benar Salah</p>
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
                    <div class="container px-0">
                      <div class="row border-bottom py-3">
                        <p>Kunci Jawaban</p>
                        <div class="col-2">
                          <div class="form-check">
                            <input class="form-check-input" wire:model="correct" value="TT" type="radio"
                              name="correct" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                              Benar
                            </label>
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="form-check">
                            <input class="form-check-input" wire:model="correct" value="FF" type="radio"
                              name="correct" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                              Salah
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
                          @if (Auth::guard('user')->check())
                            <a href="{{ route('admin.question.index', ['quiz' => $quiz->id]) }}"
                              class="btn btn-primary">Kembali</a>
                          @elseif (Auth::guard('teacher')->check())
                            <a href="{{ route('teacher.question.index', ['quiz' => $quiz->id]) }}"
                              class="btn btn-primary">Kembali</a>
                          @endif
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
      const question_body = CKEDITOR.replace('question_body', {
        filebrowserUploadUrl: "{{ route('ckUpload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form',
      });
      question_body.on('change', function(event) {
        @this.set('question_body', event.editor.getData());
      });
    })
  </script>
</div>
