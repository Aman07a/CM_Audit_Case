<div class="my-4">
    <h1 class="display-4 mb-4">Audits</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th class="col-1">ID</th>
                    <th class="col-3">Name</th>
                    <th>Question Progress Percentage</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($audits as $audit)
                    <tr>
                        <td>{{ $audit->id }}</td>
                        <td>{{ $audit->name }}</td>
                        <td>{{ $audit->question_progress_percentage }}</td>
                        <!-- Add more columns as needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
