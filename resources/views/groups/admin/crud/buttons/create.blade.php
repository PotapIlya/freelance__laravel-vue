@if(isset($route))
    <a href="{{ $route }}" class="btn btn-primary">
        Создать
    </a>
@endif

@if(isset($submit))
    <button type="submit" class="btn btn-primary">
        Создать
    </button>
@endif