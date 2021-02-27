
<div>
    <h3>
        Создать заказ
    </h3>
    <form method="POST" action="{{ route('user.projects.store') }}" id="createProject" class="d-flex flex-column col-4 px-0">
        @csrf
        <input id="inputTitle" type="text" placeholder="Заголовок" name="title">
        <input id="inputUrl" type="hidden" placeholder="url" name="url">
        <textarea placeholder="Текст" name="text" id="" cols="30" rows="10"></textarea>
        <button type="submit">Отправить</button>
    </form>
</div>

