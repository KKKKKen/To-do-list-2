@extends('layout')

@section('content')
<div class="container">
<div class="row">
<div class="col col-md-offset-3 col-md-6">
<nav class="panel panel-default">
<div class="panel-heading"> フォルダを編集する </div>
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

<form action="{{ route('folders.update', ['id' => $folder->id]) }}" method="post">
@csrf
<div class="form-group">
<label for="title"> フォルダ名 </label>
<input type="text" class="form-control" name="title" id="title" 
value="{{ old('title', $folder->title ) }}">
<!-- ↑編集必要 -->
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
@endsection