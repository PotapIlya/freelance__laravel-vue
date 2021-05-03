@extends('groups.user.layouts.app')


@section('content')


    <form action="{{ route('user.portfolio.update', $id) }}" method="POST" class="w-100 ml-5" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">Название</label>
            <input value="{{ $item->title ?? 'Название' }}" type="text" name="title" class="form-control" id="title" placeholder="Название">
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
           @if(!is_null($item->path))
                <div class="col-3 mb-3 px-0">
                    <img class="w-100" src="/storage/{{ $item->path }}" alt="">
                </div>
            @endif
            <div class="custom-file">
                <input name="image" type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Выбрать картинку</label>
            </div>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="text" class="form-control" id="description" rows="3">{{ $item->text ?? 'Описание' }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>


@endsection