@extends('layouts.app')

@section('content')
    
    <div class="jumbotron m-5">
        <h2>Order History</h2>
        <a href="/custDetails" style="float:right;font-size:19px;" title="View Customer Details">
            <span class="fa fa-user fa-lg"></span> Customer Details</a> 

        {{-- {{$orders->links()}} --}}

        <p class="mt-5 mb-5">Filter:<a href="/orders" class="btn btn-default ml-5">Clear Filter</a></p>
        
        <form action="/orders" method="GET" class="mb-5 mt-3">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xs-1">
                    <select name="id" id="orderId" class="form-control">
                        <option value="0" disabled selected>-NO.-</option>
                        @foreach ($orders as $order)
                            <option value="{{$order->id}}">{{$order->id}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-2">
                    <select name="orderId" id="" class="form-control">
                        <option value="0" disabled selected>-Order ID-</option>
                        @foreach ($orders as $order)
                            <option value="{{$order->order_id}}">{{$order->order_id}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-2">
                    <select name="customerId" id="" class="form-control">
                        <option value="0" disabled selected>-Customer ID-</option>
                        @foreach ($search[0] as $cust)
                            <option value="{{$cust->id}}">{{$cust->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-2">
                    <select name="outletId" id="" class="form-control">
                        <option value="0" disabled selected>-Outlet ID-</option>
                        @foreach ($search[1] as $outlet)
                            <option value="{{$outlet->id}}">{{$outlet->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-2">
                    <select name="payment" id="" class="form-control">
                        <option value="0" disabled selected>-Payment Mtd-</option>
                        <option value="on cash" >On Cash</option>
                        <option value="fpx" >FPX</option>
                    </select>
                </div>
                <div class="col-xs-2">
                    {{-- <label for="createdAt">Date</label> --}}
                    <input type="date" id="createdAt" name="createdAt" class="form-control">
                </div>
                <div class="col-xs-1">
                    <button class="btn btn-default d-inline" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </div>
            </div>
        </form>

        {{-- user search --}}
        @if ($request->except('_token'))
            {{$request->except('_token')}}
            <table class="table table-striped table-bordered">
                <thead>
                    <th>No.</th>
                    <th>Order Id</th>
                    <th>Customer Name</th>
                    <th>Outlet Name</th>
                    <th>Payment Type</th>
                    <th>Time and Date</th>
                </thead>
                <tbody>
                    {{-- @foreach($orders->sortBy('outlet_id') as $order) --}}
                    @foreach ($orders as $order)
                        <tr>
                            <td><a href="/order/{{$order->id}}">{{$order->id}}</a></td>
                            <td>{{$order->order_id}}</td>
                            <td>{{$order->customer()->pluck('name')->first()}}</td>
                            <td>{{$order->outlet()->pluck('name')->first()}}</td>
                            <td>{{$order->payment}}</td>
                            <td>{{$order->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
    </div>
    
    <script>
        var id = document.getElementById('orderId').value;
        document.getElementById('output').innerHTML = id;
    </script>
@endsection