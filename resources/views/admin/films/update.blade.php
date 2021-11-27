@extends('layouts.admin')
@section('content')
<div class="container">
    <form action="{{route('films.update', $model->id)}}" method="post" enctype="multipart/form-data">
       @if($errors->any())
        <div class="alert alert-danger">
          <ul  style="list-style: none">
            @foreach($errors->all() as $error)
              <li>
                {{$error}}
              </li>
            @endforeach
          </ul>
        </div>
      @endif
      @method('PUT')
      @csrf
        <div class="form-group">
            <label for="name">Филм названия:</label>
            <input type="text" class="form-control" id="name" placeholder="Филм названия:" name="name" value="{{$model->name}}">
            <label for="publication">Публикатция:</label>
            <input type="text" class="form-control" id="publication" placeholder="публикатция:" name="publication" value="{{$model->publication}}">
            <label for="image">Фотография:</label>
            <input type="file" class="form-control" id="image" placeholder="фотография:" name="image" value="{{$model->image}}">
            <label for="janrId">Жанр:</label>
            <select class="form-control" name="janr_id">
                @foreach($janrs as $janr)
                    <option id="janrId" value="{{$janr->id}}" {{old($model->janr_id==$janr->id?'selected':'')}}>{{$janr->name}}</option>
                @endforeach
            </select>
            <label for="status">Филм опубликоват: </label>
            <input type="checkbox" class="form-control" id="status" placeholder="Филм опубликоват:" name="status">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
