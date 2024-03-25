<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{ $index }}">
    <i class="fa-solid fa-trash"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="modal{{ $index }}" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5 text-danger fw-bold" id="exampleModalLabel">Attenzione!</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                L'immobile "<span class="text-primary">{{ $apartment->title }}</span>" verrà <span
                    class="text-danger">eliminato</span>, sei sicuro?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">Annulla</button>
                <form action="{{ route('admin.apartments.destroy', $apartment) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger fw-bold">
                        Elimina
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>
