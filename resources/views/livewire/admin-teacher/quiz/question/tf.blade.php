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
                <h4 class="py-3">Daftar Soal Ujian</h4>
                <button type="button" id="createModalButton" class="btn btn-primary" data-bs-toggle="modal"
                  data-bs-target="#createModal">
                  Tambah Soal
                </button>
              </div>
            </div>
            @foreach ($questions as $question)
              <div class="row card-body shadow-sm">
                <div class="col-10">
                  <div class="d-flex">
                    <div class="">
                      {{ $loop->iteration }}.
                    </div>
                    <div class="overflow-auto" style="padding-left: 5px">
                      {!! $question->question !!}
                    </div>
                  </div>
                  <div>
                    Jawaban:
                    @foreach ($question->option as $option)
                      {{ $option->is_correct ? "$option->option_body" : '' }}
                    @endforeach
                  </div>
                </div>
                <div class="col-2">
                  <div class="row h-100 align-items-center">
                    <div class="col-md-12">
                      @if (Auth::guard('user')->check())
                        <a
                          href="{{ route('admin.question.edit', ['quiz' => $quiz->id, 'question' => $question->id]) }}">
                          <button type="button" class="btn btn-primary my-1">
                            <i class="bi bi-pen"></i>
                          </button>
                        </a>
                      @elseif (Auth::guard('teacher')->check())
                        <a
                          href="{{ route('teacher.question.edit', ['quiz' => $quiz->id, 'question' => $question->id]) }}">
                          <button type="button" class="btn btn-primary my-1">
                            <i class="bi bi-pen"></i>
                          </button>
                        </a>
                      @endif
                      <button type="button" wire:click="setField({{ $question->id }})" class="btn btn-primary my-1"
                        data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <i class="bi bi-trash-fill"></i>
                      </button>
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
                  <textarea wire:model="question" name="question" id="question" rows="10" cols="80">{{ $question }}</textarea>
                </div>
                @error('question')
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

      <!-- Modal Hapus-->
      <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="deleteModalLabel">Hapus?</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus?</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
              <button type="button" wire:click='destroy({{ $question_id }})' class="btn btn-primary">Ya</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    $(document).ready(function() {
      const question = CKEDITOR.replace('question', {
        filebrowserUploadUrl: "{{ route('ckUpload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form',
      });
      question.on('change', function(event) {
        @this.set('question', event.editor.getData());
      });
      // const optionA = CKEDITOR.replace('optionA', {
      //   filebrowserUploadUrl: "{{ route('ckUpload', ['_token' => csrf_token()]) }}",
      //   filebrowserUploadMethod: 'form',
      // });
      // optionA.on('change', function(event) {
      //   @this.set('optionA', event.editor.getData());
      // });
      // const optionB = CKEDITOR.replace('optionB', {
      //   filebrowserUploadUrl: "{{ route('ckUpload', ['_token' => csrf_token()]) }}",
      //   filebrowserUploadMethod: 'form',
      // });
      // optionB.on('change', function(event) {
      //   @this.set('optionB', event.editor.getData());
      // });
      // const optionC = CKEDITOR.replace('optionC', {
      //   filebrowserUploadUrl: "{{ route('ckUpload', ['_token' => csrf_token()]) }}",
      //   filebrowserUploadMethod: 'form',
      // });
      // optionC.on('change', function(event) {
      //   @this.set('optionC', event.editor.getData());
      // });
      // const optionD = CKEDITOR.replace('optionD', {
      //   filebrowserUploadUrl: "{{ route('ckUpload', ['_token' => csrf_token()]) }}",
      //   filebrowserUploadMethod: 'form',
      // });
      // optionD.on('change', function(event) {
      //   @this.set('optionD', event.editor.getData());
      // });
      // const optionE = CKEDITOR.replace('optionE', {
      //   filebrowserUploadUrl: "{{ route('ckUpload', ['_token' => csrf_token()]) }}",
      //   filebrowserUploadMethod: 'form',
      // });
      // optionE.on('change', function(event) {
      //   @this.set('optionE', event.editor.getData());
      // });
      $("#createModalButton").click(function(event) {
        CKEDITOR.instances['question'].setData('');
        // CKEDITOR.instances['optionA'].setData('');
        // CKEDITOR.instances['optionB'].setData('');
        // CKEDITOR.instances['optionC'].setData('');
        // CKEDITOR.instances['optionD'].setData('');
        // CKEDITOR.instances['optionE'].setData('');
      });
    })
  </script>
</div>
