@extends('layouts.app')

@section('content')

<div class="container">
     <h2>商品登録</h2>

        <div class="detail-form">

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" id="register-form">

                @csrf

                <div>
                    <label>商品名
                    <span class="required">必須</span>
                    </lavel>
                    <input type="text" name="name">
                    @error('name')
                      <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label>価格
                    <span class="required">必須</span>
                    </label>
                    <input type="text" name="price">

                    @error('price')
                      <p class="error">{{ $message }}</p>
                    @enderror

                </div>

                <div>
                    <label>商品画像
                    <span class="required">必須</span>
                    </label>
                    <input type="file" name="image">

                    @error('file')
                      <p class="error">{{ $message }}</p>
                    @enderror

                </div>

                <div>
                    <label>季節
                    <span class="required">必須</span>
                    </label>

                    <div>
                        <label>
                           <input type="radio" name="season" value="spring" {{ old('season') == 'spring' ? 'checked' : '' }}>
                            春
                        </label>

                        <label>
                            <input type="radio" name="season" value="summer" {{ old('season') == 'summer' ? 'checked' : '' }}>
                             夏
                        </label>

                        <label>
                            <input type="radio" name="season" value="autumn" {{ old('season') == 'autumn' ? 'checked' : '' }}>
                            秋
                        </label>

                        <label>
                            <input type="radio" name="season" value="winter" {{ old('season') == 'winter' ? 'checked' : '' }}>
                            冬
                        </label>
                    </div>

                </div>

                <div>
                    <label>商品説明
                    <span class="form__label--required">必須</span>
                    </label>
                    <textarea name="description" rows="5"></textarea>
                     
                    @error('description')
                      <p class="error">{{ $message }}</p>
                    @enderror

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