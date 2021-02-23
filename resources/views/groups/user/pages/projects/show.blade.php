@extends('layouts.app')

@section('content')

    <section>
        <div class="container">

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

            @if($project->responses)

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
                                <td>{{ $response->user->name }}</td>
                                <td>{{ $response->text }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @endif

        </div>
    </section>

@endsection

@section('footer')
    <script>
        const showBtn = document.querySelector('#showBtn');
        const showForm = document.querySelector('#showForm');

        showBtn.addEventListener('click', () => {
            showForm.classList.remove('d-none');
        })

        //
        // const title = document.querySelector('#exampleInputEmail1');
        // const url = document.querySelector('#url');
        // title.addEventListener('input', () => {
        //     url.value = title.value.split(' ').join('_');
        // });

    </script>
@endsection