<div class="page-breadcrumb">
  <!-- alerts -->
  @include('components.alerts')
  <!-- Profile -->
  <section id="headerProduk">
    <div class="container-fluid card py-4 h-100">
      <div class="row">
        <div class="col-md-6">
          <div class="container-fluid">
            <div class="row p-3">
              <div class="col-md-12 text-center">
                <h3 class="fs-2">Profile Siswa</h3>
              </div>
            </div>
            <div class="row text-center">
              <div class="col-md-12 p-4">
                <div class="">
                  <img src="{{ asset('/images/logo.png') }}" alt="img" class="rounded-circle border border-2"
                    height="190px">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col"></th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Nama </td>
                      <td>:</td>
                      <td>{{ $student->name }}</td>
                    </tr>
                    <tr>
                      <td>NISN</td>
                      <td>:</td>
                      <td>{{ $student->username }}</td>
                    </tr>
                    <tr>
                      <td>Sekolah</td>
                      <td>:</td>
                      <td>{{ $student->school->school_name }}</td>
                    </tr>
                    <tr>
                      <td>Jenis Kelamin</td>
                      <td>:</td>
                      <td>{{ $student->gender }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-12 text-center">
                <button class="badge text-bg-info fs-6 rounded-4 border-0" data-bs-toggle="modal"
                  data-bs-target="#editModal">
                  Ubah Password
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- recap hasil ujian --}}
  <section id="header">
    <div class="container-fluid card py-4 h-100">
      <div class="row">
        <div class="col-md-12">
          <div class="container-fluid">
            <div class="row p-3">
              <div class="col-md-12">
                <h3>Daftar Hasil Ujian CBT</h3>
                <p>Melihat hasil ujian CBT yang sudah dikerjakan</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 p-4">
                <table class="table">
                  <thead>
                    <tr class="text-center">
                      <th scope="col">No</th>
                      <th scope="col">Nama Quiz</th>
                      <th scope="col">Soal</th>
                      <th scope="col">Nilai</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divider">
                    @foreach ($quizStudents as $quizStudent)
                      <tr class="text-center">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $quizStudent->quiz->quiz_name }}</td>
                        <td>
                          @if ($quizStudent->quiz->quiz_type == 'MC')
                            Pilihan Ganda
                          @else
                            Essay
                          @endif
                        </td>
                        <td>{{ $quizStudent->score }}</td>
                        <td>
                          <button style=" border: none;background: none; padding: 0">
                            <span wire:click="setField({{ $quizStudent->id }})" class="badge text-bg-info" data-bs-toggle="modal" data-bs-target="#showModal">
                              Informasi
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

  <!-- Modal Password-->
  <form wire:submit.prevent="changePassword" action="">
    <div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Password Baru</label>
              <div class="input-group">
                <input wire:model="password" type="password" name="password" value="{{ old('password') }}"
                  class="form-control
                  @error('password') is-invalid @enderror" id="passwordInput"
                  required>
                <span class="input-group-append">
                  <span class="input-group-text toggle-password" id="togglePassword" style="cursor: pointer">
                    <i class="bi bi-eye-fill" alt="Show Password" id="eyeClosedIcon"></i>
                    <i class="bi bi-eye-slash" alt="Hide Password" id="eyeOpenIcon" style="display: none;"></i>
                  </span>
                </span>
                @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Komfirmasi Password Baru</label>
              <div class="input-group">
                <input wire:model="password_confirmation" type="password" name="password_confirmation"
                  value="{{ old('password_confirmation') }}"
                  class="form-control
                  @error('password_confirmation') is-invalid @enderror"
                  id="passwordInput" required>
                <span class="input-group-append">
                  <span class="input-group-text toggle-password" id="togglePassword" style="cursor: pointer">
                    <i class="bi bi-eye-fill" alt="Show Password" id="eyeClosedIcon"></i>
                    <i class="bi bi-eye-slash" alt="Hide Password" id="eyeOpenIcon" style="display: none;"></i>
                  </span>
                </span>
                @error('password_confirmation')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  {{-- Show Modal --}}
  <div wire:ignore.self class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="showModalLabel">Informasi</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col"></th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Nama Quiz</td>
                      <td>:</td>
                      <td>{{ $quiz_name }}</td>
                    </tr>
                    <tr>
                      <td>Pilih Quiz</td>
                      <td>:</td>
                      <td>
                        @if ($quiz_type == "MC")
                          Pilihan Ganda
                        @else
                          Essay
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Waktu Mulai</td>
                      <td>:</td>
                      <td>
                        {{ date('j M Y H:i', strtotime($start_time)) }}
                      </td>
                    </tr>
                    <tr>
                      <td>Waktu Berakhir</td>
                      <td>:</td>
                      <td>
                        {{ date('j M Y H:i', strtotime($end_time)) }}
                      </td>
                    </tr>
                    <tr>
                      <td>Waktu Pengerjaan</td>
                      <td>:</td>
                      <td>{{ $duration }} menit</td>
                    </tr>
                    <tr>
                      <td>Nilai Ujian</td>
                      <td>:</td>
                      <td class="fw-bold">{{ $score }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
