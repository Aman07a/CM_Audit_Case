<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Laravel App</title>
</head>

<body>

    <div>
        @livewire('user-table')
        @livewire('customer-table')
        @livewire('audit-table')

        <!-- Include the AddAudit Livewire component -->
        @livewire('add-audit', ['audit' => new \App\Models\Audit()])
    </div>

    <!-- Livewire scripts -->
    @livewireScripts
</body>

</html>
