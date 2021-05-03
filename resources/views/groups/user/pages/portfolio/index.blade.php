@extends('groups.user.layouts.app')


@section('content')

    <div class="ui-208 w-100">

        <div class="d-flex align-items-center justify-content-between">
            <h2>
                Портфолио
            </h2>
            <a href="{{ route('user.portfolio.create') }}" class="btn btn-info">
                Добавить работу
            </a>
        </div>


            @if(count($user->portfolio))
            <div class="row">

                @foreach($user->portfolio as $portfolio)
                <div class="col-md-4 col-sm-6">
                    <div class="ui-item">
                        <a href="{{ route('user.portfolio.show', $portfolio->id) }}">
                            <img src="/storage/{{ $portfolio->path }}" alt="" class="img-responsive w-100" />
                        </a>

                        <div class="content">
                            <h3><a href="{{ route('user.portfolio.show', $portfolio->id) }}">Lorem ipsum dolor amet</a></h3>
                            <p>Quisque nisl leo, blandit in magna vel, pulvinar vehicula augue. Phasellus nulla enim, sodales eget eleifend ut, rutrum et velit.</p>

                            <div class="d-flex align-items-center justify-content-between">
                                <a href="{{ route('user.portfolio.edit', $portfolio->id) }}" class="btn btn-red">Редактировать</a>

                                <form action="{{ route('user.portfolio.destroy', $portfolio->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-red">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            @endif

    </div>

@endsection