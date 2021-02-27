@extends('groups.user.layouts.app')


@section('content')
    <div class="d-flex w-100 justify-content-between">


        <div class="">
           <div>
               <h2>Личные данные</h2>

               @if( $user->freelancer )
                   <h1>
                       Фрилансер
                   </h1>
               @else
                   <h1>
                       Заказчик
                   </h1>
               @endif


               @if(!is_null($user->image))
                   <div class="col-6">
                       <img class="w-100" src="/storage/{{ $user->image }}" alt="">
                   </div>
               @else
                   <div class="col-6">
                       <img class="w-100" src="/assets/static/images/noImage.jpg" alt="">
                   </div>
                   <form action="{{ route('user.index.uploadImage') }}" method="POST" enctype="multipart/form-data">
                       @csrf
                       <input type="file" name="image">
                       <button class="btn btn-info w-100">Upload</button>
                   </form>
               @endif


                  <div>
                      <label for="" class="col-4 px-0 d-flex align-items-center justify-content-between">
                          <span>Name</span>
                          <input type="text" value="{{ $user->name }}">
                      </label>


                      <label for="" class="col-4 px-0 d-flex align-items-center justify-content-between">
                          <span>Email</span>
                          <input type="text" value="{{ $user->email }}">
                      </label>
                  </div>

           </div>


            @includeWhen(count($user->categories), 'groups.user.pages.user.include.category')


        </div>




    </div>

@endsection

@section('footer')
{{--    <script>--}}
{{--       setTimeout(() => {--}}
{{--           const wrapper = document.querySelector('#category');--}}
{{--           const btn = wrapper.querySelector('#buttonCategory');--}}
{{--           const form = wrapper.querySelector('#formCategory');--}}

{{--           btn.addEventListener('click', () =>--}}
{{--           {--}}
{{--               form.classList.remove('d-none')--}}
{{--           })--}}
{{--       }, 100)--}}
{{--    </script>--}}
@endsection