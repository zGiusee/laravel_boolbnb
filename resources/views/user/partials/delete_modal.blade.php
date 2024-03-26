<div class="modal" id="delete_modal" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold ">Apartment cancellation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                L'immobile "<span id="apartment_title"></span>" verrà <span class="text-danger">eliminato</span>, sei
                sicuro?
            </div>

            <div class="modal-footer">
                <button type="button" class="my-btn-sm" data-bs-dismiss="modal">Close</button>
                <form id="delete_form" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="my-btn-sm-dlt">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
