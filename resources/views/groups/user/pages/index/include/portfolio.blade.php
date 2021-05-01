<div class="w-100 mt-4">

    <div class="d-flex align-items-center justify-content-between">
        <h2>
            Портфолио
        </h2>
        <a href="{{ route('user.portfolio.index') }}">
            Все работы
        </a>
    </div>

    @if(count($user->portfolio))

        <div class="row justify-content-start">
            @foreach($user->portfolio as $portfolio)
                <div class="col-6 d-flex flex-column mb-4">
                    <div>
                        <img class="w-100" src="/storage/{{ $portfolio->path }}" alt="">
                    </div>
                </div>
            @endforeach
        </div>

    @endif

</div>