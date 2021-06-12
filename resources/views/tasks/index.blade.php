@extends("layout")


@section('content')
<div class="container">
<div class="row">
<div class="col col-md-4">
<nav class="panel panel-default">
<div class="panel-heading"> フォルダ </div>
<div class="panel-body">
<a href="{{ route('folders.create') }}" class="btn btn-default btn-block">
フォルダを追加する
</a>
</div>
<div class="list-group">

<table class="table">
<thead>
<th>フォルダ名</th>
<th></th>
</thead>

<tbody>
@foreach($folders as $folder)
<tr>
<td>
<a href="{{ route('tasks.index', ['id' => $folder->id]) }}" 
    class="list-group-item 
    {{ $current_folder_id == $folder->id ? 'active' : '' }}">
{{ $folder->title }}
</a>
</td>

<td>
<a style="display:block" href="{{ route('folders.edit', ['id' => $folder->id]) }}"> 編集 </a>

<!-- フォルダを削除↓ -->
<!-- <a href="{{ route('folders.destroy', ['id' => $folder->id]) }}"> 削除 </a> -->
<!-- フォルダの削除↑ -->

<form 
action="{{ route('folders.destroy', ['id' => $folder->id]) }}"
method="post"
id="delete_{{ $folder->id }}"
>
@csrf
<a href="#" 
data-id="{{ $folder->id }}"
onclick="deletePost(this);"
>削除</a>
<!-- <input type="submit" onclick="return confirm('ok')"> -->
</form>


<!-- <form method="post" 
action="{{ route('folders.destroy', ['id' => $folder->id]) }}"
id="delete_{{ $folder->id }} ">
@method('DELETE')
@csrf
 deletePost(thisかっことじ; 
<a  type="submit" data-id="$folder->id" onclick="confirm('oK?')">
削除する
</a>
</form> 
-->

</td>
</tr>
@endforeach

</tbody>
 </table>

</div>
</nav>
</div>
<div class="column col-md-8">

<div class="panel panel-default">
<div class="panel-heading"> タスク </div>
<div class="panel-body">
<div class="text-right">

<a
href="{{ route('tasks.create', ['id' => $current_folder_id]) }}"
class="btn btn-default btn-block"
>
<!-- <a href="{{ route('tasks.create', ['id' => $current_folder_id]) }}" 
    class="btn btn-default btn-block"> -->
タスクを追加する
</a>
<p>{{ $current_folder_id }}</p>
</div>
</div>
 <table class="table">
 <thead>
 <tr>
 <th> タイトル </th>
 <th> 状態 </th>
 <th> 期限 </th>
 <th></th>
 <th></th>

 </tr>
 </thead>
 <tbody>
 @foreach($tasks as $task)
 <tr>
 <td>{{ $task->title }}</td>
 <td>
 <span class="label">{{ $task->status }}</span>
 </td>
 <td>{{ $task->formatted_due_date }}</td>

 <td>
 <a href="{{ route('tasks.edit', ['id' =>$task->folder_id , 'task_id' => $task->id]) }}"> 編集 
 </a>
 </td>
 <td>
 <!-- タスクを削除↓ formタグを使うには？-->
 
 <!-- <form action="{{ route('tasks.edit', ['id'=>$task->folder_id, 'task_id'=>$task->id]) }}">
 @csrf
 
 </form> -->

 <a href="{{ route('tasks.edit', ['id' =>$task->folder_id , 'task_id' => $task->id]) }}"> 削除
 </a>
 <!-- タスクを削除↑ -->
 </td>

 </tr>
 @endforeach
 </tbody>
 </table>
 </div>



</div>
</div>
</div>
@endsection

@section('scripts')

<script>
function deletePost(e){
    'use strict';
    if(window.confirm('本当に削除してもいいですか？')) {
        document.getElementById('delete_'+e.dataset.id).submit();
    }
}
</script> 


@endsection