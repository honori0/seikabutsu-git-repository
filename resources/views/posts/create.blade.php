<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>複数アカウントを持ちやすいSNS</title>
    </head>
    <body>
        <h1>複数アカウントを持ちやすいSNS</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="body">
                <h2>新規投稿</h2>
                <textarea name="post[body]" placeholder="入力してください。">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <div class="category">
                <h3>Category</h3>
                    <select name="post[category_id]">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>