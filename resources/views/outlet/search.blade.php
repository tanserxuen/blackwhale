
@extends('layouts.app')

@section('content')

    <div class="container pt-5">

        <h1>Outlet Locations</h1>
        <a href="/outlets/create" class="btn btn-info float-right">Add Outlet</a>
        <a href="/outlets" title="back to index table"><i class="fa fa-refresh btn btn-light float-right mr-3" style="font-size:17px;"> Refresh</i></a>
        <br><br><br>

        <!--Search function-->
        <form action="/search" method="GET">
            {{ csrf_field() }}
            <div class="input-group col-xs-4">
                <input type="search" class="form-control" name="q" placeholder="Search anything"> 
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <br><br>

        <!--Display table of outlets-->
        <div class="content">
        @if(count($outlets) > 0)
            <table class="table table-striped table-info">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>PostCode</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($outlets as $outlet)
                        <tr>
                            <td>{{$outlet->id}}</td>
                            <td><strong>{{$outlet->name}}</strong></td>
                            <td>{{$outlet->contact}}</td>
                            <td>{{$outlet->email}}</td>
                            <td>{{$outlet->address}}</td>
                            <td>{{$outlet->city}}</td>
                            <td>{{$outlet->postcode}}</td>
                            <td><a href="/outlets/{{$outlet->id}}/edit" class="btn btn-warning float-left" title="edit this outlet" >Edit</a></td>
                            <td>
                                <a onclick="sweetalertclick('{{$outlet->name}}', '{{$outlet->id}}')" class="btn btn-danger float-right" title="delete this outlet" id="deleteBtn">DELETE</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else 
            <p>No results found</p>
        @endif       
    </div>

    
    <script>
        
        function sweetalertclick(name , id){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover " + name + " !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = "/outlets/" + id + "/delete"
                } else {
                    swal(name + " is safe!");
                }
            });
        }

    </script>
    
@endsection