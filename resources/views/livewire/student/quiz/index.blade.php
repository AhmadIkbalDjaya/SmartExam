<div class="page-breadcrumb">
  <!-- alerts -->
  @include('components.alerts')
  <!-- Ujian CBT -->
  <section id="header" style="min-height: 75vh;">
    <div class="container-fluid card py-4 h-100">
      <div class="row">
        <div class="col-md-12">
          <div class="container-fluid">
            <div class="row p-3">
              <div class="col-md-12">
                <h3>Daftar Ujian CBT</h3>
                <p>Di sini anda bisa bergabung kedalam ujian dengan memasukkan kode ujian yang sudah diberikan oleh
                  guru.</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 p-4">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Quiz</th>
                      <th scope="col">Soal</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divider">
                    @foreach ($quizzes as $quiz)
                      <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $quiz->quiz_name }}</td>
                        <td>
                          @if ($quiz->quiz_type == 'MC')
                            Pilihan Ganda
                          @else
                            Essay
                          @endif
                        </td>
                        <td>
                          <button style="border: none;background: none; padding: 0">
                            <span wire:click="setFeild({{ $quiz->id }})" class="badge text-bg-info"
                              data-bs-toggle="modal" data-bs-target="#showModal">
                              Mulai Ujian
                            </span>
                          </button>
                        </td>
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
  </section>
  {{-- Show Modal --}}
  <div wire:ignore.self class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="showModalLabel">Informasi</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="modal-body">
                <div class="row">
                  <div class="col-5">
                    <div>Nama Quiz:</div>
                  </div>
                  <div class="col-1">:</div>
                  <div class="col-6">{{ $quiz_name }}</div>
                </div>
                <div class="row">
                  <div class="col-5">
                    <div>Pilih Quiz:</div>
                  </div>
                  <div class="col-1">:</div>
                  <div class="col-6">
                    @if ($quiz_type == 'MC')
                      Pilihan Ganda
                    @else
                      Essay
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col-5">
                    <div>Waktu Mulai:</div>
                  </div>
                  <div class="col-1">:</div>
                  <div class="col-6">{{ date('j M Y H:i', strtotime($start_time)) }}</div>
                </div>
                <div class="row">
                  <div class="col-5">
                    <div>Waktu Berakhir:</div>
                  </div>
                  <div class="col-1">:</div>
                  <div class="col-6">{{ date('j M Y H:i', strtotime($end_time)) }}</div>
                </div>
                <div class="row">
                  <div class="col-5">
                    <div>Waktu Pengerjaan:</div>
                  </div>
                  <div class="col-1">:</div>
                  <div class="col-6">{{ $duration }} Menit</div>
                </div>
                <div class="row">
                  <div class="col-5">
                    <div>Jumlah Soal:</div>
                  </div>
                  <div class="col-1">:</div>
                  <div class="col-6">{{ $question_count }}</div>
                </div>
                <form wire:submit.prevent="startQuiz">
                  @if (in_array($quiz_id, $quiz_students))
                    <div class="text-center text-success">
                      Telah Dikerjakan
                    </div>
                  @elseif (\Carbon\Carbon::now()->isBefore(\Carbon\Carbon::parse($quiz->start_time)))
                    <div class="text-center text-danger">
                      Quiz Belum di Mulai
                    </div>
                  @elseif (\Carbon\Carbon::now()->isAfter(\Carbon\Carbon::parse($quiz->end_time)))
                    <div class="text-center text-danger">
                      Quiz sudah berakhir
                    </div>
                  @else
                    <div class="row">
                      <div class="col-5">
                        <div>Masukkan Kode Quiz:</div>
                      </div>
                      <div class="col-1">:</div>
                      <div class="col-6">
                        <div class="mb-3">
                          <input wire:model="input_quiz_code" name="input_quiz_code" type="text"
                            class="form-control @error('input_quiz_code') is-invalid @enderror"
                            id="exampleFormControlInput1" style="height: 25px; width: 120px">
                        </div>
                      </div>
                    </div>
                  @endif
                  <div class="row text-center">
                    <div class="col-12">
                      <p class="text-danger">
                        @error('input_quiz_code')
                          {{ $message }}
                        @enderror
                        @error('wrongCode')
                          {{ $message }}
                        @enderror
                      </p>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary badge">Mulai</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
