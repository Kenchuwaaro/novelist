
@extends('novel/layout')
@section('content')

<body>
    <div class="container ops-main">
        <div class="row">
            <div class="col-md-12">
                <h3 class="ops-title">小説一覧</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <table class="table text-center">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">タイトル</th>
                        <th class="text-center">著者ID</th>
                        <th class="text-center">削除</th>
                    </tr>

                    @foreach($novels as $novel)
                    <tr>
                        <td>
                            <a href="/novel/{{ $novel->id }}/edit">{{ $novel->id }}</a>
                        </td>
                        <td>{{ $novel->title}}</td>
                        <td>{{ $novel->user_id }}</td>
                        <td>
                            <form action="/novel/{{ $novel->id }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div><a href="/novel/create" class="btn btn-default">新規作成</a></div>
            </div>
        </div>
</body>

@endsection