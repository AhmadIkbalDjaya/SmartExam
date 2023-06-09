<div class="page-breadcrumb">
  <!-- alerts -->
  @include('components.alerts')
  <!-- Guru -->
  <section id="headerProduk" style="min-height: 75vh;">
    <div class="container-fluid card py-4 h-100">
      <div class="row">
        <div class="col-md-8">
          <div class="container-fluid">
            <div class="row p-3">
              <div class="col-md-12">
                <h3>Guru</h3>
                <p>Menambah, Mengedit, atau Menghapus Guru</p>
              </div>
              <div class="col-md-4">
                <button wire:click="resetField" type="button" class="btn btn-primary" data-bs-toggle="modal"
                  data-bs-target="#createModal">
                  Tambah Guru
                </button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 p-4">
                <div class="table-responsive">
                  <table class="table table-bordered text-center">
                    <thead>
                      <tr>
                        <th class="col-md-4">Username</th>
                        <th class="col-md-4">Sekolah</th>
                        <th class="col-md-4">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($teachers as $teacher)
                        <tr>
                          <td>{{ $teacher->username }}</td>
                          <td>{{ $teacher->school->school_name }}</td>
                          <td>
                            <button style=" border: none;background: none; padding: 0">
                              <span wire:click="show({{ $teacher->id }})" class="badge text-bg-info"
                                data-bs-toggle="modal" data-bs-target="#showModal">
                                Informasi
                              </span>
                            </button>
                            <button style=" border: none;background: none; padding: 0">
                              <span wire:click="edit({{ $teacher->id }})" class="badge text-bg-warning px-4"
                                data-bs-toggle="modal" data-bs-target="#editModal">
                                Edit
                              </span>
                            </button>
                            <a href="#">
                              <span wire:click="delete({{ $teacher->id }})" class="badge text-bg-danger"
                                data-bs-toggle="modal" data-bs-target="#deleteModal">
                                Delete
                              </span>
                            </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{-- Show Modal --}}
                  <div wire:ignore.self class="modal fade" id="showModal" tabindex="-1"
                    aria-labelledby="showModalLabel" aria-hidden="true">
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
                                <div>
                                  <span> Username : </span>
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
                  <!-- Teacher Create Modal -->
                  <form wire:submit.prevent="store" method="POST">
                    <div wire:ignore.self class="modal fade" id="createModal" tabindex="-1"
                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Guru</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Username</label>
                              <input type="text" wire:model="username" name="username" id="exampleFormControlInput1"
                                class="form-control @error('username') is-invalid @enderror" />
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
                            <select wire:model="school_id"
                              class="form-select @error('school_id') is-invalid @enderror" name="school_id"
                              aria-label="Default select example">
                              <option hidden>Pilih Sekolah</option>
                              @foreach ($schools as $school)
                                <option value="{{ $school->id }}">
                                  {{ $school->school_name }}</option>
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
                  <!-- Teacher Edit Modal -->
                  <form wire:submit.prevent="update({{ $teacher_id }})" method="POST">
                    <div wire:ignore.self class="modal fade" id="editModal" tabindex="-1"
                      aria-labelledby="editModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editModalLabel">Edit Guru</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Username</label>
                              <input wire:model="username" type="text" name="username"
                                id="exampleFormControlInput1"
                                class="form-control @error('username') is-invalid @enderror" required />
                              @error('username')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                            </div>
                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Password</label>
                              <sub class="d-block mb-2">Kosongkan jika tidak ingin mengganti password</sub>
                              <div class="input-group">
                                <input type="password" wire:model="password" name="password"
                                  class="form-control
                                  @error('password') is-invalid @enderror"
                                  id="passwordInput">
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
                            <select wire:model="school_id"
                              class="form-select @error('school_id') is-invalid @enderror" name="school_id"
                              aria-label="Default select example">
                              <option hidden>Pilih Sekolah</option>
                              @foreach ($schools as $school)
                                <option value="{{ $school->id }}">
                                  {{ $school->school_name }}</option>
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
                  {{-- End Teacher Edit Modal --}}
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
                        <div class="modal-body">Apakah anda yakin ingin menghapus {{ $username }}?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Tidak
                          </button>
                          <button type="submit" wire:click="destroy({{ $teacher_id }})"
                            class="btn btn-primary">Ya</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- End Delete Modal --}}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 gambar1">
          <div class="container h-100">
            <div class="row align-items-center h-100">
              <div class="col-md-12">
                <img src="{{ asset('/images/teacher.svg') }}" alt="img" class="img-fluid" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
