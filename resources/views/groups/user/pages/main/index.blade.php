@extends('groups.user.layouts.app')


@section('content')
    <div class="d-flex w-100 justify-content-between">


        <div class="">
           <div>
               <h2>Личные данные</h2>

               @if( Auth::user()->freelancer )
                   <h1>
                       Фрилансер
                   </h1>
               @else
                   <h1>
                       Заказчик
                   </h1>
               @endif


               <form action="" class="d-flex flex-column">

                   <label for="" class="d-flex align-items-center justify-content-between">
                       <span>Name</span>
                       <input type="text" value="{{ $user->name }}">
                   </label>


                   <label for="" class="d-flex align-items-center justify-content-between">
                       <span>Email</span>
                       <input type="text" value="{{ $user->email }}">
                   </label>

               </form>
           </div>

            @includeWhen(count($categories), 'groups.user.pages.main.include.category')


        </div>

        <div>
            <h2>
                Сменить пароль
            </h2>


            <form method="POST" action="{{ route('user.index.updatePassword', $user->id) }}" class="d-flex flex-column">
                @csrf
                <label for="" class="d-flex align-items-center justify-content-between">
                    <span class="mr-4">Старый пароль</span>
                    <input type="text" name="oldPassword">
                </label>


                <label for="" class="d-flex align-items-center justify-content-between">
                    <span class="mr-4">Новый пароль</span>
                    <input type="text" name="password">
                </label>

                <label for="" class="d-flex align-items-center justify-content-between">
                    <span class="mr-4">Повторите <br/> новый пароль</span>
                    <input type="text" name="password_confirmation">
                </label>

                <button class="btn btn-success" type="submit">Обновить</button>

            </form>

        </div>


    </div>

@endsection

@section('footer')
    <script>
       setTimeout(() => {
           const wrapper = document.querySelector('#category');
           const btn = wrapper.querySelector('#buttonCategory');
           const form = wrapper.querySelector('#formCategory');

           btn.addEventListener('click', () =>
           {
               form.classList.remove('d-none')
           })
       }, 100)
    </script>
@endsection