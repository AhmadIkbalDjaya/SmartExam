@extends('layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ asset('/css/table.css') }}">
  <style>
    .show-question {
      display: block;
    }

    .hide-question {
      display: none;
    }
  </style>
@endpush

@section('body')
  @include('components.navbarStudent')
  @include('components.spasi')

  <div class="page-wrapper pt-5">
    @if ($quiz->quiz_type == 'MC')
      <livewire:student.quiz.quiz-work.mc-work :quiz="$quiz" />
    @elseif ($quiz->quiz_type == 'ES')
      <livewire:student.quiz.quiz-work.es-work :quiz="$quiz" />
    @endif
  </div>
@endsection
