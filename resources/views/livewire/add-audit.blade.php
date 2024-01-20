<div class="my-4">
    <form wire:submit.prevent="addItem" class="row g-3 align-items-end">
        <div class="col-md-4">
            <label for="auditName" class="form-label">Audit Name:</label>
            <input wire:model="auditName" type="text" id="auditName" class="form-control" />
            @error('auditName')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="questionProgressPercentage" class="form-label">Question Progress Percentage:</label>
            <input wire:model="questionProgressPercentage" type="number" id="questionProgressPercentage" class="form-control" />
            @error('questionProgressPercentage')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Add Audit</button>
            </div>
        </div>
    </form>
</div>
