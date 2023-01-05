@extends('layout')
@section("container")

@if ($message = Session::get('msg'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{$message}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-7">
                        <h4>Productos</h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @foreach($producto as $pro)
                        <div class="col-lg-3">
                            <div class="card" style="margin-bottom: 20px; height: auto;">
                                <img src="{{asset($pro->imagen)}}"
                                     class="card-img-top mx-auto"
                                     style="height: 150px; width: 150px;display: block;">
                                <div class="card-body">
                                    <div style="text-align: center">
                                        <h6 class="card-title">{{ $pro->nombre }}</h6>
                                    </div>
                                    <div style="text-align: center">
                                        <p>${{ $pro->precio }}</p>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <a class="btn btn-secondary" href="{{url('Detallepro',[$pro])}}">ver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
