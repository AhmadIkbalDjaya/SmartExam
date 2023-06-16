<section id="headerProduk" style="min-height: 75vh;">
  <div class="container-fluid card py-4 h-100">
    <div class="row">
      <div class="col-md-6">
        <div class="container-fluid">
          <div class="row p-3">
            <div class="col-md-12 text-center">
              <h3 class="fs-2">Profile Admin</h3>
            </div>
          </div>
          <div class="row text-center">
            <div class="col-md-12 p-4">
              <div class="">
                <img src="{{ asset('/images/logo.png') }}" alt="img" class="rounded-circle border border-2"
                  height="200px">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <button class="badge text-bg-info fs-6 rounded-4 border-0 text-white" data-bs-toggle="modal"
                data-bs-target="#editModal">
                Ubah Password
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 gambar1">
        <div class="container h-100">
          <div class="row align-items-center h-100">
            <div class="col-md-12">
              <img src="{{ asset('/images/profile.svg') }}" alt="img" class="img-fluid" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Password-->
    <form wire:submit.prevent="changePassword" action="" method="POST">
      <div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="editModalLabel">Ubah Password</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password Baru</label>
                <div class="input-group">
                  <input type="password" wire:model="password" name="password" value="{{ old('password') }}"
                    class="form-control
                      @error('password') is-invalid @enderror"
                    id="passwordInput">
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
                  <input type="password" wire:model="password_confirmation" name="password_confirmation"
                    value="{{ old('password_confirmation') }}"
                    class="form-control
                      @error('password_confirmation') is-invalid @enderror"
                    id="passwordInput">
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
  </div>
</section>
