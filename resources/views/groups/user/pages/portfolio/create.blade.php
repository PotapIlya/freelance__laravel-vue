@extends('groups.user.layouts.app')


@section('content')


    <form action="{{ route('user.portfolio.store') }}" method="POST" class="w-100 ml-5" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Название">
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <div class="custom-file">
                <input name="image" type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Выбрать картинку</label>
            </div>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="text" class="form-control" id="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>


@endsection