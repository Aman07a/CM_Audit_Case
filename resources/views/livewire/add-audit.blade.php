<div class="my-4">
    <form wire:submit.prevent="addItem" class="row g-3 align-items-end">
        <div class="col-md-4">
            <label for="user_id" class="form-label">Select User:</label>
            <select wire:model="user_id" id="user_id" class="form-select">
                <option value="">Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="customer_id" class="form-label">Select Customer:</label>
            <select wire:model="customer_id" id="customer_id" class="form-select">
                <option value="">Select Customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->company_name }}</option>
                @endforeach
            </select>
            @error('customer_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

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
