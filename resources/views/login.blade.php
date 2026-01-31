@include('header')

<div>
    <form action="{{route('login.store')}}" method="POST">
        @csrf
        <input type="text" name="login">
        <input type="password" name="password">
        <button>Войти в аккаунт</button>
    </form>
</div>
