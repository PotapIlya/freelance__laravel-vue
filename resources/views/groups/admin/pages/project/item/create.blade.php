@extends('pages.admin.layouts.app')

@section('breadcrumb')
    @component('pages.admin.base.component.breadcrumb')
        @slot('title') Новый товар @endslot
        @slot('products') Товары @endslot
    @endcomponent
@endsection

@section('content')

{{--    @dd($errors->all())--}}

    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf

        @include('pages.admin.crud.fields.text',
        [
            'name' => 'name',
            'label' => 'Название товара',
            'placeholder' => 'Название товара',
        ])


        @include('pages.admin.crud.buttons.create', ['submit' => true])

    </form>


@endsection