@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Product Listing</h1>

        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">S.no</th>
                <th scope="col">Product name</th>
                <th scope="col">Product price</th>
                <th scope="col">Description</th>
              </tr>
            </thead>
            <tbody>
              @foreach($products as $key => $product)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td><a href="{{ route('products.buy', $product->id) }}" class="btn btn-primary">Buy Now</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
       
    </div>
@endsection
