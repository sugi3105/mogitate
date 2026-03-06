@extends('layouts.app')

@section('content')

<div class="container">

    <form method="GET" action="{{ route('products.index') }}">
        <div class="search-area">
            <input type="text"
                   name="keyword"
                   value="{{ request('keyword') }}"
                   class="search-input"
                   placeholder="商品名で検索">

            <select name="sort" class="sort-select">
                <option value="">価格順で表示</option>
                <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>
                    価格が安い順
                </option>
                <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>
                    価格が高い順
                </option>
            </select>

            <button type="submit" class="search-btn">検索</button>
        </div>
    </form>

    <div class="products">
        @foreach ($products as $product)
            <div class="product-card">
                <img src="{{ asset('images/fruits-img/' . $product->image) }}" 
                     class="product-img"
                     alt="{{ $product->name }}">
                    

                <h3 class="product-name">{{ $product->name }}</h3>

                <p class="product-price">¥{{ number_format($product->price) }}</p>
            </div>
        @endforeach
    </div>

    <div class="pagination">
        {{ $products->appends(request()->query())->links() }}
    </div>

</div>

@endsection