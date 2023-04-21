{{$message ?? ''}}
<form action="{{ route('login') }}" method="post">
    @csrf
    <input type="text" name="email" value="admin@au.com"><br>
    <input type="password" name="password" value="admin"><br>
    <input type="submit" autofocus>
</form>
@auth
<a href="{{ route('logout') }}">Logout</a>
@endauth


<form action="{{ route('login') }}" method="post">
    @csrf
    <input type="text" name="email" value="{{$email}}"><br>
    <input type="password" name="password" value="password"><br>
    <input type="submit" autofocus>
</form>