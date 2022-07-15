<div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            {{ $number }}/{{ count($questions_id) }}
                        </div>
                        <div>
                            @if ($number > 1)
                                <span role="button" wire:click="prevNumber">Prev</span>
                            @endif
                            @if ($number < count($questions_id))
                                <span role="button" wire:click="nextNumber" class="mx-3">Next</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <p>{!! $question->body !!}</p>
                        <hr>
                        <ol type="A">
                            @foreach (json_decode($question->options) as $key => $item)
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label" for="options-{{ $question->id }}{{ $key }}">
                                    {{ $item }}
                                    @if (array_key_exists($question->id,$myAnswer) && $myAnswer[$question->id] === $key)
                                        @if ($myAnswer[$question->id] == $question->answer)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle text-primary" viewBox="0 0 16 16">
                                                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle text-danger" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                        @endif
                                    @endif
                                    @if ($question->answer == $key)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle text-success" viewBox="0 0 16 16">
                                            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                        </svg>
                                    @endif
                                    </label>
                                </div>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Nomor</div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($questions_id as $key => $item)
                            <div class="col-md-2 mb-3">
                                @if ($question_id === $item->id)
                                    <span role="button" wire:click="changeQuestion({{ $item->id }},{{ $key + 1 }})" class="text-primary">{{ $key + 1 }}</span>
                                @elseif(array_key_exists($item->id,$myAnswer))
                                    @if ($myAnswer[$item->id] == $item->answer)
                                        <span role="button" wire:click="changeQuestion({{ $item->id }},{{ $key + 1 }})" class="text-success">{{ $key + 1 }}</span>
                                    @else
                                        <span role="button" wire:click="changeQuestion({{ $item->id }},{{ $key + 1 }})" class="text-danger">{{ $key + 1 }}</span>
                                    @endif
                                @else
                                    <span role="button" wire:click="changeQuestion({{ $item->id }},{{ $key + 1 }})" class="text-dark">{{ $key + 1 }}</span>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <h5 class="mt-2">Nilai Kamu: {{ round(($this->exam_user->point * 100) / count($this->questions_id),1) }}</h5>
            </div>
        </div>
    </div>
</div>
