@if(isset($user))
    <p style="color: #fff; margin: auto 10px">
        <a class="btn btn-outline-light my-2 my-sm-0" href="/userPage?id={{ $user->id }}">{{ $user->name }}</a>
    </p>
    <form action="/logout" method="get">
        @csrf
        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
    </form>
@else
    <li class="nav-item">
        <a class="nav-link" href="/register">Sign Up</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/login">Sign In</a>
    </li>
@endif
