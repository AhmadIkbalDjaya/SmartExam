@if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <div>{{ session('success') }}</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
@if (session()->has('failed'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <div>{{ session('failed') }}</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
