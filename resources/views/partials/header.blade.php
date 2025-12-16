<header class="header-role">
    <div class="header-left">
        <strong>{{ $title ?? 'Dashboard' }}</strong><br>
        <small>RSHP UNAIR</small>
    </div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn-danger">Logout</button>
    </form>
</header>