@extends('layouts.app')

@section('content')
    <div class="content-container">
        <div class="container-fluid">
            <div class="row flex-wrap justify-content-between">
                <div class="col-12 d-flex justify-content-between align-items-center ps-3 pe-5">
                    <h2>I miei prodotti</h2>
                    <a class="btn btn-light purple" href="{{route('admin.products.create')}}"><i class="fa-solid fa-circle-plus"></i> Aggiungi nuovo</a>
                </div>
                @foreach ($products as $product)
                <div class="card dc-card p-0">
                    <img @if (str_contains($product->image,'http')) src="{{$product->image}}"
                    @else src="{{ asset('storage/'.$product->image)}}"
                    @endif alt="{{$product->image_original_name}}" class="card-img-top p-0 m-0">

                    <div class="card-body p-2 d-flex flex-column justify-content-between">
                        <span class="badge bg-light purple">{{ucfirst($product->category->type)}}</span>
                      <h4 class="card-title purple">{{$product->name}}</h4>
                      <h6 class="card-title darkpurple">{{strtoupper($product->brand)}}</h6>
                      <div class="d-flex justify-content-between">
                          <h5><strong>&euro; {{number_format($product->price,2,',','.')}}</strong></h5>
                          <p style="font-size:0.8rem">Cod. prodotto:<br>{{$product->code}}</p>
                      </div>
                      <p class="card-text">{{substr($product->description,0,80)}}...</p>
                      <a href="{{route('admin.products.show', $product)}}" class="btn btn-dark align-self-end">Dettagli</a>
                    </div>
                </div>
                {{-- <div class="card">
                    {{$product}}
                </div> --}}
                @endforeach
            </div>
        </div>
    </div>
@endsection
