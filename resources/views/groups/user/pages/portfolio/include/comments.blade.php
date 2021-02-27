<ul class="media-list p-0 mt-3">

    @foreach($item->comments as $comment)
        <li class="media">
            <div class="media-left">
                <a href="{{ route('user.index.user', $comment->user->name) }}"
                   class="d-block pr-2">

                    @if(!is_null($comment->user->image))
                        <div style="width: 50px; height: 50px">
                            <img style="border-radius: 50%" class="media-object img-rounded w-100" src="/storage/{{ $comment->user->image }}" alt="">
                        </div>
                    @else
                        <div class="col-6">
                            <img class="media-object img-rounded" src="/assets/static/images/noImage.jpg" alt="">
                        </div>
                    @endif
                </a>
            </div>
            <div class="media-body">
                <a href="{{ route('user.index.user', $comment->user->name) }}" class="media-heading">
                    <div class="author">{{ $comment->user->name }}</div>
                    <div class="metadata">
                                    <span class="date">
                                        {{ $comment->created_at->format('d m Y') }}
                                    </span>
                    </div>
                </a>
                <div class="media-text text-justify">
                    {{ $comment->text }}
                </div>

            </div>

        </li>
    @endforeach
</ul>