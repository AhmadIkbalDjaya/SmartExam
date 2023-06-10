<div class="page-breadcrumb">
  <!-- alerts -->
  @include('components.alerts')
  <!-- Siswa -->
  <section id="headerProduk" style="min-height: 75vh;">
    <div class="container-fluid card py-4 h-100">
      <div class="row">
        <div class="col-md-8">
          <div class="container-fluid">
            <div class="row p-3">
              <div class="col-md-12">
                <h3>Siswa</h3>
                <p>Menambah, Mengedit, atau Menghapus Siswaa</p>
              </div>
              <div class="col-md-4">
                <button wire:click="resetField" type="button" class="btn btn-primary" data-bs-toggle="modal"
                  data-bs-target="#createModal">
                  Tambah Siswa
                </button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 p-4">
                <div class="table-responsive">
                  <table class="table table-bordered text-center">
                    <thead>
                      <tr>
                        <th class="col-md-4">Nisn</th>
                        <th class="col-md-4">Nama</th>
                        <th class="col-md-4">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($students as $student)
                        <tr>
                          <td>{{ $student->username }}</td>
                          <td>{{ $student->name }}</td>
                          <td>
                            <button style=" border: none;background: none; padding: 0">
                              <span wire:click="setField({{ $student->id }})" class="badge text-bg-info"
                                data-bs-toggle="modal" data-bs-target="#showModal">
                                Informasi
                              </span>
                            </button>
                            <button style=" border: none;background: none; padding: 0">
                              <span wire:click="edit({{ $student->id }})" class="badge text-bg-warning px-4"
                                data-bs-toggle="modal" data-bs-target="#editModal">
                                Edit
                              </span>
                            </button>
                            <button style=" border: none;background: none; padding: 0">
                              <span wire:click="setField({{ $student->id }})" class="badge text-bg-danger"
                                data-bs-toggle="modal" data-bs-target="#deleteModal">
                                Delete
                              </span>
                            </button>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <!-- Student Create Modal -->
                  <form wire:submit.prevent="store" method="POST">
                    <div wire:ignore.self class="modal fade" id="createModal" tabindex="-1"
                      aria-labelledby="createModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="createModalLabel">Tambah Siswa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Nama</label>
                              <input type="text" wire:model="name" name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                id="exampleFormControlInput1" />
                              @error('name')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                            </div>
                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Nisn</label>
                              <input type="text" wire:model="username" name="username"
                                class="form-control @error('username') is-invalid @enderror"
                                id="exampleFormControlInput1" />
                              @error('username')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                            </div>
                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Password</label>
                              <div class="input-group">
                                <input type="password" wire:model="password" name="password"
                                  class="form-control @error('password') is-invalid @enderror" id="passwordInput">
                                <span class="input-group-append">
                                  <span class="input-group-text toggle-password" id="togglePassword"
                                    style="cursor: pointer">
                                    <i class="bi bi-eye-fill" alt="Show Password" id="eyeClosedIcon"></i>
                                    <i class="bi bi-eye-slash" alt="Hide Password" id="eyeOpenIcon"
                                      style="display: none;"></i>
                                  </span>
                                </span>
                                @error('password')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                            </div>
                            <select name="gender" wire:model="gender"
                              class="form-select @error('gender') is-invalid @enderror"
                              aria-label="Default select example">
                              <option hidden>Jenis Kelamin</option>
                              <option value="Laki-laki">
                                Laki-Laki</option>
                              <option value="Perempuan">
                                Perempuan</option>
                            </select>
                            @error('gender')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                            <select name="school_id" wire:model="school_id"
                              class="form-select mt-2 @error('school_id') is-invalid @enderror"
                              aria-label="Default select example">
                              <option hidden>Pilih Sekolah</option>
                              @foreach ($schools as $school)
                                <option value="{{ $school->id }}">
                                  {{ $school->school_name }}
                                </option>
                              @endforeach
                            </select>
                            @error('school_id')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  {{-- End Student Create Modal --}}

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
                          <div class="container">
                            <div class="row">
                              <div class="col-md-12">
                                <div>
                                  <span> Nama : </span>
                                  <span> {{ $name }} </span>
                                </div>
                                <br>
                                <div>
                                  <span> Nisn : </span>
                                  <span> {{ $username }} </span>
                                </div>
                                <br>
                                <div>
                                  <span> Password : </span>
                                  <span> {{ $password }} </span>
                                </div>
                                <br>
                                <div>
                                  <span> Sekolah : </span>
                                  <span> {{ $school_name }} </span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- End Show Modal --}}

                  <!-- Student Edit Modal -->
                  <form wire:submit.prevent="update({{ $student_id }})" method="POST">
                    <div wire:ignore.self class="modal fade" id="editModal" tabindex="-1"
                      aria-labelledby="editModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editModalLabel">Edit Siswa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Nama</label>
                              <input type="text" wire:model="name" name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                id="exampleFormControlInput1" />
                              @error('name')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                            </div>
                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Nisn</label>
                              <input type="text" wire:model="username" name="username"
                                class="form-control @error('username') is-invalid @enderror"
                                id="exampleFormControlInput1" />
                              @error('username')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                            </div>
                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Password</label>
                              <div class="input-group">
                                <input type="password" wire:model="password" name="password"
                                  class="form-control @error('password') is-invalid @enderror" id="passwordInput">
                                <span class="input-group-append">
                                  <span class="input-group-text toggle-password" id="togglePassword"
                                    style="cursor: pointer">
                                    <i class="bi bi-eye-fill" alt="Show Password" id="eyeClosedIcon"></i>
                                    <i class="bi bi-eye-slash" alt="Hide Password" id="eyeOpenIcon"
                                      style="display: none;"></i>
                                  </span>
                                </span>
                                @error('password')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                            </div>
                            <select wire:model="gender" name="gender"
                              class="form-select @error('gender') is-invalid @enderror"
                              aria-label="Default select example">
                              <option hidden>Jenis Kelamin</option>
                              <option value="Laki-laki">
                                Laki-Laki
                              </option>
                              <option value="Perempuan">
                                Perempuan
                              </option>
                            </select>
                            @error('gender')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                            <select wire:model="school_id" name="school_id"
                              class="form-select mt-2 @error('school_id') is-invalid @enderror"
                              aria-label="Default select example">
                              <option hidden>Pilih Sekolah</option>
                              @foreach ($schools as $school)
                                <option value="{{ $school->id }}">
                                  {{ $school->school_name }}
                                </option>
                              @endforeach
                            </select>
                            @error('school_id')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  <!-- End Student Edit Modal -->

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
                        <div class="modal-body">Apakah anda yakin ingin menghapus {{ $name }}?</div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                          <button type="submit" wire:click="destroy({{ $student_id }})" class="btn btn-primary">Ya</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Delete Modal -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 gambar1">
          <div class="container h-100">
            <div class="row align-items-center h-100">
              <div class="col-md-12">
                <img src="{{ asset('/images/student.svg') }}" alt="img" class="img-fluid" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
