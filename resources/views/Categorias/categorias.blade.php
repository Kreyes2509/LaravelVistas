@extends('layout')
@section("container")

@if ($message = Session::get('msg'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{$message}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="row mt-3">
    <div class="col-12 col-lg-8 offset-0 offset-lg-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Añadir
        </button>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 col-lg-8 offset-0 offset-lg-2">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-primary">
                <thead><tr><th>#</th><th>NOMBRE</th><th>ACTUALIZAR</th><th>ELIMINAR</th></tr></thead>
                <tbody class="table-group-divider">
                    @foreach ($categorias as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->categoria}}</td>
                            <td>
                                <a href="{{url('categorias',[$row])}}"class="btn btn-warning">Actualizar</a>
                            </td>
                            <td>
                                <form method="POST" action="{{url('categorias',[$row])}}">
                                    @method("delete")
                                    @csrf
                                    <button class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir categoria</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{url("categorias")}}">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input type="text" name="categoria" class="form-control" placeholder="categoria" aria-label="Username" aria-describedby="basic-addon1">
                    @error('categoria')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="d-grid col-6 mx-auto">
                    <button class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>

@endsection
