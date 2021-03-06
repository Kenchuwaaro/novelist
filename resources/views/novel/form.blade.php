<div class="container ops-main">
    <div class="row">
        <div class="col-md-6">
            <h2>書籍登録</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-1">

            @if($target == 'store')
            <form action="/novel" method="post">
            @elseif($target == 'update')
            <form action="/novel/{{ $novel->id }}" method="post">
                    <input type="hidden" name="_method" value="PUT">
            @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="title">タイトル</label>
                        <input type="text" class="form-control" name="title" value="{{ $novel->title }}">
                    </div>
                    <div class="form-group">
                        <label for="user_id">タイトル</label>
                        <select name="user_id" class="form-select form-select-lg mb-3">

                            @foreach( $users as $user )
                                @if ( $user->id == $novel->user_id )
                                    <option selected value={{ $user->id }}>{{ $user->name}}</option>
                                @else
                                    <option value={{ $user->id }}>{{ $user->name}}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">登録</button>
                    <a href="/novel">戻る</a>
                </form>
        </div>
    </div>
</div>
