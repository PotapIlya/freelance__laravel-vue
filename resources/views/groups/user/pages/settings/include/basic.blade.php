<form enctype="multipart/form-data" action="{{ route('user.settings.update', $user->id) }}" method="POST">

    @csrf
    @method('PATCH')
    <div class="d-flex justify-content-between">
        <div class="w-100">
            <div class="form-group">
                <label for="firstName">Имя</label>
                <input name="first_name" value="{{ $user->first_name ?? '' }}" type="text" class="form-control" id=firstName" placeholder="Ваше имя">
            </div>

            <div class="form-group">
                <label for="lastName">Фамилия</label>
                <input name="last_name" value="{{ $user->last_name ?? '' }}" type="text" class="form-control" id=lastName" placeholder="Ваша фамилия">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" value="{{ $user->email ?? '' }}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ваш email">
            </div>
        </div>

        <div class="col-4">
            @if(is_null($user->image))
                <div>
                    <img class="w-100" src="/assets/user/static/images/noImage.jpg" alt="">
                </div>
            @else
                <img class="w-100" src="/storage/{{ $user->image }}" alt="">
            @endif
                <div class="custom-file">
                    <input name="image" type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Выбрать картинку</label>
                </div>
        </div>
    </div>


    <button type="submit" class="btn btn-primary">Обновить</button>
</form>