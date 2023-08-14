<div class="container-fluid card py-4">
  <div class="row">
    <div class="col-md-12">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <select wire:model="select_school" name="select_school" class="form-select" aria-label="Default select example">
              <option value="">Semua Sekolah</option>
              @foreach ($schools as $school)
                <option value="{{ $school->id }}">{{ $school->school_name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 p-4">
            <div class="table-responsive">
              <table class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th class="">Rank</th>
                    <th class="">Nama Siswa</th>
                    <th class="">NISN</th>
                    <th class="">Sekolah</th>
                    <th class="">Nilai</th>
                    @if ($quiz->quiz_type == 'ES')
                      <th class="">Review</th>
                    @elseif ($quiz->quiz_type == 'MC' || $quiz->quiz_type == 'TF')
                      <th>Detail</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach ($quizStudents as $quizStudent)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $quizStudent->student->name }}</td>
                      <td>{{ $quizStudent->student->username }}</td>
                      <td>{{ $quizStudent->student->school->school_name }}</td>
                      <td>{{ $quizStudent->score }}</td>
                      @if ($quiz->quiz_type == 'ES')
                        <td>
                          <button wire:click='showEssayModal({{ $quizStudent->student->id }})'
                            class="badge bg-primary border-0" data-bs-toggle="modal" data-bs-target="#showModal"
                            style="cursor: pointer">
                            Review
                          </button>
                        </td>
                      @elseif ($quiz->quiz_type == 'MC' || $quiz->quiz_type == 'TF')
                        <td>
                          <button wire:click='showMcTfModal({{ $quizStudent->student->id }})'
                            class="badge bg-primary border-0" data-bs-toggle="modal" data-bs-target="#showModal"
                            style="cursor: pointer">
                            Detail
                          </button>
                        </td>
                      @endif
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 d-flex justify-content-between">
      <a href="{{ route('admin.recap.index') }}">
        <i class="bi bi-arrow-left"></i>
      </a>
      <a href="{{ route('admin.recap.quiz.print', ['quiz' => $quiz->id, 'select_school' => $select_school]) }}"
        type="submit" class="btn btn-primary fs-6"><i class="bi bi-printer"></i></a>
    </div>
  </div>
  {{-- modal review --}}
  @if ($quiz->quiz_type == 'ES')
    <div wire:ignore.self class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Review Jawaban</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table>
              <tr>
                <td>Jumlah Soal</td>
                <td>:</td>
                <td>{{ $question_count }}</td>
              </tr>
              <tr>
                <td>Kumpul</td>
                <td>:</td>
                <td>{{ $submit_on }}</td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </table>
            <form wire:submit="updateEssayScore({{ $student_id }})">
              <div class="row">
                <div class="col-6">
                  <input wire:model='score' name="score" type="number" min="0" max="100"
                    placeholder="Berikan Nilai" class="form-control @error('score') is-invalid @enderror">
                  @error('score')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-6">
                  <button type="submit" class="btn btn-primary">
                    Nilai
                  </button>
                </div>
              </div>
            </form>
            <div class="row">
              <a href="{{ asset('storage/' . $file) }}" download>Download
                PDF</a>
              <iframe src="{{ asset('storage/' . $file) }}" width="100%" height="600px"></iframe>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  @elseif ($quiz->quiz_type == 'MC' || $quiz->quiz_type == 'TF')
    <div wire:ignore.self class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Review Jawaban</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            {{ $quiz_student_answer }}
            <table>
              <tr>
                <td>Jumlah Soal</td>
                <td>:</td>
                <td>{{ $question_count }}</td>
              </tr>
              <tr>
                <td>Benar</td>
                <td>:</td>
                <td>{{ $correct_answer }}</td>
              </tr>
              <tr>
                <td>Salah</td>
                <td>:</td>
                <td>{{ $wrong_answer }}</td>
              </tr>
              <tr>
                <td>Tidak Dijawab</td>
                <td>:</td>
                <td>{{ $not_answered }}</td>
              </tr>
              <tr>
                <td>Kumpul</td>
                <td>:</td>
                <td>{{ $submit_on }}</td>
              </tr>

            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  @endif
</div>
