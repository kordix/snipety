@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
    @foreach($categories as $category)
        <div class="col-md-5">{{$category->channelname}}</div><div class="col-md-5">{{$category->id}}</div>
    @endforeach
    </div>
<div class="row">
    <br><br>
    <h3>Dodaj kategorie</h3>
<form action="/storecategory" method="post">
    {{csrf_field()}}
    <label for="category">Nazwa kategorii</label>
    <input type="text" name="categoryname">
    <button type="submit">Dodaj</button>
</form>
    </div>
</div>
@endsection
