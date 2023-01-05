@extends('layout')
@section("container")

<div class="row mt-3">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header bg-dark text-white">Editar categoria</div>
            <div class="card-body">
                <form method="POST" action="{{url("productos",[$productos])}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <input type="text" name="nombre" value="{{$productos->nombre}}" class="form-control" placeholder="nombre" aria-label="Username" aria-describedby="basic-addon1">
                        <br>
                        @error('nombre')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <textarea name="descripcion" class="form-control" placeholder="descripcion" aria-label="Username" style="height: 150px">{{$productos->descripcion}}</textarea>
                        @error('descripcion')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <input type="text" name="precio" value="{{$productos->precio}}" class="form-control" placeholder="precio" aria-label="Username" aria-describedby="basic-addon1">
                        @error('precio')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <input type="number" min="0" name="stock" value="{{$productos->stock}}" class="form-control" placeholder="stock" aria-label="Username" aria-describedby="basic-addon1">
                        @error('stock')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <input type="file" name="imagen" value="{{$productos->imagen}}" class="form-control" placeholder="imagen" aria-label="Username" aria-describedby="basic-addon1">
                        @error('imagen')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <select name="categoria_id" class="form-select" required>
                            <option value="">Categorias</option>
                            @foreach ($categoria as $row )
                                @if($row->id == $productos->categoria_id)
                                    <option selected value="{{$row->id}}">{{$row->categoria}}</option>
                                @else
                                    <option value="{{$row->id}}">{{$row->categoria}}</option>
                                @endif
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
        </div>
    </div>
</div>
@endsection
