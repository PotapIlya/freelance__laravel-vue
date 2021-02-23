@extends('groups.admin.layouts.app')


@section('breadcrumb')
    @component('groups.admin.base.component.breadcrumb')
        @slot('title') Новая категория @endslot
        @slot('categories') Категории @endslot
    @endcomponent
@endsection



@section('content')

    <form action="{{ route('admin.categories.store') }}" method="POST">

        @csrf

        @if(count($categories))
        <label for="">
            Родитель
            <select name="parent_id" id="">
                <option value="0">Родитель</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </label>
        @endif

        @include('groups.admin.crud.fields.text',
        [
            'name' => 'name',
            'label' => 'Название категории',
            'placeholder' => 'Название категории',
        ])


        @include('groups.admin.crud.buttons.create', ['submit' => true])


    </form>

@endsection