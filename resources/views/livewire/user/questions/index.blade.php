<div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            {{ $myNumber + 1 }}/{{ count($questions) }}
                        </div>
                        <div>
                            @if ($myNumber >= 1)
                                <span role="button" wire:click="prevNumber">Prev</span>
                            @endif
                            @if (($myNumber + 1) < count($questions))
                                <span role="button" wire:click="nextNumber" class="mx-3">Next</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <p>{!! $questions[$myNumber]['body'] !!}</p>
                        <hr>
                        <ol type="A">
                            @foreach (json_decode($questions[$myNumber]['options']) as $key => $item)
                            <li>
                                <div class="form-check" wire:click="selectAnswer({{ $questions[$myNumber]['id'] }},{{ $key }})">
                                    <label class="form-check-label" for="options-{{ $questions[$myNumber]['id'] }}{{ $key }}">
                                    {{ $item }}
                                    @if (array_key_exists($questions[$myNumber]['id'],$myAnswer) && $myAnswer[$questions[$myNumber]['id']] === $key)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle text-primary" viewBox="0 0 16 16">
                                            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                        </svg>
                                    @endif
                                    </label>
                                </div>
                            </li>
                            @endforeach
                        </ol>
                        @if (count($myAnswer) == count($questions))
                            <div class="d-grid">
                                <button wire:click="finish" class="btn btn-primary">Selesai</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Nomor</div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($questions as $key => $item)
                            <div class="col-md-2 mb-3">
                                @if ($key == $myNumber)
                                    <span role="button" wire:click="changeQuestion({{ $key }})" class="text-primary">{{ $key + 1 }}</span>
                                @else
                                    @if(array_key_exists($item['id'],$myAnswer))
                                        <span role="button" wire:click="changeQuestion({{ $key }})" class="text-warning">{{ $key + 1 }}</span>
                                    @else
                                        <span role="button" wire:click="changeQuestion({{ $key }})" class="text-dark">{{ $key + 1 }}</span>
                                    @endif
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div wire:ignore>
                    <div class="h2 text-center mt-4" id="countdown"></div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            // Set the date we're counting down to
            var countDownDate = new Date("{{ date(DATE_ISO8601, strtotime($exam_user->expired)) }}").getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "EXPIRED";
            }
            }, 1000);
            </script>
    @endpush
</div>
