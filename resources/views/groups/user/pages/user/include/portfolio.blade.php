<div class="mt-4">
    <h2>
        Портфолио
    </h2>

    <div class="row align-items-center">

        @foreach($user->portfolio as $portfolio)
            <a href="{{ route('user.portfolio.show', $portfolio->id) }}"
               class="col-4 mb-3">
                <div class="d-flex">
                    <img class="d-flex w-100" src="/storage/{{ $portfolio->path }}" alt="">
                </div>
            </a>
        @endforeach

    </div>

</div>