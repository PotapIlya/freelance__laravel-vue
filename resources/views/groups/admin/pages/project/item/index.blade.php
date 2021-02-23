@extends('groups.admin.layouts.app')


@section('breadcrumb')
    @component('groups.admin.base.component.breadcrumb')
        @slot('title') Проекты @endslot
    @endcomponent
@endsection

@section('content')


    @if( count($projects) )
        <!-- Main content -->
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="pb-2">
{{--                            @include('pages.admin.crud.buttons.create', ['route' => route('admin.products.create')])--}}
                        </div>

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>User</th>
                                <th>Title</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td><a href="{{ route('admin.users.show', $project->user->id) }}">{{ $project->user->name }}</a></td>
                                    <td>{{ $project->title }}</td>
                                    <td class="d-flex justify-content-around">

                                        @include('groups.admin.crud.buttons.show', ['route' => route('admin.project.show', $project->id )])
{{--                                        @include('groups.admin.crud.buttons.edit', ['route' => route('admin.project.edit', $image->id )])--}}
                                        @include('groups.admin.crud.buttons.destroy', ['route' => route('admin.project.destroy', $project->id )])
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </section>
    @endif

    {{--        {{ $users->links() }}--}}
    <!-- /.content -->


@endsection