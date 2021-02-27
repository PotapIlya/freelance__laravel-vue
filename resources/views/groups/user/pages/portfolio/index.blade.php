@extends('groups.user.layouts.app')


@section('content')

    <div>
        <h2>
            Портфолио
        </h2>

        <form method="POST" action="{{ route('user.portfolio.store') }}" enctype="multipart/form-data">
            @csrf
            <input name="image" type="file">
            <button type="submit">Send</button>
            
        </form>

        @if(count($user->portfolio))
            <div>

                <h3>
                    Мои работы
                </h3>

                <div class="row justify-content-start">
                    @foreach($user->portfolio as $portfolio)

                        <div class="col-4 d-flex flex-column mb-4">
                            <a href="{{ route('user.portfolio.show', $portfolio->id) }}">
                                <img class="w-100" src="/storage/{{ $portfolio->path }}" alt="">
                            </a>
                            <form action="{{ route('user.portfolio.destroy', $portfolio->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="w-100 btn btn-danger">Delete</button>
                            </form>
                        </div>


                    @endforeach
                </div>

            </div>
        @endif
        
    </div>

@endsection