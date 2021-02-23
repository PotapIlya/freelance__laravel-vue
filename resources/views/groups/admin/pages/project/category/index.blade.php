@extends('groups.admin.layouts.app')


@section('breadcrumb')
    @component('groups.admin.base.component.breadcrumb')
        @slot('title') Категории @endslot
    @endcomponent
@endsection

@section('content')



        <!-- Main content -->
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="pb-2">
                            @include('groups.admin.crud.buttons.create', ['route' => route('admin.categories.create')])
                        </div>
                        @if( count($categories) )

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Parent</th>
                                <th>Name</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->parent_id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <div class="d-flex justify-content-around align-items-center">
                                            @include('groups.admin.crud.buttons.edit', ['route' => route('admin.categories.edit', $category->id )])
                                            @include('groups.admin.crud.buttons.destroy', ['route' => route('admin.categories.destroy', $category->id )])
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </section>


    {{--        {{ $users->links() }}--}}
    <!-- /.content -->


@endsection