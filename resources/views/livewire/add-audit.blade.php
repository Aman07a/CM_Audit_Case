<!-- resources/views/livewire/add-audit.blade.php -->

<div>
    <form wire:submit.prevent="addItem">
        <label for="auditName">Audit Name:</label>
        <input wire:model="auditName" type="text" id="auditName" />
        @error('auditName')
            <span>{{ $message }}</span>
        @enderror

        <label for="questionProgressPercentage">Question Progress Percentage:</label>
        <input wire:model="questionProgressPercentage" type="number" id="questionProgressPercentage" min="0" max="100" />
        @error('questionProgressPercentage')
            <span>{{ $message }}</span>
        @enderror

        <button type="submit">Add Audit</button>
    </form>
</div>
