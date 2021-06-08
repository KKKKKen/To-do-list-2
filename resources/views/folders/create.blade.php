<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">

    <!-- <link rel="stylesheet" href="/css/style.css"> -->
</head>
<body>

<header>
<nav class="my-navbar">
<a class="my-navbar-brand" href="/">ToDo App</a>フォルダ作成機能 71
</nav>
</header>
<main>
<div class="container">
<div class="row">
<div class="col col-md-offset-3 col-md-6">
<nav class="panel panel-default">
<div class="panel-heading"> フォルダを追加する </div>
<div class="panel-body">

<div class="panel-body">
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>
@endif

</div>

<form action="{{ route('folders.store') }}" method="post">
@csrf
<div class="form-group">
<label for="title"> フォルダ名 </label>
<input type="text" class="form-control" name="title" id="title" 
value="{{ old('title') }}">
</div>
<div class="text-right">
<button type="submit" class="btn btn-primary"> 送信 </button>
</div>
</form>
</div>
</nav>
</div>
</div>
</div>
</main>
    
</body>
</html>