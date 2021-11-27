@extends('layouts.admin')
@section('content')
<div class="container">
    <form action="{{route('films.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
        <div class="alert alert-danger">
          <ul style="list-style: none">
            @foreach($errors->all() as $error)
              <li>
                {{$error}}
              </li>
            @endforeach
          </ul>
        </div>
      @endif
        <div class="form-group">
            <label for="name">Филм названия:</label>
            <input type="text" class="form-control" id="name" placeholder="Филм названия:" name="name">
            <label for="publication">Публикатция:</label>
            <input type="text" class="form-control" id="publication" placeholder="публикатция:" name="publication">
            <label for="images">Фотография:</label>
            <input type="file" class="form-control" id="images" name="image">
            <label for="janrId">Жанр:</label>
            <select class="form-control" name="janr_id">
                @foreach($janrs as $janr)
                    <option id="janrId" value="{{$janr->id}}">{{$janr->name}}</option>
                @endforeach
            </select>
            <label for="status">Филм опубликоват: </label>
            <input type="checkbox" class="form-control" id="status" placeholder="Филм опубликоват:" name="status">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
