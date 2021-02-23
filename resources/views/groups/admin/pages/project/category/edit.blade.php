@extends('groups.admin.layouts.app')


@section('breadcrumb')
    @component('groups.admin.base.component.breadcrumb')
        @slot('title') Новая категория @endslot
        @slot('categories') Категории @endslot
    @endcomponent
@endsection



@section('content')

      <div class="d-flex flex-column">
          @if(count($category->child))
              <div>
                <span>
                Дети
            </span>

                  <div>
                      @foreach($category->child as $child)
                          <div class="d-flex justify-content-between">
                              <h5>
                                  {{ $child->name }}
                              </h5>
                              <div class="ml-5">
                                  @include('groups.admin.crud.buttons.destroy', ['route' => route('admin.categories.destroy', $child->id )])
                              </div>
                          </div>
                      @endforeach
                  </div>
              </div>

          @endif

          <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="d-flex flex-column">
              @csrf
              @method('PATCH')

              @include('groups.admin.crud.fields.text',
              [
                  'name' => 'name',
                  'label' => 'Название категории',
                  'placeholder' => 'Название категории',

                  'value' => $category->name
              ])

              <div class="d-block">
                  @include('groups.admin.crud.buttons.update')
              </div>


          </form>
      </div>

@endsection