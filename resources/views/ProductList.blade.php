<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>

<body>
    <form onSubmit="{{route('product')}}">
        <input type="text" name="name"/><button>search</button>
    </form>
    <a href="{{route('product')}}">max price</a>
    <table>
        <th>
            <tr>Product name</tr>
            <tr>Product code</tr>
            <tr>Product price</tr>
            <tr>Product quantity</tr>
            <tr>Product image</tr>
            <tr>Update</tr>
            <tr>Delete</tr>
    </th>
        <td>
            @foreach($data as $product):
            <tr>{{$product->product_name}}</tr>
            <tr>{{$product->product_code}}</tr>
            <tr>{{$product->product_price}}</tr>
            <tr>{{$product->product_quantity}}</tr>
            <tr><img alt="{{$product->product_name}}" src=`storage/${{$product->product_image}} ` /></tr>
            <form action="{{route('product.updateForm',['id'=>$product->id])}}" >
                @csrf
               <button type="submit" name="updateForm">update symbol</button>
            </form>
            <form action="{{route('product.delete',['id' => $product->id])}}" method="POST">
                @csrf
@method('DELETE')
            <button type="submit" name="delete">delete symbol</button>
            </form>
            @endforeach
        </td>
    </table>
    <a href="{{ route('product.create') }}">Create product</a>
</body>

</html>