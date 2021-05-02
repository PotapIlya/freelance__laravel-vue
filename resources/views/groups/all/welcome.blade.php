@extends('layouts.app')


@section('content')

    <section>
        <div class="container">
            <h1>
                main page
            </h1>
            <a href="{{ route('user.index.index') }}">
                Personal area
            </a>
        </div>
    </section>

@endsection