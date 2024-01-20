<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audit Case</title>

    <!-- Include Bootstrap CSS from CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="mx-auto container">
        @livewire('user-table')
        @livewire('customer-table')
        @livewire('audit-table')

        <!-- Include the AddAudit Livewire component -->
        @livewire('add-audit')
    </div>

    <!-- Livewire scripts -->
    @livewireScripts

    @push('scripts')
        <script>
            Livewire.on('auditAdded', () => {
                // Perform any JavaScript actions you want to execute after the audit is added
                console.log('Audit added successfully!');
            });
        </script>
    @endpush
</body>

</html>
