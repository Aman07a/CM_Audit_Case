<!-- resources/views/livewire/customer-table.blade.php -->

<div>
    <h1>Customers</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Company Name</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->company_name }}</td>
                    <!-- Add more columns as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
