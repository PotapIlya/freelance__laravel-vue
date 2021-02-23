@extends('groups.admin.layouts.app')

@section('breadcrumb')
    @component('groups.admin.base.component.breadcrumb')
        @slot('title') Пользователи@endslot
        @slot('parent') Главная @endslot
    @endcomponent
@endsection

@section('content')

        @if( count($users) )
        <!-- Main content -->

                    <div class="col-12">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Role</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created at</th>
                                        <th>btn</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->role->name }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-around align-items-center">
                                                        @include('groups.admin.crud.buttons.show', ['route' => route('admin.users.show', $user->id)])
                                                        @include('groups.admin.crud.buttons.edit', ['route' => route('admin.users.edit', $user->id)])
                                                        @include('groups.admin.crud.buttons.destroy', ['route' =>  route('admin.users.destroy', $user->id)])
                                                    </div>
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

    @endif

{{--        {{ $users->links() }}--}}

@endsection