@extends('layouts.app')

@section('content')

<div class="detail-container">

    <p class="breadcrumb">
        <a href="{{ route('products.index') }}">商品一覧</a> ＞ {{ $product->name }}
    </p>

        <div class="detail-area">

         <div class="detail-image">

       <img id="preview"
       src="{{ asset('images/fruits-img/' . $product->image) }}"
       alt="">

       <input type="file" name="image" form="update-form">

    </div>

    <div class="detail-form">

            <form action="{{ route('products.update') }}" method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $product->id }}">

                <div class="form-group">
                    <label>商品名</label>
                    <input type="text" name="name" value="{{ $product->name }}">
                    @error('name')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>値段</label>
                    <input type="text" name="price" value="{{ $product->price }}">
                    @error('price')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>


                <div class="form-group">
                    <label>季節</label>

                    <div class="season-area">

                        <label>
                            <input type="radio" name="season" value="1" {{ $product->season == '1' ? 'checked' : '' }}>
                            春
                        </label>

                        <label>
                            <input type="radio" name="season" value="2" {{ $product->season == '2' ? 'checked' : '' }}>  
                            夏
                        </label>

                        <label>
                            <input type="radio" name="season" value="3" {{ $product->season == '3' ? 'checked' : '' }}>  
                            秋
                        </label>

                        <label>
                            <input type="radio" name="season" value="4" {{ $product->season == '4' ? 'checked' : '' }}>    
                            冬
                        </label>
                        @error('season')
                        <p class="error">{{ $message }}</p>
                        @enderror

                      </div>
                    </div>
                <div class="form-group">
                    <label>商品説明</label>

                    <textarea name="description" rows="5">
                      {{ $product->description }}
                    </textarea>
                    @error('description')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>


                <div class="button-area">

                    <a href="{{ route('products.index') }}" class="back-btn">
                        戻る
                    </a>

                    <button type="submit" class="save-btn">
                        変更を保存
                    </button>
                </div>

            </form>


            <form action="{{ route('products.delete') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">

                <button class="delete-btn">
                    🗑
                </button>

            </form>

        </div>

    </div>

</div>

@endsection