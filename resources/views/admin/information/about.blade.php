<div class="bg-white p-3 rounded-4 shadow-sm">
    <form action="{{ url('/admin/information/about') }}" method="POST" class="mt-4 mb-3">
        @csrf
        <div class="row mb-3">
            <div class="col-sm-12">
                <textarea class="form-control ckeditor" name="about" rows="10" required>{{ $information->about }}</textarea>
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
