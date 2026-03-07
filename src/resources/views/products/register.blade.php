@extends('layouts.app')

@section('content')

<div class="container">

    <p>
        <a href="{{ route('products.index') }}">商品一覧</a>
        ＞ 商品登録
    </p>


    <div class="detail-area">

        <div class="detail-image">

            <img id="preview" src="{{ asset('images/noimage.png') }}" alt="">

            <input type="file" name="image" form="register-form">

        </div>


        <div class="detail-form">

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" id="register-form">

                @csrf

                <div>
                    <label>商品名</label>
                    <input type="text" name="name">
                </div>


                <div>
                    <label>価格</label>
                    <input type="text" name="price">
                </div>


                <div>
                    <label>季節</label>

                    <div>

                        <label>
                            <input type="radio" name="season" value="春">
                            春
                        </label>

                        <label>
                            <input type="radio" name="season" value="夏">
                            夏
                        </label>

                        <label>
                            <input type="radio" name="season" value="秋">
                            秋
                        </label>

                        <label>
                            <input type="radio" name="season" value="冬">
                            冬
                        </label>

                    </div>

                </div>


                <div>
                    <label>商品説明</label>

                    <textarea name="description" rows="5"></textarea>

                </div>


                <div class="button-area">

                    <a href="{{ route('products.index') }}">
                        戻る
                    </a>

                    <button type="submit">
                        登録
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection