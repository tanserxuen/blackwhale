@extends('layouts.app')

@section('style')
    <style>
        .accordion {
            background-color: white;
            color: black;
            cursor: pointer;
            padding: 18px;
            width: 90%;
            margin: 10px 20px 10px, 0px;
            border-radius: 6px;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
            color:#888;
            border:none;
        }
        
        .active, .accordion:hover {
            background-color: #bbb;
            color: white; 
        }
        
        ._panel {
            padding: 0px;
            display: none;
            background-color: none;
            overflow: hidden;
            width: 90%;
        }

        ._grid-container {
            display: grid;
            grid-template-columns: auto auto auto auto ;
            width:100%;
            background-color: none;
            padding: 0px;
        }

        ._grid-container > div {
            display: inline;
            background-color: rgba(255, 255, 255, 1.0);
            text-align: center;
            font-size: 18px;
            width: 225px;
        }

        #counter{
            display: inline-block;
            padding: 0.25em 0.4em;
            background:#ccc;
            color:#999
            font-size: 80%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 15px;
            float:right;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .teaproduct{
            background-color: white;
            color: black;
            cursor: pointer;
            padding: 8px;
            width: 90%;
            margin: 10px;
            border-radius: 6px;
            text-align: left;
            outline: none;
            transition: 0.4s;
            color:#888;
            border:none;
        }

    </style>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endsection

@section('content')
<div class="container">

    <h1>Tea Series</h1><br><br><br>
    <a href="/teacat/create" class="btn btn-primary">Add Menu Category</a>
    <a href="/teaser/create" class="btn btn-primary"> Add Menu Series </a><br>
    
    <div class="pagination">
        {{$teacategories->links()}}
    </div>

    @if(count($teaseries) > 0)
        @foreach($teacategories as $teacategory)
            
        <!--edit and delete button-->
        <div>
            <a href="/teacat/{{$teacategory->id}}/edit" class="btn btn-warning">Edit Category</a>
            <a class="btn btn-danger" onclick="sweetalertclick('{{$teacategory->name}}', '{{$teacategory->id}}')">Delete Category</a>
        </div>

        <!--display category-->
        <button class = "accordion"> 
            {{$teacategory->name}}<span id="counter">{{$teacategory->series()->count()}}</span>
        </button>
        
        <div class = "_panel">
            
            <div class = "_grid-container"> 
                <!--display series-->
                @foreach($teacategory->series as $teaserie)
                    <div class="teaproduct">
                        <a href="/teaser/{{$teaserie->id}}">{{$teaserie->name}}</a><br><br>
                        <img src="/storage/img/{{$teaserie->image}}" alt="{{$teaserie->name}}" width="100px" height="100px"><br>
                        <p>RM {{number_format($teaserie->price, 2)}}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <br><br>
        @endforeach
            
    @else
        <p>No results found</p>
            
    @endif


</div>

    <script type="application/javascript">
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                panel.style.display = "none";
                } else {
                panel.style.display = "block";
                }
            });
        }
        
        function sweetalertclick(name , id){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover " + name + " !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = "/teacat/" + id + "/delete"
                } else {
                    swal(name + " is safe!");
                    
                }
            });
        }

    </script>


@endsection