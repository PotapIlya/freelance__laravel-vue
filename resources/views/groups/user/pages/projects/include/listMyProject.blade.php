
<table class="table">
    <h2>
        Мои проекты
    </h2>
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">text</th>
        <th scope="col">btn</th>
    </tr>
    </thead>
    <tbody>

    @foreach($myProject as $project)

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