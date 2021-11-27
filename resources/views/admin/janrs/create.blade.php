@extends('layouts.admin')
@section('content')
<div class="container">
    <form action="{{route('janrs.store')}}" method="post">
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
          <label for="name">Жанр:</label>
          <input type="text" class="form-control" id="name" placeholder="Жанр:" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
