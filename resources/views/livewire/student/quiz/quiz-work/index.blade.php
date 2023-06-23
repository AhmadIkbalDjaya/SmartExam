<div class="page-breadcrumb">
  <section id="quiz">
    <div class="container-fluid px-3">
      <div class="row">
        <div class="col-md-2">
          <div class="container card rounded-3 shadow-sm px-0">
            <div class="row">
              <div class="col-md-12 p-4">
                <div class="d-flex">
                  <p>Soal</p>
                  <h3 class="text-dark ps-2">{{ $active_question }}</h3>
                </div>
                <p>Selesaikan ujian tepat waktu !</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card shadow-sm rounded-3">
            <div class="container px-1">
              <div class="row">
                @foreach ($questions as $question)
                  <div
                    class="question-box 
                  @if ($loop->iteration == $active_question) show-question
                  @else
                    hide-question @endif
                  ">
                    <div class="col-md-12 p-4">
                      <div>
                        {!! $question->question !!}
                      </div>
                      @foreach ($question->option as $option)
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="flexRadioDefault"
                            id="option{{ $option->id }}" />
                          <label class="form-check-label d-flex" for="option{{ $option->id }}">
                            <p>
                              {{ $option->option }}.
                            </p>
                            <div>
                              {!! $option->option_body !!}
                            </div>
                          </label>
                        </div>
                      @endforeach
                    </div>
                  </div>
                  {{-- @if ($loop->iteration == $active_question)
                    <div class="question-box">
                      <div class="col-md-12 p-4">
                        <div>
                          {!! $question->question !!}
                        </div>
                        @foreach ($question->option as $option)
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                              id="option{{ $option->id }}" />
                            <label class="form-check-label d-flex" for="option{{ $option->id }}">
                              <p>
                                {{ $option->option }}.
                              </p>
                              <div>
                                {!! $option->option_body !!}
                              </div>
                            </label>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  @endif --}}
                @endforeach
              </div>
              <div class="row p-2">
                <div class="col-6">
                  @if ($active_question != 1)
                    <button wire:click="previousQuestion" type="button" class="btn btn-primary">
                      <i class="bi bi-arrow-left"></i>
                      Halaman Sebelumnya
                    </button>
                  @endif
                </div>
                <div class="col-6 text-end">
                  @if ($active_question != $questions->count())
                    <button wire:click="nextQuestion" type="button" class="btn btn-primary">
                      Halaman Selanjutnya
                      <i class="bi bi-arrow-right"></i>
                    </button>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow-sm rounded-3">
            <div class="card-header">Semua Nomor</div>
            <div class="card-body p-0">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 py-4">
                    @foreach ($questions as $question)
                      <button wire:click='setQuestion({{ $loop->iteration }})' type="button"
                        class="btn p-0 mt-1 @if ($loop->iteration == $active_question) btn-secondary
                          @else
                          btn-info @endif"
                        style="height: 40px; width: 30px">
                        {{ $loop->iteration }}
                      </button>
                    @endforeach
                  </div>
                </div>
                <div class="row py-4 pt-0 pb-2">
                  <div class="col-md-12 d-flex">
                    <p>Waktu Tersisa</p>
                    <strong id="countdown" class="ps-3"></strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @push('script')
    <script src="{{ asset('/js/time.js') }}"></script>
  @endpush
</div>
