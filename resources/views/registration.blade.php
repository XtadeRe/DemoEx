@include('header')

<div>
    <form action="{{route('registration.store')}}" method="POST">
        @csrf
        <input name="login" type="text" placeholder="login"/>
        <input name="password" type="password" placeholder="password"/>
        <input name="phone" type="tel" placeholder="phone">
        <input name="email" type="email" placeholder="email"/>
        <button>Регистрация</button>
        <a href="{{route('login.index')}}">У меня есть аккаунт</a>
    </form>
</div>
