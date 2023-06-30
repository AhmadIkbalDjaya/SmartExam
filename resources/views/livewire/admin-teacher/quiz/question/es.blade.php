<div class="page-breadcrumb">
  <!-- alerts -->
  @include('components.alerts')
  <!-- Question -->
  <section id="header">
    <div class="container-fluid card">
      <div class="row">
        <div class="col-md-12">
          <div class="container-fluid">
            <div class="row p-5">
              <div class="col-md-12 text-center">
                <h3>{{ $quiz->quiz_name }}</h3>
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
                <button type="button" id="createModalButton" class="btn btn-primary" data-bs-toggle="modal"
                  data-bs-target="#createModal">
                  Tambah Soal
                </button>
              </div>
            </div>
            @foreach ($questions as $question)
              <div class="row card-body shadow-sm">
                <div class="col-10 row">
                  <div class="col-1 text-center">
                    {{ $loop->iteration }}
                  </div>
                  <div class="col-11 px-0 overflow-auto">
                    {!! $question->question !!}
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
      <!-- Create Question Modal -->
      <form wire:submit.prevent="store" method="POST">
        <div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Buat Soal Ujian</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <label for="question">Pertanyaan</label>
                <div wire:ignore>
                  <textarea name="question" id="question" rows="10" cols="80"></textarea>
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
      <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
              <button type="button" wire:click='destroy({{ $question_id }})' class="btn btn-primary">Ya</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    $(document).ready(function() {
      // const question = CKEDITOR.replace('question');
      const question = CKEDITOR.replace('question', {
        filebrowserUploadUrl: "{{ route('ckUpload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form',
      });
      question.on('change', function(event) {
        @this.set('question', event.editor.getData());
      });
    });
    $("#createModalButton").click(function(event) {
      CKEDITOR.instances['question'].setData('');
    });
  </script>
</div>
