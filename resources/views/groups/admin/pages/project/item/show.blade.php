@extends('groups.admin.layouts.app')

@section('breadcrumb')
    @component('groups.admin.base.component.breadcrumb')
        @slot('title') Проект № {{ $project->id }} @endslot
        @slot('project') Проекты @endslot
    @endcomponent
@endsection

@section('content')

   <div class="d-flex flex-column w-100">


        <h2>
           NAME : <a href="{{ route('admin.users.show', $project->user->id) }}">{{ $project->user->name }}</a>
       </h2>
       <h4>
           TITLE_ {{ $project->title }}
       </h4>


       @if($project->responses)

           <h3>ОТКЛИКИ</h3>
           <table class="table">
               <thead>
               <tr>
                   <th scope="col">USER</th>
                   <th scope="col">Text</th>
                   <th scope="col">Text</th>
               </tr>
               </thead>
               <tbody>

               @foreach($project->responses as $response)
                   <tr>
                       <td><a href="{{ route('admin.users.show', $response->user->id) }}">{{ $response->user->name }}</a></td>
                       <td>{{ $response->text }}</td>
                       <td>@include('groups.admin.crud.buttons.destroy', ['route' => route('admin.response.destroy', $response->id)])</td>
                   </tr>
               @endforeach

               </tbody>
           </table>
       @endif


       {{--       @if(count($image->category))--}}
{{--           <h3>--}}
{{--               Категории--}}
{{--           </h3>--}}

{{--           @foreach($image->category as $category)--}}
{{--               <span>{{ $category->name }}</span>--}}
{{--           @endforeach--}}

{{--       @endif--}}


{{--       @if (count($image->comments))--}}
{{--       <div class="d-block">--}}
{{--           <h3>--}}
{{--               COMMENTS--}}
{{--           </h3>--}}
{{--               <ul>--}}
{{--                   @foreach($image->comments as $comment)--}}
{{--                       <li>--}}
{{--                           <h6>--}}
{{--                               PERSONE:--}}
{{--                               <a href="{{ route('admin.users.show', $comment->user->id) }}">{{ $comment->user->name }}</a>--}}
{{--                           </h6>--}}

{{--                           <p>--}}
{{--                               TEXT:--}}
{{--                               {{ $comment->text }}--}}
{{--                               @include('groups.admin.crud.buttons.destroy', ['route' => route('admin.comments.destroy', $comment->id)])--}}
{{--                           </p>--}}
{{--                       </li>--}}
{{--                   @endforeach--}}
{{--               </ul>--}}
{{--       </div>--}}
{{--       @endif--}}

{{--       @include('groups.admin.crud.buttons.edit', ['route' => route('admin.project.edit', $image->id )])--}}

   </div>


@endsection