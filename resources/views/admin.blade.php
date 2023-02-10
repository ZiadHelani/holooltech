@extends('app')
@section('title', 'Admin Panel')
@section('code')

<style>
    .panel{
        display: flex;
        width: 100%;
        justify-content: center;
        background: #ddd;
    }
    .panel form {
        display: flex;
        flex-direction: column;
        height: 400px;
        justify-content: space-evenly
    }
    .panel form input {
        padding: 10px
    }
</style>
<table border="1" style="width:100%; text-align:center;">
    <tr>
        <th>id</th>
        <th>title</th>
        <th>description</th>
        <th>price</th>
        <th>image</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->title}}</td>
        <td>{{$product->desc}}</td>
        <td>{{$product->price}}</td>
        <td><img width="100px" height="100px" src="{{asset('storage/pics/'.$product->image)}}" alt=""></td>
        <td>
            <form action="{{route('delete', $product->id)}}" method="POST">
                @csrf
                <input type="submit" name="delete" value="Delete">
            </form>
            <a href="{{route('update', $product->id)}}"><button>Update</button></a>
        </td>
    </tr>
    @endforeach
</table>
<div class="panel">
    <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="title" required>
        <input type="text" name="desc" placeholder="description" required>
        <input type="text" name="price" placeholder="price" required>
        <input type="file" name="image" accept="image/jpg, image/png, image/jpeg" placeholder="image" required>
        <input type="submit" value="SUBMIT" required>
    </form>
</div>
@if ($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
@endsection
