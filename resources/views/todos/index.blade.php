<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/index.css')}}">

</head>
<body>
    <div class=todo>
    <div class="container" style="margin:400px 100px;">
    <div class="container" style="width:1000px;">
    <div class="container mt-3">
        <h1>Todo List</h1>
    </div>
    <div class="container mt-3">
        <div class="container mb-4">
            {!! Form::open(['route' => 'todos.store', 'method' => 'POST']) !!}
            {{ csrf_field() }}
                <div class="row">
                    {{ Form::text('newTodo', null, ['class' => 'form-control col-8 mr-5']) }}
                    {{ Form::submit('追加', ['class' => 'btn btn-primary']) }}
                </div>
            {!! Form::close() !!}
        </div>
        @if ($errors->has('newTodo'))
            <p class="alert alert-danger">{{ $errors->first('newTodo') }}</p>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="width: 60%">タスク名</th>
                    <th scope="col">作成日</th>
                    <th scope="col">更新</th>
                    <th scope="col">削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todos as $todo)
                    <tr>
                        {!! Form::open(['route' => ['todos.update', $todo->id], 'method' => 'POST']) !!}
                        <td>{{ Form::text('updateTodo', $todo->todo, ['class' => 'form-control col-7 mr-4']) }}</td>
                        <td>{{ $todo->created_at }}</td>
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <td>{{ Form::submit('更新', ['class' => 'btn btn-danger']) }}</td>
                        {!! Form::close() !!}
                        {!! Form::open(['route' => ['todos.destroy', $todo->id], 'method' => 'POST'])!!}
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <td>{{ Form::submit('削除', ['class' => 'btn btn-danger']) }}</td>
                        {!! Form::close() !!}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>

    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
</body>
</html>
