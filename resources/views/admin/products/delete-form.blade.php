<button type="button" class="btn btn-warning delete-profile" data-bs-toggle="modal" data-bs-target="#modal{{$entity->id}}">
    Elimina prodotto
</button>
{{-- modal --}}
<div class="modal fade" id="modal{{$entity->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-5" id="exampleModalLabel">Eliminazione prodotto</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body confirm ">
                {{$message}}
            </div>
            <div class="modal-footer d-flex align-items-end justify-content-end">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Annulla</button>
                <form action="{{ route('admin.products.destroy',$product)}}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn btn-info delete-profile btn-sm" title="delete">Elimina prodotto</button>
                </form>
            </div>
        </div>
    </div>
</div>

