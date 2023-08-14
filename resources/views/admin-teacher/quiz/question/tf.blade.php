@extends('layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ asset('/css/table.css') }}">
  <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
@endpush
{{-- @push('style')
  <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
@endpush --}}

@section('body')
  @if (Auth::guard('user')->check())
    @include('components.navbarAdmin')
  @elseif (Auth::guard('teacher')->check())
    @include('components.navbarTeacher')
  @endif
  @include('components.spasi')
  <div class="page-wrapper">
    {{-- <livewire:admin-teacher.quiz.question.mc :quiz="$quiz"> --}}
      <livewire:admin-teacher.quiz.question.tf :quiz="$quiz" />
      {{-- <h1>Benar Salah</h1> --}}
      <footer class="footer text-center">
        © 2023 CBT Online by <a
          href="https://l.instagram.com/?u=http%3A%2F%2Fbit.ly%2F3UaE7in&e=AT0IbESTXiAOKa7dxGjRS7TwV1mU3eagwftwzG-WUCjc6a8XKAWg_czE-a9qrlrI9tTvLMe5y4ckTmhdMcbKBXki7cKHOUaoYvnoa9s">Adrian.com</a>
      </footer>
  </div>

  @push('script')
    <script src="{{ asset('/js/alerts.js') }}"></script>
    <script src="{{ asset('/js/password.js') }}"></script>
    <script src="{{ asset('/js/modal.js') }}"></script>
  @endpush
@endsection
