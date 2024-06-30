@extends('layouts.app')
@section('content')
    <body>

        <h2 class="text-center text text-success my-4 text-uppercase text-decoration-underline">Manager</h2>


        <div class="container">

            <a href="{{route('ODs.create')}}">
                <button class="btn btn-success mb-3"><i class="fa-regular fa-square-plus"></i> Add new</button>
            </a>
            <div class="row">

                <table class="table table-primary table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">To Money</th>
                        <th scope="col" class="text-center" colspan="3">Edit</th>

                        </tr>
                    </thead>
                    <tbody>
                            @foreach($ODs as $item)
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <td>{{$item->OrderID}}</td>
                                    <td>{{$item->getProductName()}}</td>
                                    <td>{{$item->Amount}}</td>
                                    <td>{{$item->toMoney()}}</td>

                                    <td ><a class="btn btn-success" href="{{route('ODs.show', ['OD' => $item->id, 'pageIndex' => $pageIndex])}}"><i class="fa-regular fa-eye"></i></a></td>
                                    <td ><a class="btn btn-danger" href="{{route('ODs.edit', ['OD' => $item->id, 'pageIndex' => $pageIndex])}}"><i class="fa-regular fa-pen-to-square"></i></a></td>
                                    <td ><button class="btn btn-warning" data-bs-toggle='modal'   data-bs-target='#A{{$item->id}}'><i class="fa-regular fa-trash-can"></i></button></td>


                                    <!-- Modal -->
                                    <div class='modal fade' id='A{{$item->id}}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h1 class='modal-title fs-5' id='exampleModalLabel'>Confirm</h1>
                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                </div>
                                                <div class='modal-body'>
                                                    Are you want delete item with id: {{$item->id}}
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>No</button>
                                                    <form action="{{route('ODs.destroy', ['pageIndex' => $pageIndex, 'OD' => $item->id])}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"  class='btn btn-primary'>Yes</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>

                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- paginating  -->

        <div class="d-flex justify-content-center align-items-center my-2">
            <a class="btn btn-success" href="{{route('ODs.index', ['pageIndex' => $pageIndex - 1])}}"><</a>
            @for($i = 1; $i <= $numberOfPage; $i++)
                @if($pageIndex == $i)
                    <a class="btn btn-primary ms-2" href="{{route('ODs.index', ['pageIndex' => $i])}}">{{$i}}</a>
                @else
                    <a class="btn btn-success ms-2" href="{{route('ODs.index', ['pageIndex' => $i])}}">{{$i}}</a>
                @endif
            @endfor
            <a class="btn btn-success ms-2" href="{{route('ODs.index', ['pageIndex' => $pageIndex + 1])}}">></a>
        </div>


        <!-- modal inform -->


        <div id="myDialog" style="display: none;" class="px-5 py-3 rounded-3">
            <h4 class="text-primary fw-bold fs-4">Information</h4>
            <p class="text-success">{{ session('mes') }}</p>
            <button id="confirmButton" class="float-end rounded-2">OK</button>
        </div>
        <style>
            #myDialog {
                position: fixed;
                width: 500px;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: #ffffff;
                padding: 20px;
                border: 1px solid #ccc;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            }

            #confirmButton {
            padding: 10px 20px;
            background: #007bff;
            color: #ffffff;
            border: none;
            cursor: pointer;
            }
        </style>
    </body>
@endsection
@section('script')
    @if(session('mes'))
    <script>
        var dialog = document.getElementById("myDialog");
        var confirmButton = document.getElementById("confirmButton");

        dialog.style.display = "block";
        confirmButton.addEventListener("click", function() {
            dialog.style.display = "none";
        });
        // alert("{{ session('Success') }}")
    </script>
    @endif
@endsection
