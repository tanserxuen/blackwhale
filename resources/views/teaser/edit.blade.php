@extends('layouts.app')

@section('style')

    <style>
        .form-container{
            -webkit-box-shadow: inset 10px 7px 5px -3px rgba(0,0,0,0.75);
            -moz-box-shadow: inset 10px 7px 5px -3px rgba(0,0,0,0.75);
            box-shadow: inset 10px 7px 5px -3px rgba(0,0,0,0.75);
            padding:  50px 120px 20px 120px;
        }

        .head{
            text-align: center;
            padding-bottom:20px;
        }
    </style>

@endsection

@section('content')

<div class="container">
    <br>    
    <a href="/teas" class="btn btn-light mb-5">Go Back</a>

    <h2 class="head">Edit Menu Series</h2>
    
    <div class="form-container jumbotron">
        
        <form method="post" action="{{route('editTeaSer', [$teaserie->id])}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="nameid" class="col-sm-3 col-form-label">Category Name</label>
                <div class="col-sm-9">
                    <input name="name" type="text" class="form-control" id="nameid" placeholder="Name" value="{{$teacategory->name}}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="nameid" class="col-sm-3 col-form-label">Series Name</label>
                <div class="col-sm-9">
                    <input name="name" type="text" class="form-control" id="nameid" placeholder="Name" value="{{$teaserie->name}}">
                </div>
            </div>

            <br>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Image</label>
                <label for="photos" class="col-sm-8 custom-file-label">Image Upload</label>
                <div class="col-sm-1">
                    <input type="file" class="custom-file-input" id="photos" name="image" onchange="loadFile(event)">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9">
                    <!--image preview-->
                    <img id="output" src="/img/{{$teaserie->image}}" style="height: 100px; width: 100px; display:block;">
                </div>
            </div>

            <br><br>
            <div class="form-group row">
                <label for="descriptionid" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                    <textarea name="description" type="text" class="form-control" id="descriptionid" placeholder="Description" rows="5" cols="50">{{$teaserie->description}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="priceid" class="col-sm-3 col-form-label">Price (RM)</label>
                <div class="col-xs-2">
                    <input name="price" type="text" class="form-control" id="priceid" placeholder="Price" value="{{number_format($teaserie->price, 2)}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="rateid" class="col-sm-3 col-form-label">Rating</label>
                <div class="col-xs-2">
                    <input name="rate" type="number" class="form-control" id="rateid" placeholder="Rating" value="{{$teaserie->rate}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="quantityid" class="col-sm-3 col-form-label">Quantity</label>
                <div class="col-xs-2">
                    <input name="quantity" type="number" class="form-control" id="quantityid" placeholder="Quantity" value="{{$teaserie->quantity}}">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <div class="offset-sm-3 col-sm-9">
                    <input name="_method" type="hidden" value="POST">
                    <button type="submit" class="btn btn-success btn-lg float-right">Confirm</button>
                </div>
            </div>
        </form>
    </div>  
</div>

    <script>
        var loadFile = function(event){
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

@endsection