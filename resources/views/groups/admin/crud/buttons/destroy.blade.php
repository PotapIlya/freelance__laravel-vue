@if(isset($route))
    <form method="POST" action="{{ $route }}">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
@endif
