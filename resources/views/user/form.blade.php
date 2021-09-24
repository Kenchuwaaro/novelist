<div class="container ops-main">
    <div class="row">
        <div class="col-md-6">
            <h2>書籍登録</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-1">

            @if($target == 'store')
            <form action="/user" method="post">
            @elseif($target == 'update')
            <form action="/user/{{ $user->id }}" method="post">
                    <!-- updateメソッドにはPUTメソッドがルーティングされているのでPUTにする -->
                    <input type="hidden" name="_method" value="PUT">
            @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="name">書籍名</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="price">メールアドレス</label>
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="author">パスワード</label>
                        <input type="text" class="form-control" name="password" value="{{ $user->password }}">
                    </div>
                    <button type="submit" class="btn btn-default">登録</button>
                    <a href="/user">戻る</a>
                </form>
        </div>
    </div>
</div>
