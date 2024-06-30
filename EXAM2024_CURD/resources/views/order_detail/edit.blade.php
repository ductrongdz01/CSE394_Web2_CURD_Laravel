@extends('layouts.app')
@section('content')
    <body>
        <div class="container">
        <div class="row p-3">
            <h4 class="text-uppercase text-decoration-underline text-center fw-bold text-success">Edit Item</h4>
            <form class="bg-info border border-2 border-success rounded-3" method="POST" action="{{route('ODs.update', ['OD' => $OD->id, 'pageIndex' => $pageIndex])}}">
                @csrf
                @method('PUT')
                <div class="input-group mt-2">
                    <span class="input-group-text fw-bold bg-light">Product Name</span>
                    <select class="form-select" name='ProductID'>
                        <option value="{{$OD->ProductID}}">{{$OD->getProductName()}}</option>
                        @foreach($products as $item)
                            <option value="{{$item->ProductID}}">{{$item->ProductName}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mt-2">
                    <span class="input-group-text fw-bold bg-light">Order ID</span>
                    <select class="form-select" name='OrderID'>
                        <option value="{{$OD->OrderID}}">{{$OD->OrderID}}</option>
                        @foreach($oders as $item)
                            <option value="{{$OD->OrderID}}">{{$item->OrderID}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-3">
                    <div class="input-group">
                        <span class="input-group-text fw-bold bg-light">Amount</span>
                        <input value="{{$OD->Amount}}" name = 'Amount' type="number" class="form-control" placeholder="">
                    </div>
                    @error('Amount')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mt-2">
                    <div class="form-floating">
                        <textarea name="Note" class="form-control" placeholder="" id="floatingTextarea2" style="height: 100px">{{$OD->Note}}</textarea>
                        <label for="floatingTextarea2">Note</label>
                    </div>
                    @error('Note')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="d-flex my-3">
                    <button type="submit" class="btn btn-primary ">Add</button>
                    <a href="{{url('ODs?pageIndex='.$pageIndex)}}" class="btn btn-secondary ms-2">Back</a>
                </div>
            </form>
        </div>
        </div>
    </body>
@endsection
