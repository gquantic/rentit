@extends('templates.main')

@section('content')
    <div class="product-page">
        <div class="product-image">
            <img src="/uploads/products/{{ $product->images[0] }}" alt="">
        </div>
        <h1>{{ $product->title }}</h1>
        <p class="description">{{ $product->description }}</p>
        <div class="buttons-shop">
            <button class="btn btn-primary">Заказать</button>
            <button class="btn btn-vip">Написать сообщение</button>
        </div>
        <div class="block-title">Арендодатель</div>
        @include('components.blocks.user-profile-block', ['user' => $product->user])
    </div>
@endsection
