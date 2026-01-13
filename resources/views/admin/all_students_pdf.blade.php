<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        .stats-box { margin-bottom: 20px; padding: 10px; background: #f8f9fc; border: 1px solid #e3e6f0; }
        table { width: 100%; border-collapse: collapse; }
        th { background-color: #4e73df; color: white; padding: 8px; text-align: left; }
        td { padding: 8px; border-bottom: 1px solid #eee; }
        .badge { padding: 3px 7px; border-radius: 4px; font-size: 10px; font-weight: bold; }
        .active { background: #d4edda; color: #155724; }
        .pending { background: #fff3cd; color: #856404; }
    </style>
</head>
<body>
    <div class="header">
        <h2>NIYD Student Management Report</h2>
        <p>Report Generated Date: {{ date('d M, Y') }}</p>
    </div>

    <div class="stats-box">
        <strong>Summary:</strong> 
        Total: {{ $stats['total'] }} | 
        Active: {{ $stats['active'] }} | 
        Pending: {{ $stats['pending'] }}
    </div>

    <table>
        <thead>
            <tr>
                <th>SL</th>
                <th>Student Name</th>
                <th>Phone</th>
                <th>District</th>
                <th>Course</th>
                <th>Batch</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $key => $student)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->phone_number }}</td>
                <td>{{ $student->district }}</td>
                <td>{{ $student->course->name ?? 'N/A' }}</td>
                <td>{{ $student->batch ?? 'N/A' }}</td>
                <td>{{ strtoupper($student->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>