<div>
    <h3>Sizning Natijalaringiz</h3>
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Test ID</th>
            <th>To'g'ri Javoblar</th>
            <th>Umumiy Savollar</th>
            <th>Foiz</th>
            <th>Sana</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($results as $index => $result)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $result->quiz_id }}</td>
                <td>{{ $result->correct_answers }}</td>
                <td>{{ $result->total_questions }}</td>
                <td>{{ number_format($result->score, 2) }}%</td>
                <td>{{ $result->created_at->format('Y-m-d H:i') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
