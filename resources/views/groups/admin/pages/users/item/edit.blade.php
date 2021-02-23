@extends('groups.admin.layouts.app')


@section('breadcrumb')
    @component('groups.admin.base.component.breadcrumb')
        @slot('title') Пользователь {{ $user->name }}@endslot
        @slot('users') Пользователи @endslot
    @endcomponent
@endsection

@section('content')

        <form action="{{ route('admin.users.update', $user->id) }}" class="col-4" method="POST">
            @csrf
            @method('PATCH')

            @include('groups.admin.crud.fields.selectFromArray',
            [
                'name' => 'role_id',
                'value' => $user->role->id,
                'label' => 'Select role',
                'array' => $roles,
                'arrayShow' => 'name'
            ])

            @include('groups.admin.crud.fields.text',
            [
                'name' => 'name',
                'value' => $user->name,
                'label' => 'You name',
                'placeholder' => 'Name',
            ])

            @include('groups.admin.crud.fields.email',
            [
                'name' => 'email',
                'value' => $user->email,
                'label' => 'Email',
                'placeholder' => 'Email',
            ])

            @include('groups.admin.crud.buttons.update')


        </form>




@endsection