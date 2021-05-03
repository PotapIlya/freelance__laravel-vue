@extends('groups.user.layouts.app')


@section('header')
    <style>
        .media-body .author {
            display: inline-block;
            font-size: 1rem;
            color: #000;
            font-weight: 700;
        }
        .media-body .metadata {
            display: inline-block;
            margin-left: .5rem;
            color: #777;
            font-size: .8125rem;
        }
        .footer-comment {
            color: #777;
        }
        .vote.plus:hover {
            color: green;
        }
        .vote.minus:hover {
            color: red;
        }
        .vote {
            cursor: pointer;
        }
        .comment-reply a {
            color: #777;
        }
        .comment-reply a:hover, .comment-reply a:focus {
            color: #000;
            text-decoration: none;
        }
        .devide {
            padding: 0px 4px;
            font-size: 0.9em;
        }
        .media-text {
            margin-bottom: 0.25rem;
        }
        .title-comments {
            font-size: 1.4rem;
            font-weight: bold;
            line-height: 1.5rem;
            color: rgba(0, 0, 0, .87);
            margin-bottom: 1rem;
            padding-bottom: .25rem;
            border-bottom: 1px solid rgba(34, 36, 38, .15);
        }
    </style>
@endsection

@section('content')

    <div class="w-100 d-flex justify-content-between">


        <div class="col-8 d-flex">

            <img class="mw-100" src="/storage/{{ $item->path }}" alt="">
            
        </div>


        <div class="col-4">


            <!-- Bootstrap 3 -->
            <div class="comments">
                <h3 class="title-comments">Комментарии ({{ count($item->comments) }})</h3>


                @if( $item->user_id !== Auth::id() )

                    <form action="{{ route('user.portfolio.comments.store', $item->id) }}" method="POST">
                        @csrf
                        <textarea name="text" class="w-100 h-50" style="resize: none"></textarea>
                        <button class="btn btn-info">Send</button>
                    </form>

                @endif


                @includeWhen(count($item->comments), 'groups.user.pages.portfolio.include.comments')

            </div>

        </div>
        
        
    </div>

@endsection