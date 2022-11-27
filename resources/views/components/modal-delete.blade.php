<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">
                    Delete Confirm
                </h1>
            </div>
            <div class="modal-body">
                Are you sure for delete this item ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">No, Cancel</button>
                <a href="{{ $url }}" class="btn btn-danger text-white"
                    onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Yes, Delete</a>

                <form id="delete-form" action="{{ $url }}" method="POST" class="d-none">
                    @csrf @method('DELETE')
                </form>
            </div>
        </div>
    </div>
</div>
