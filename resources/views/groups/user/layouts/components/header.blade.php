<header>
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h4>
                header
            </h4>

            <a href="{{ url('/logout') }}"
               onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
                ВЫЙТИ
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</header>