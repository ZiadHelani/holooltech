@extends('app')
@section('title', 'Update Page')
@section('code')
<form action="{{route('update', Request::route('id'))}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="title" value="{{$products->title}}" ><br><br>
    <input type="text" name="desc" placeholder="description" value="{{$products->desc}}" ><br><br>
    <input type="text" name="price" placeholder="price" value="{{$products->price}}" ><br><br>
    <img width="100px" height="100px" src="{{asset('storage/pics/'.$products->image)}}" alt="">
    <input type="file" name="image" placeholder="image" ><br><br>
    <input type="submit" value="Update" >
</form>
@if($errors->any())
    @foreach($errors->all() as $error)
        <ul>
            <li>{{$error}}</li>
        </ul>
    @endforeach
@endif
@endsection
