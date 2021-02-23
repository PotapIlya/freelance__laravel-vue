@extends('groups.admin.layouts.app')


@section('breadcrumb')
    @component('groups.admin.base.component.breadcrumb')
        @slot('title') Пользователь {{ $user->name }}@endslot
        @slot('users') Пользователи @endslot
    @endcomponent
@endsection

@section('content')


        <div class="d-flex flex-column">
           <span>
                {{ $user->role->name }}
           </span>
            <span>
                {{ $user->name }}
            </span>
            <span>
                {{ $user->email }}
            </span>


{{--            @if( count($user->images) )--}}
{{--                <div>--}}
{{--                    <h5>Картинки</h5>--}}
{{--                    <div class="row align-items-center">--}}
{{--                        @foreach($user->images as $image)--}}
{{--                            <div class="col-3">--}}
{{--                                <a href="{{ route('admin.project.show', $image->id) }}">--}}
{{--                                    <img class="w-100" src="/storage/{{ $image->link }}" alt="">--}}
{{--                                </a>--}}
{{--                                @include('groups.admin.crud.buttons.destroy', ['route' => route('admin.project.destroy', $image->id)])--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}

            <div class="mt-3">
                @include('groups.admin.crud.buttons.edit', ['route' =>  route('admin.users.edit', $user->id)])
                @include('groups.admin.crud.buttons.destroy', ['route' =>  route('admin.users.destroy', $user->id)])
            </div>

        </div>







@endsection