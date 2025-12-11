<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

   
</head>
<style>
    .form{
        height:500px,
        width:500px,
        border: 1px solid black,
    }

    .label{
        border:1px solid black
    }
</style>
<body>
    <form action="{{route('product.update')}}"  method="POST"  class="form">
        <!-- @method("POST") -->
        @csrf
        <label class="label" name="product_name">Product Name</label>
        <input name="product_name" type="text" />
        <lable name="product_price">Product Price</lable>
        <input name="product_price" type="number" />
        <label name="product_code">Product Code</label>
        <input name="product_code" type="text" />
        <label name="product_quantity">Product quantity</label>
        <input name="product_quantity" type="number" />
        <lable name='product_image'>Product image</lable>
        <input name="product_image" type="file">
        <button name="submit" type="submit">Submit</button>
    </form>
</body>

</html>