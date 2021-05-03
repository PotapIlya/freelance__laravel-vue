@if( $errors->any() )

    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismitt="alert" aria-label="Close">
            <span aria-hidden="true"></span>
        </button>
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>

    </div>

@endif
@if(session('success'))

    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismitt="alert" aria-label="Close">
            <span aria-hidden="true"></span>
        </button>
        <h2>
            {{ session()->get('success') }}
        </h2>
    </div>

@endif