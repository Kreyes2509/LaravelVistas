@extends('layout')
@section("container")

@if ($message = Session::get('msg'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{$message}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="row mt-3">
    <div class="col-lg-6 col-sm-6 text-center">
        <div class="table table-responsive">
            <table class="table table-bordered table-hover table-primary">
                <thead><tr><th>IMAGEN</th><th>PRODUCTO</th><th>PRECIO</th><th>CANTIDAD</th><th>ELIMINAR</th></tr></thead>
                <tbody class="table-group-divider">
                    @foreach ($carro as $row )
                    <tr>
                        <td><img style="width: 100px;height:100px" src="{{asset($row->imagen)}}" alt=""></td>
                        <td>{{$row->nombre}}</td>
                        <td>{{$row->precio}}</td>
                        <td>{{$row->cantidad}}</td>
                        <td>
                            <form  method="POST" action="{{url('EliminarPro',[$row->producto_id])}}">
                                @method("delete")
                                @csrf
                                <a href="" class="btn btn-danger">Eliminar</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
