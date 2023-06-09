@extends('layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ asset('/css/table.css') }}">
@endpush

@section('body')
  @include('components.navbarAdmin')
  @include('components.spasi')
  <div class="page-wrapper">
    <div class="page-breadcrumb">
      <!-- alerts -->
      <div id="alerts"></div>
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah
                      Sekolah</button>
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
                          <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>
                              <a href="#"><span class="badge text-bg-info" id="liveAlertBtn">Informasi</span></a>
                              <a href="#"><span class="badge text-bg-warning px-4"
                                  id="liveAlertBtn2">Edit</span></a>
                              <a href="#"><span class="badge text-bg-danger" id="liveAlertBtn3">Delete</span></a>
                            </td>
                          </tr>
                          <tr>
                            <td>SMA</td>
                            <td>SMAN 17 GOWA</td>
                            <td>
                              <button style=" border: none;background: none; padding: 0"><span
                                  class="badge text-bg-warning px-4" data-bs-toggle="modal"
                                  data-bs-target="#edit">Edit</span></button>
                              <a href="#"><span class="badge text-bg-danger" data-bs-toggle="modal"
                                  data-bs-target="#hapus">Delete</span></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!-- Modal Tambah Sekolah-->
                      <form action="">
                        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel"
                          aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Sekolah</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="mb-3">
                                  <label for="exampleFormControlInput1" class="form-label">Nama Sekolah</label>
                                  <input type="text" class="form-control" id="exampleFormControlInput1" required />
                                </div>
                                <select class="form-select" aria-label="Default select example">
                                  <option selected>Kategori</option>
                                  <option value="1">SMP</option>
                                  <option value="1">SMA</option>
                                </select>
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
                      <form action="">
                        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel"
                          aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Sekolah</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="mb-3">
                                  <label for="exampleFormControlInput1" class="form-label">Nama Sekolah</label>
                                  <input type="text" class="form-control" id="exampleFormControlInput1" required />
                                </div>
                                <select class="form-select" aria-label="Default select example">
                                  <option selected>Kategori</option>
                                  <option value="1">SMP</option>
                                  <option value="1">SMA</option>
                                </select>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                  data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                      <!-- Modal Hapus-->
                      <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus?</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">Apakah anda yakin ingin menghapusnya?</div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                              <button type="button" class="btn btn-primary">Ya</button>
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
    <footer class="footer text-center">
      © 2023 CBT Online by <a
        href="https://l.instagram.com/?u=http%3A%2F%2Fbit.ly%2F3UaE7in&e=AT0IbESTXiAOKa7dxGjRS7TwV1mU3eagwftwzG-WUCjc6a8XKAWg_czE-a9qrlrI9tTvLMe5y4ckTmhdMcbKBXki7cKHOUaoYvnoa9s">Adrian.com</a>
    </footer>
  </div>
  @push('script')
    <script src="{{ asset('/js/password.js') }}"></script>
    <script src="{{ asset('/js/alerts.js') }}"></script>
  @endpush
@endsection
