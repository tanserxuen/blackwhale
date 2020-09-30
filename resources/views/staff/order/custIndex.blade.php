@extends('layouts.app')

@section('content')
    
    <div class="jumbotron m-5">
        
        <a href="/orders" class="btn btn-default">Go Back</a>
        <h2>Customer Details</h2>
        
        {{-- <div class="float-left">{{$customers->links()}}</div> --}}

        <p class="mt-5 mb-3">Filter:</p>
        <div class="form-group">
            <select onchange="location = this.value;"  class="form-control col-md-2 mb-5">
                <option selected disabled>-Name-</option>
                @foreach ($customers as $customer)
                    <option value="/custDetails/?name={{$customer->name}}">{{$customer->name}}</option>
                @endforeach
            </select>
        </div>
        

        <table class="table table-striped table-bordered">
            <thead>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Contact</th>
                <th>PickUp Time</th>
                <th>Created Date</th>
                <th>Created Time</th>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td style="width:140px">{{$customer->id}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->contact}}</td>
                        <td>{{$customer->pickup_time}}</td>
                        @php
                            $format1 = 'Y-m-d';
                            $format2 = 'H:i:s';
                            $date = Carbon\Carbon::parse($customer->created_at)->format($format1);
                            $time = Carbon\Carbon::parse($customer->created_at)->format($format2);
                        @endphp
                        <td>{{ date("Y-m-d", strtotime($date))}}</td>
                        <td>{{ date("H:i:s", strtotime($time))}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection