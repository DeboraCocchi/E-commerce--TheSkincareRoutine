@extends('layouts.app')

@section('content')
    <div class="content-container">
        <div class="container-fluid">
            <div class="intestazione d-flex justify-content-between m-0 align-items-center">
                <h2 class="text-black">Dettaglio prodotto: <span class="purple">{{$product->name}}</span>
                    </h2>
                <a href="{{route('admin.products.index')}}"><i class="fa-solid fa-rotate-left"></i> Torna all'elenco prodotti</a>
            </div>

            <div class="row dc-card-show mt-4">

                <div class="col-6 image-show p-0 m-0 position-relative h-100">
                    <span class="badge bg-light dark purple">{{ucfirst($product->category->type)}}</span>
                    <img @if (str_contains($product->image,'http')) src="{{$product->image}}"
                        @else src="{{ asset('storage/'.$product->image)}}"
                        @endif alt="{{$product->image_original_name}}" class="product-image-show">
                </div>
                <div class="col-6 details-show p-5 m-0 d-flex flex-column justify-content-between">
                    <div>
                        <h2 class="purple">
                            {{$product->name}}
                        </h2>
                        <h5 class="darkpurple">{{strtoupper($product->brand)}}</h5>
                        <h3><strong>&euro; {{number_format($product->price,2,',','.')}}</strong></h3>
                        <p class="mt-5"><strong class="purple">Descrizione:</strong><br>
                        {{$product->description}}</p>
                        <p class="mt-5" style="font-weight:300;">Codice: {{$product->code}}</p>
                    </div>

                    <div class="col-5 offset-7 text-end">
                        <a href="{{route('admin.products.edit', $product)}}" class="btn btn-dark align-self-end"><i class="fa-solid fa-pencil"></i>&nbsp; Modifica</a>
                        {{-- @include('admin.products.delete-form',[
                        'message' => "Confermi l'eliminazione del profilo: $product->name ?",
                        'entity' => $product
                    ]) --}}

                            <button type="button" class="btn btn-warning delete-profile mt-2" title="delete" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa-solid fa-trash-can"></i>&nbsp; Elimina prodotto</button>

                            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma eliminazione prodotto</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <p>Sei sicuro di voler eliminare il prodotto <span class="purple">{{$product->name}}</span>?</p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                                      <form action="{{ route('admin.products.destroy',$product)}}" method="POST" class="mt-2">
                                        @csrf
                                        @method('DELETE')
                                      <button type="submit" class="btn btn-danger" title="delete">Conferma</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
