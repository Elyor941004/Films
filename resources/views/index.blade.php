@extends('layouts.app')
@section('content')
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>Ид</th>
                <th>Филмы</th>
                <th>Жанр</th>
                <th>фотография</th>
            </tr>
            </thead>
            <tbody>
            @foreach($models as $model)
                <tr class="success">
                    <td>{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                    @foreach($janrs as $janr)
                        @if($janr->id == $model->janr_id)
                            <td>{{$janr->name}}</td>
                        @endif
                    @endforeach

                    <td><img src="{{asset('storage/'.$model->image)}}" alt="" height="150px"></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
