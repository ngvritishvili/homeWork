<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
<div
    class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif


    <div class="container">
        <div class="card">
            <div class="card-header">
                <span class="card-title">Watches Order</span>
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

</div>
</body>
</html>
