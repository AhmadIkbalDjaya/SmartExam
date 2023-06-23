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
    <livewire:student.quiz.quiz-work.index :quiz="$quiz"/>

  </div>
@endsection
