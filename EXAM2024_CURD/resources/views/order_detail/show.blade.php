@extends('layouts.app')
@section('content')
    <body>
        <h2 class="text-center text-uppercase text-decoration-underline text-success">View detail order item</h2>

        <div class="container">
            <div class="row">
                <table class="table table-dark table-striped align-middle">
                    <thead>
                        <tr>
                            <th class="col-6" scope="col">Atribute</th>
                            <th class="col-6" scope="col">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{$OD->id}}</td>
                        </tr>
                        <tr>
                            <td>Order ID</td>
                            <td>{{$OD->OrderID}}</td>
                        </tr>
                        <tr>
                            <td>Product Name</td>
                            <td>{{$OD->getProductName()}}</td>
                        </tr>
                        <tr>
                            <td>Amount</td> 44
                            <td>{{$OD->Amount}}</td>
                        </tr>
                        <tr>
                            <td>To Money</td>
                            <td>{{$OD->toMoney()}}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <p class="d-flex justify-content-end"><a href="{{route('ODs.index', ['pageIndex' => $pageIndex])}}" class=""><button class="btn btn-primary fw-bold">Back</button></a></p>
        </div>
    </body>
@endsection
