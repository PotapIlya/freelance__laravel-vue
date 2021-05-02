
<div class="skill">
        @foreach($categories as $category)
            <h3>
                {{ $category->name }}
            </h3>

            <div class="skill-content">
                @if(count($category->child))

                    @foreach($category->child as $child)
                        <span class="big-circle">{{ $child->name }}<span class="small-circle bg-white">45</span></span>
                    @endforeach

                @endif

            </div>
        @endforeach
</div>