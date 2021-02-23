@if(count($categories))
    <div id="category">
        <h2>
            Категории
        </h2>


        <button id="buttonCategory" class="btn btn-primary">Добавить</button>

        <div class="mt-3 d-none" id="formCategory">

            <ul style="list-style: none" class="pl-0">
                @foreach($categories as $category)
                    <li>
                        {{ $category->name }}

                        @if(count($category->child))
                            <ul>
                                @foreach($category->child as $child)
                                    <li class="d-flex align-items-center justify-content-between my-1">
                                        {{ $child->name }}
                                        <form action="{{ route('user.index.addCategory', $child->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-success">Add</button>
                                        </form>
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