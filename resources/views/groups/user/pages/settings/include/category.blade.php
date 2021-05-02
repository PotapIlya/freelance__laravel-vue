<div class="ui-25">

    <div class="container-fluid">


        @foreach($categories as $category)
            <h2>{{ $category->name }}</h2>

            @if(count($category->child))
                <div class="row">
                    @foreach($category->child as $child)

                        <div data-id="{{ $child->id }}" class="col-md-4 col-sm-6 ui-item-element">

                            <div class="ui-item @if( $user->categories->pluck('name')->search( $child->name ) !== false) active @endif">
                                <h3>{{ $child->name }}</h3>
                            </div>

                            <div class="ui-icons @if( $user->categories->pluck('name')->search( $child->name ) !== false) visible @endif">
                                <a href="#" class="check bg-green"><i class="fa fa-check"></i></a>
                                <a href="#" class="cross bg-red"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        @endforeach



    </div>


   <form id="saveForm" action="{{ route('user.settings.category.store') }}" method="POST" class="d-flex justify-content-center">
       @csrf
       <button type="button" id="saveBtn" class="btn btn-success h2">Save</button>
       <input name="params" id="saveInput" type="text">
   </form>

</div>