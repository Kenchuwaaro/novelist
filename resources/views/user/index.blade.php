
@extends('user/layout')
@section('content')

<body>
    <div class="container ops-main">
        <div class="row">
            <div class="col-md-12">
                <h3 class="ops-title">ユーザー一覧</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <table class="table text-center">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">名前</th>
                        <th class="text-center">メールアドレス</th>
                        <th class="text-center">パスワード</th>
                        <th class="text-center">削除</th>
                    </tr>

                    @foreach($users as $user)
                    <tr>
                        <td>
                            <a href="/user/{{ $user->id }}/edit">{{ $user->id }}</a>
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td>
                            <form action="/user/{{ $user->id }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div><a href="/user/create" class="btn btn-default">新規作成</a></div>
            </div>
        </div>
</body>

@endsection