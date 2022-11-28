<div class="bg-white p-3 rounded-4 shadow-sm">
    <form action="{{ url('/admin/information/visi') }}" method="POST" class="mt-4 mb-3">
        @csrf
        <div class="row mb-3">
            <div class="col-sm-12">
                <textarea class="form-control ckeditor" name="visi" rows="10" required>{{ $information->visi }}</textarea>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-12 d-flex gap-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-regular fa-circle-check"></i>
                    <span class="ms-1">Save now</span>
                </button>
            </div>
        </div>
    </form>
</div>
