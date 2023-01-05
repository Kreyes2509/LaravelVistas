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
                <thead><tr><th>IMAGEN</th><th>NOMBRE</th><th>PRECIO</th><th>STOCK</th><th>CATEGORIA</th><th>ACTUALIZAR</th><th>ELIMINAR</th></tr></thead>
                <tbody class="table-group-divider">
                    @foreach ($producto as $row)
                        <tr>
                            <td><img style="width: 100px;height:100px" src="{{asset($row->imagen)}}" alt=""></td>
                            <td>{{$row->nombre}}</td>
                            <td>{{$row->precio}}</td>
                            <td>{{$row->stock}}</td>
                            <td>{{$row->categoria}}</td>
                            <td>
                                <a href="{{url('productos',[$row])}}"class="btn btn-warning">Actualizar</a>
                            </td>
                            <td>
                                <form  method="POST" action="{{url('productos',[$row])}}">
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




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir productos</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{url("productos")}}" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input type="text" name="nombre" class="form-control" placeholder="nombre" aria-label="Username" aria-describedby="basic-addon1"required>
                    @error('nombre')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <textarea name="descripcion" class="form-control" placeholder="descripcion" aria-label="Username" style="height: 150px"required></textarea>
                    @error('descripcion')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input type="text" name="precio" class="form-control" placeholder="precio" aria-label="Username" aria-describedby="basic-addon1"required>
                    @error('precio')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input type="number" min="0" name="stock" class="form-control" placeholder="stock" aria-label="Username" aria-describedby="basic-addon1"required>
                    @error('stock')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input type="file" name="imagen" class="form-control" placeholder="imagen" aria-label="Username" aria-describedby="basic-addon1"required>
                    @error('imagen')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <select name="categoria_id" class="form-select" required>
                        <option value="">Categoria</option>
                        @foreach ($categoria as $row )
                        <option value="{{$row->id}}">{{$row->categoria}}</option>
                        @endforeach
                    </select>
                    @error('categoria_id')
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

