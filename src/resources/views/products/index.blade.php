@extends('layouts.app')

@section('content')

<div class="container">

    <div class="top-area">

        <h1>商品一覧</h1>

        <a href="{{ route('products.register') }}" class="add-btn">
            ＋ 商品を追加
        </a>

    </div>


    <form method="GET" action="{{ route('products.search') }}">

        <div class="search-area">

            <input
                type="text"
                name="keyword"
                value="{{ request('keyword') }}"
                placeholder="商品名で検索"
            >

            <select name="sort">

                <option value="">価格順で表示</option>

                <option value="desc"
                    {{ request('sort') == 'desc' ? 'selected' : '' }}>
                    価格が高い順
                </option>

                <option value="asc"
                    {{ request('sort') == 'asc' ? 'selected' : '' }}>
                    価格が低い順
                </option>

            </select>

            <button type="submit">
                検索
            </button>

        </div>

    </form>


    {{-- 商品一覧 --}}
    <div class="products">

        @foreach ($products as $product)

        <a href="{{ route('products.show',$product->id) }}">

            <div class="product-card">

                <img
                    src="{{ asset('images/fruits-img/' . $product->image) }}"
                    alt=""
                >

                <h3>{{ $product->name }}</h3>

                <p>¥{{ number_format($product->price) }}</p>

            </div>

        </a>

        @endforeach

    </div>


    <div class="pagination">

        {{ $products->appends(request()->query())->links() }}

    </div>

</div>

@endsection