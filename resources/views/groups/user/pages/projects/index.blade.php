@extends('groups.user.layouts.app')


@section('content')

    <div class="col">


        @if(count($myProject))
            @dd($myProject)

        @endif


        @includeWhen(!Auth::user()->freelancer, 'groups.user.pages.projects.include.createProject')


        @if( count($projects) )

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">text</th>
                    <th scope="col">btn</th>
                </tr>
                </thead>
                <tbody>

                @foreach($projects as $project)

                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->text }}</td>
                        <td>
                            <a href="{{ route('user.projects.show', $project->url ) }}" class="btn btn-primary">SHOW</a>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>



        @endif


        </div>
@endsection