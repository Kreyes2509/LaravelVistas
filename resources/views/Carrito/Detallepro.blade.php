@extends('layout')
@section('container')


@foreach ($producto as $row)
<div class="row mt-3">
    <div class="col-lg-6 col-sm-6 text-center">
        <img src="{{asset($row->imagen)}}" alt="">
    </div>
    <div class="col-lg-6 col-sm-12" style="color: white">
        <h3>{{$row->categoria}}</h3>
        <h3>{{$row->nombre}}</h3>
        <div class="row mt-3 text-justified">
            <h6>Descripcion:{{$row->descripcion}}</h6>
        </div>
        <div class="row mt-3">
            <h6>Precio:{{$row->precio}}</h6>
        </div>
        <div>
            <form method="POST" action="{{url('addCarrito',[$row->id])}}">
                @csrf
                <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                <input type="number" name="cantidad" min="0" max="10" style="width: 140px" class="form-control" placeholder="cantidad" aria-label="Username" aria-describedby="basic-addon1" required><br>
                <div>
                    <button class="btn btn-primary">Añadir al carrito</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach


@endsection
