<div class="container-fluid card py-4">
    <div class="row">
      <div class="col-md-12">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
              <select wire:model="select_school" name="select_school" class="form-select"
                aria-label="Default select example">
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
                      <th class="col-md-4">Nama Siswa</th>
                      <th class="col-md-4">NISN</th>
                      <th class="col-md-4">Sekolah</th>
                      <th class="col-md-4">Nilai</th>
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
</div>
