<div class="page-breadcrumb">
  <!-- alerts -->
  <div id="alerts"></div>
  <!-- Quizz -->
  <section id="header" style="min-height: 75vh;">
    <div class="container-fluid card py-4 h-100">
      <div class="row">
        <div class="col-md-12">
          <div class="container-fluid">
            <div class="row p-3">
              <div class="col-md-12">
                <h3>Quizz</h3>
                <p>Menambah, Mengedit, atau Menghapus Quizz</p>
              </div>
              <div class="col-md-4">
                <button wire:click="resetFeild" type="button" class="btn btn-primary" data-bs-toggle="modal"
                  data-bs-target="#createModal">
                  Tambah Quizz
                </button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 p-4">
                @if ($quizzes->count() > 0)
                  <div class="table-responsive">
                    <table class="table table-bordered text-center">
                      <thead>
                        <tr>
                          <th class="col-md-4">Nama</th>
                          <th class="col-md-4">Kode Quizz</th>
                          <th class="col-md-4">Quizz</th>
                          <th class="col-md-4">Paket Soal</th>
                          <th class="col-md-4">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($quizzes as $quiz)
                          <tr>
                            <td>
                              {{ $quiz->quiz_name }} - {{ $quiz->quiz_category }}
                            </td>
                            <td>{{ $quiz->quiz_code }}</td>
                            <td>
                              @if ($quiz->quiz_type == 'MC')
                                Pilihan Ganda
                              @elseif($quiz->quiz_type == 'ES')
                                Essay
                              @elseif ($quiz->quiz_type == "TF")
                                Benar Salah
                              @endif
                            </td>
                            <td>
                              @if (Auth::guard('user')->check())
                                <a href="{{ route('admin.question.index', ['quiz' => $quiz->id]) }}"
                                  style=" border: none;background: none; padding: 0">
                                  <span class="badge text-bg-primary">
                                    Tambah Soal
                                  </span>
                                </a>
                              @elseif (Auth::guard('teacher')->check())
                                <a href="{{ route('teacher.question.index', ['quiz' => $quiz->id]) }}"
                                  style=" border: none;background: none; padding: 0">
                                  <span class="badge text-bg-primary">
                                    Tambah Soal
                                  </span>
                                </a>
                              @endif
                            </td>
                            <td>
                              <button style=" border: none;background: none; padding: 0">
                                <span wire:click="setField({{ $quiz->id }})" class="badge text-bg-info"
                                  data-bs-toggle="modal" data-bs-target="#showModal">
                                  Informasi
                                </span>
                              </button>
                              <button style=" border: none;background: none; padding: 0">
                                <span wire:click="edit({{ $quiz->id }})" class="badge text-bg-warning px-4"
                                  data-bs-toggle="modal" data-bs-target="#editModal">
                                  Edit
                                </span>
                              </button>
                              <button style=" border: none;background: none; padding: 0">
                                <span wire:click="setField({{ $quiz->id }})" class="badge text-bg-danger"
                                  data-bs-toggle="modal" data-bs-target="#deleteModal">
                                  Delete
                                </span>
                              </button>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                @else
                  <h3 class="text-center">Belum ada quiz yang ditambahkan</h3>
                @endif
                <!-- Modal Tambah Quizz-->
                <form wire:submit.prevent="store" method="POST">
                  <div wire:ignore.self class="modal fade" id="createModal" tabindex="-1"
                    aria-labelledby="createModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="createModalLabel">Tambah Paket Soal</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Quizz</label>
                            <input type="text" wire:model="quiz_name" name="quiz_name"
                              class="form-control @error('quiz_name') is-invalid @enderror"
                              id="exampleFormControlInput1" />
                            @error('quiz_name')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Kode Quizz</label>
                            <input type="text" wire:model="quiz_code" name="quiz_code"
                              class="form-control @error('quiz_code') is-invalid @enderror"
                              id="exampleFormControlInput1" />
                            @error('quiz_code')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <div class="container-fluid px-0">
                              <div class="row">
                                <div class="col-6">
                                  <label for="form-select" class="form-label">Pilih Sekolah</label>
                                  <select wire:model="quiz_category" name="quiz_category"
                                    class="form-select @error('quiz_category') is-invalid @enderror"
                                    aria-label="Default select example" id="form-select">
                                    <option selected>-</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                  </select>
                                  @error('quiz_category')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                                <div class="col-6">
                                  <label for="form-select" class="form-label">Pilih Quiz</label>
                                  <select wire:model="quiz_type" name="quiz_type"
                                    class="form-select @error('quiz_type') is-invalid @enderror"
                                    aria-label="Default select example" id="form-select">
                                    <option selected>-</option>
                                    <option value="MC">Pilihan Ganda</option>
                                    <option value="ES">Essay</option>
                                    <option value="TF">Benar Salah</option>
                                  </select>
                                  @error('quiz_type')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <div class="container-fluid px-0">
                              <div class="row">
                                <div class="col-6">
                                  <label for="exampleFormControlInput1" class="form-label">Waktu Mulai</label>
                                  <input type="datetime-local" wire:model="start_time" name="start_time"
                                    class="form-control @error('start_time') is-invalid @enderror"
                                    id="exampleFormControlInput1" />
                                  @error('start_time')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                                <div class="col-6">
                                  <label for="exampleFormControlInput1" class="form-label">Waktu Berakhir</label>
                                  <input type="datetime-local" wire:model="end_time" name="end_time"
                                    class="form-control @error('end_time') is-invalid @enderror"
                                    id="exampleFormControlInput1" />
                                  @error('end_time')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <div class="container-fluid px-0">
                              <div class="row">
                                <div class="col-6">
                                  <label for="exampleFormControlInput1" class="form-label">Waktu Pengerjaan</label>
                                  <input type="number" min="0" wire:model="duration" name="duration"
                                    class="form-control @error('duration') is-invalid @enderror"
                                    id="exampleFormControlInput1" />
                                  @error('duration')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                                <div class="col-6">
                                  <label for="flexRadioDefault" class="form-label">Aktifkan Quiz?</label>
                                  <div class="d-flex">
                                    <div class="form-check me-3">
                                      <input wire:model="is_active" value="1"
                                        class="form-check-input @error('is_active') is-invalid @enderror"
                                        type="radio" name="is_active" id="flexRadioDefault1">
                                      <label class="form-check-label" for="flexRadioDefault1">
                                        Ya
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input wire:model="is_active" value="0"
                                        class="form-check-input @error('is_active') is-invalid @enderror"
                                        type="radio" name="is_active" id="flexRadioDefault2">
                                      <label class="form-check-label" for="flexRadioDefault2">
                                        Tidak
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <!-- Modal Edit Quizz-->
                <form wire:submit.prevent="update({{ $quiz_id }})" method="POST">
                  <div wire:ignore.self class="modal fade" id="editModal" tabindex="-1"
                    aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="editModalLabel">Edit Paket Soal</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Quizz</label>
                            <input type="text" wire:model="quiz_name" name="quiz_name"
                              class="form-control @error('quiz_name') is-invalid @enderror"
                              id="exampleFormControlInput1" />
                            @error('quiz_name')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Kode Quizz</label>
                            <input type="text" wire:model="quiz_code" name="quiz_code"
                              class="form-control @error('quiz_code') is-invalid @enderror"
                              id="exampleFormControlInput1" />
                            @error('quiz_code')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <div class="container-fluid px-0">
                              <div class="row">
                                <div class="col-6">
                                  <label for="form-select" class="form-label">Pilih Sekolah</label>
                                  <select wire:model="quiz_category" name="quiz_category"
                                    class="form-select @error('quiz_category') is-invalid @enderror"
                                    aria-label="Default select example" id="form-select">
                                    <option selected>-</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                  </select>
                                  @error('quiz_category')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                                <div class="col-6">
                                  <label for="form-select" class="form-label">Pilih Quiz</label>
                                  <select wire:model="quiz_type" name="quiz_type"
                                    class="form-select @error('quiz_type') is-invalid @enderror"
                                    aria-label="Default select example" id="form-select">
                                    <option selected>-</option>
                                    <option value="MC">Pilihan Ganda</option>
                                    <option value="ES">Essay</option>
                                    <option value="TF">Benar Salah</option>
                                  </select>
                                  @error('quiz_type')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <div class="container-fluid px-0">
                              <div class="row">
                                <div class="col-6">
                                  <label for="exampleFormControlInput1" class="form-label">Waktu Mulai</label>
                                  <input type="datetime-local" wire:model="start_time" name="start_time"
                                    class="form-control @error('start_time') is-invalid @enderror"
                                    id="exampleFormControlInput1" />
                                  @error('start_time')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                                <div class="col-6">
                                  <label for="exampleFormControlInput1" class="form-label">Waktu Berakhir</label>
                                  <input type="datetime-local" wire:model="end_time" name="end_time"
                                    class="form-control @error('end_time') is-invalid @enderror"
                                    id="exampleFormControlInput1" />
                                  @error('end_time')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <div class="container-fluid px-0">
                              <div class="row">
                                <div class="col-6">
                                  <label for="exampleFormControlInput1" class="form-label">Waktu Pengerjaan</label>
                                  <input type="number" min="0" wire:model="duration" name="duration"
                                    class="form-control @error('duration') is-invalid @enderror"
                                    id="exampleFormControlInput1" />
                                  @error('duration')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                                <div class="col-6">
                                  <label for="flexRadioDefault" class="form-label">Aktifkan Quiz?</label>
                                  <div class="d-flex">
                                    <div class="form-check me-3">
                                      <input wire:model="is_active" value="1"
                                        class="form-check-input @error('is_active') is-invalid @enderror"
                                        type="radio" name="is_active" id="flexRadioDefault1">
                                      <label class="form-check-label" for="flexRadioDefault1">
                                        Ya
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input wire:model="is_active" value="0"
                                        class="form-check-input @error('is_active') is-invalid @enderror"
                                        type="radio" name="is_active" id="flexRadioDefault2">
                                      <label class="form-check-label" for="flexRadioDefault2">
                                        Tidak
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                {{-- Show Modal --}}
                <div wire:ignore.self class="modal fade" id="showModal" tabindex="-1"
                  aria-labelledby="showModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="showModalLabel">Informasi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                          aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <h4 class="text-center">{{ $quiz_name }}</h4>
                        <div class="row">
                          <div class="col-6">
                            <table class="table table-borderless table-sm">
                              <tbody>
                                <tr>
                                  <td><span> Kode Quiz</span></td>
                                  <td><span>: {{ $quiz_code }} </span></td>
                                </tr>
                                <tr>
                                  <td><span> Sekolah</span></td>
                                  <td><span>: {{ $quiz_category }} </span></td>
                                </tr>
                                <tr>
                                  <td><span> Jenis Quiz</span></td>
                                  <td>
                                    <span>:
                                      @if ($quiz_type == 'MC')
                                        Pilihan Ganda
                                      @else
                                        Essay
                                      @endif
                                    </span>
                                  </td>
                                </tr>
                                <tr>
                                  <td><span> Jumlah Soal</span></td>
                                  <td><span>: {{ $question_count ? $question_count : 0 }} </span></td>
                                </tr>
                                <tr>
                                  <td><span> Waktu Mulai</span></td>
                                  <td>
                                    <span>
                                      : {{ date('j M Y H:i', strtotime($start_time)) }}
                                    </span>
                                  </td>
                                </tr>
                                <tr>
                                  <td><span> Waktu Berakhir</span></td>
                                  <td>
                                    <span>
                                      : {{ date('j M Y H:i', strtotime($end_time)) }}
                                    </span>
                                  </td>
                                </tr>
                                <tr>
                                  <td><span> Waktu Pengerjaan</span></td>
                                  <td><span>: {{ $duration }} menit</span></td>
                                </tr>
                                <tr>
                                  <td><span> Status</span></td>
                                  <td>: <span class="badge text-bg-info">Aktif</span></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Delete Modal -->
                <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1"
                  aria-labelledby="deleteModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteModalLabel">Hapus?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                          aria-label="Close"></button>
                      </div>
                      <div class="modal-body">Apakah anda yakin ingin menghapus {{ $quiz_name }}?</div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <button type="button" wire:click="destroy({{ $quiz_id }})"
                          class="btn btn-primary">Ya</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
