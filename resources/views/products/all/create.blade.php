@extends('layouts.header')
@section('body')
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block fade-message">
            <strong>{{ $message }}</strong>
        </div>

    @elseif($message = Session::get('message'))
        <div class="alert alert-success alert-block fade-message">
            <strong>{{ $message }}</strong>
        </div>

    @elseif($message = Session::get('errors'))
        <div class="alert alert-danger alert-block fade-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="container">
        <div class="card">

            <div class="card-header">
                <span class="card-title">Create product</span>
            </div>

            <form action="{{ route('products.store') }}" method="post">
                @csrf

                <div class="w-25 m-3 ">
                    <label class="form-label">Name</label>
                    <input class="form-control" name="name" >
                </div>

                <div class="w-25 m-3 ">
                    <label class="form-label">Description</label>
                    <input class="form-control " name="details">
                </div>

                <div class="w-25 m-3 ">
                    <label class="form-label">Price</label>
                    <input class="form-control " name="price">
                </div>

                <div class="w-25 m-3 ">
                    <label class="form-label">Currency</label>
                    <select class="form-control custom-select" name="currency">
                        @foreach($curList as $currency)
                            <option value="{{ $currency->currency }}">{{ $currency->currency }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="w-25 m-3 ">
                    <button class="btn btn-success" type="submit">Create</button>
                </div>

            </form>


        </div>


    </div>
@endsection
