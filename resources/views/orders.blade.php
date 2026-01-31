@include('header')

<div>

    <form action="{{route('order.store')}}" method="POST">
        @csrf
        <input type="text" name="title">
        <input type="date" name="date">
        <select name="buy_method">
            <option value="Наличными">Наличными</option>
            <option value="Переводом">Переводом</option>
        </select>
        <input name="user_id" type="hidden" value="{{auth()->id()}}">
        <button>Отправить</button>
    </form>
    <h1>Ваши заявки</h1>
    @foreach($orders as $order)

        <b>{{$order->title}}</b> <br>
        Дата начала: {{$order->date}} <br>
        Вид оплаты: {{$order->buy_method}} <br>
        Статус: {{$order->status}} <br>
        @if ($order->status == "Новая")
        <form action="{{route('order.update', $order->id)}}" method="POST">
            @csrf
            <input value="Обучение завершено" name="status" type="hidden" />
            <button>Пройти</button>
        </form>
        @endif
        @if ($order->status == "Обучение завершено")
        @if (!$order->comment)
            <form action="{{route('order.addComment')}}" method="POST">
                @csrf
                <input type="hidden" name="order_id" value="{{$order->id}}">
                <input type="hidden" name="user_id" value="{{auth()->id()}}">
                <textarea name="comment" required></textarea>
                <button>Оставить отзыв</button>
            </form>
        @else
            <p><b>Ваш отзыв:</b> {{ $order->comment->comment }}</p>
        @endif
        @endif
        <p />
    @endforeach
</div>
