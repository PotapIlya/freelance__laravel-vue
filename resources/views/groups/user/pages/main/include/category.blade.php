@if(count($categories))
    <div id="category">
        <h2>
            Категории
        </h2>


        <div class="mt-3">

            <ul style="list-style: none" class="pl-0">
                @foreach($categories as $category)
                    <li>
                        {{ $category->name }}

                        @if(count($category->child))
                            <ul>
                                @foreach($category->child as $child)
                                    <li class="d-flex align-items-center justify-content-between my-1">
                                        {{ $child->name }}

                                        @if( $user->categories->pluck('name')->search( $child->name ) !== false )
                                           <form action="{{ route('user.index.removeCategory', $child->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-danger">Remove</button>
                                            </form>
                                        @else
                                            <form action="{{ route('user.index.addCategory', $child->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-success">Add</button>
                                            </form>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>

        </div>

    </div>
@else
    <h2>Нету категорий в базе</h2>
@endif