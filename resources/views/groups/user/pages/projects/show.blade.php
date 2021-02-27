@extends('groups.user.layouts.app')

@section('content')

    <div class="w-100">

        <div class="d-block">
            <h3>
                {{ $project->title }}
            </h3>
            <textarea name="" readonly id="" cols="30" rows="10">
                    {{ $project->text }}
                </textarea>
        </div>


        @if( Auth::user()->freelancer )
            <button class="btn btn-success" id="showBtn">Оставить отклик</button>

            <div id="showForm" class="d-none mt-3">
                <form method="POST" action="{{ '/my/project/create/' . $project->id }}">
                    @csrf

                    <div class="form-group">
                        <textarea name="text" class="form-control" id="exampleInputPassword1" placeholder="text"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        @endif

        @if(count($project->responses))

            <h3>ОТКЛИКИ</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">USER</th>
                    <th scope="col">Text</th>
                </tr>
                </thead>
                <tbody>

                @foreach($project->responses as $response)
                    <tr>
                        <td>
                            <a href="{{ route('user.index.user', $response->user->name) }}">
                                {{ $response->user->name }}
                            </a>
                        </td>
                        <td>{{ $response->text }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @endif
    </div>


@endsection

@section('footer')
    <script>
     setTimeout(() =>
     {
         if (document.querySelector('#showBtn'))
         {
             const showBtn = document.querySelector('#showBtn');
             const showForm = document.querySelector('#showForm');

             console.log(showBtn)

             showBtn.addEventListener('click', () => {
                 showForm.classList.remove('d-none');
             })
         }
     }, 100)


        //
        // const title = document.querySelector('#exampleInputEmail1');
        // const url = document.querySelector('#url');
        // title.addEventListener('input', () => {
        //     url.value = title.value.split(' ').join('_');
        // });

    </script>
@endsection