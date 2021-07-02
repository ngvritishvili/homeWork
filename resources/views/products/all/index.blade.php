@extends('layouts.header')
@section('body')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <span class="card-title">All products</span>
            </div>

            <div class="table-stats order-table ">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Currency</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>

                    @foreach($products as $product)

                        <form method="post" action="{{ route('readyToShip') }}">
                            @csrf

                            <input name="id" value="{{ $order->id }}" hidden>

                            <tbody>
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->currency }}</td>


                                <td class="row pull-right mr-2">
                                    <button type="submit"
                                            class="btn btn-sm btn-info delete">Edit
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </form>


                    @endforeach


                </table>
            </div>


        </div>


    </div>

@endsection
