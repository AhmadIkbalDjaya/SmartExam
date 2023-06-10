<div class="page-breadcrumb">
  <!-- alerts -->
  @include('components.alerts')
  <!-- sekolah -->
  <section id="headerProduk" style="min-height: 75vh;">
    <div class="container-fluid card py-4 h-100">
      <div class="row">
        <div class="col-md-8">
          <div class="container-fluid">
            <div class="row p-3">
              <div class="col-md-12">
                <h3>Sekolah</h3>
                <p>Menambah, Mengedit, atau Menghapus Sekolah</p>
              </div>
              <div class="col-md-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                  Tambah Sekolah
                </button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 p-4">
                <div class="table-responsive">
                  <table class="table table-bordered text-center">
                    <thead>
                      <tr>
                        <th class="col-md-4">Kategori</th>
                        <th class="col-md-4">Nama Sekolah</th>
                        <th class="col-md-4">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($schools as $school)
                        <tr>
                          <td>{{ $school->school_category }}</td>
                          <td>{{ $school->school_name }}</td>
                          <td>
                            <button style=" border: none;background: none; padding: 0">
                              <span wire:click="edit({{ $school->id }})" class="badge text-bg-warning px-4"
                                data-bs-toggle="modal" data-bs-target="#editModal">
                                Edit
                              </span>
                            </button>
                            <button style=" border: none;background: none; padding: 0">
                              <span wire:click="setField({{ $school->id }})" class="badge text-bg-danger"
                                data-bs-toggle="modal" data-bs-target="#deleteModal">
                                Delete
                              </span>
                            </button>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <!-- Modal Tambah Sekolah-->
                  <form wire:submit.prevent="store" method="POST">
                    <div wire:ignore.self class="modal fade" id="createModal" tabindex="-1"
                      aria-labelledby="createModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="createModalLabel">Tambah Sekolah</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Nama Sekolah</label>
                              <input type="text" wire:model="school_name" name="school_name"
                                id="exampleFormControlInput1"
                                class="form-control @error('school_name') is-invalid @enderror" />
                              @error('school_name')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                            </div>
                            <select wire:model="school_category" name="school_category"
                              class="form-select @error('school_category') is-invalid @enderror"
                              aria-label="Default select example">
                              <option hidden>Kategori</option>
                              <option value="SMP">SMP</option>
                              <option value="SMA">SMA</option>
                            </select>
                            @error('school_category')
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

                  <!-- Modal Edit Sekolah-->
                  <form wire:submit.prevent="update({{ $school_id }})" method="POST">
                    <div wire:ignore.self class="modal fade" id="editModal" tabindex="-1"
                      aria-labelledby="editModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editModalLabel">Edit Sekolah
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Nama Sekolah</label>
                              <input type="text" wire:model="school_name" name="school_name"
                                id="exampleFormControlInput1"
                                class="form-control @error('school_name') is-invalid @enderror" />
                              @error('school_name')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                            </div>
                            <select name="school_category" wire:model="school_category"
                              class="form-select @error('school_category') is-invalid @enderror"
                              aria-label="Default select example">
                              <option hidden>Kategori</option>
                              <option value="SMP">
                                SMP
                              </option>
                              <option value="SMA">
                                SMA
                              </option>
                            </select>
                            @error('school_category')
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

                  <!-- Delete Modal-->
                  <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1"
                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="deleteModalLabel">Hapus?</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body">Apakah anda yakin ingin menghapus {{ $school_name }}?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                          <button type="submit" wire:click='destroy({{ $school_id }})'
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
        <div class="col-md-4 gambar1">
          <div class="container h-100">
            <div class="row align-items-center h-100">
              <div class="col-md-12">
                <img src="{{ asset('/images/class.svg') }}" alt="img" class="img-fluid" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
