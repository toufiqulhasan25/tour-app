<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @page { margin: 40px; }
        body { 
            font-family: 'Helvetica', 'Arial', sans-serif; 
            font-size: 12px; 
            color: #333; 
            line-height: 1.5; 
        }
        
        /* Header Section */
        .header-table { width: 100%; border-bottom: 2px solid #4e73df; margin-bottom: 30px; padding-bottom: 10px; }
        .brand-name { font-size: 24px; font-weight: bold; color: #4e73df; margin: 0; }
        .report-title { font-size: 14px; color: #666; margin-top: 5px; text-transform: uppercase; letter-spacing: 1px; }
        .date-box { text-align: right; color: #888; font-size: 11px; }

        /* Stats Section */
        .stats-container { margin-bottom: 25px; width: 100%; }
        .stats-card { 
            background: #f8f9fc; 
            border: 1px solid #e3e6f0; 
            padding: 15px; 
            border-radius: 8px;
            text-align: center;
        }
        .stat-item { display: inline-block; width: 30%; }
        .stat-label { display: block; font-size: 10px; color: #858796; font-weight: bold; text-uppercase: uppercase; }
        .stat-value { display: block; font-size: 16px; font-weight: bold; color: #4e73df; }

        /* Table Styling */
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { 
            background-color: #f1f4fb; 
            color: #4e73df; 
            padding: 12px 8px; 
            text-align: left; 
            font-weight: bold; 
            border-bottom: 2px solid #e3e6f0;
            text-transform: uppercase;
            font-size: 10px;
        }
        td { 
            padding: 10px 8px; 
            border-bottom: 1px solid #f1f1f1; 
            vertical-align: middle;
        }
        tr:nth-child(even) { background-color: #fafbfc; }

        /* Badge Styling */
        .badge { 
            padding: 4px 8px; 
            border-radius: 12px; 
            font-size: 9px; 
            font-weight: bold; 
            display: inline-block;
            text-align: center;
            width: 60px;
        }
        .status-active { background: #dcfce7; color: #15803d; }
        .status-pending { background: #fef9c3; color: #854d0e; }
        .status-rejected { background: #fee2e2; color: #b91c1c; }

        .footer { 
            position: fixed; 
            bottom: 0; 
            width: 100%; 
            text-align: center; 
            font-size: 10px; 
            color: #aaa; 
            padding: 10px 0;
            border-top: 1px solid #eee;
        }
    </style>
</head>
<body>
    {{-- Header --}}
    <table class="header-table">
        <tr>
            <td>
                <h1 class="brand-name">NIYD TOUR 2026</h1>
                <div class="report-title">Student Management Report</div>
            </td>
            <td class="date-box">
                <strong>Generated On:</strong><br>
                {{ date('d M, Y') }}<br>
                {{ date('h:i A') }}
            </td>
        </tr>
    </table>

    {{-- Summary Box --}}
    <div class="stats-container">
        <div class="stats-card">
            <div class="stat-item">
                <span class="stat-label">TOTAL STUDENTS</span>
                <span class="stat-value">{{ $stats['total'] }}</span>
            </div>
            <div class="stat-item" style="border-left: 1px solid #e3e6f0; border-right: 1px solid #e3e6f0;">
                <span class="stat-label">ACTIVE</span>
                <span class="stat-value" style="color: #1cc88a;">{{ $stats['active'] }}</span>
            </div>
            <div class="stat-item">
                <span class="stat-label">PENDING</span>
                <span class="stat-value" style="color: #f6c23e;">{{ $stats['pending'] }}</span>
            </div>
        </div>
    </div>

    {{-- Main Data Table --}}
    <table>
        <thead>
            <tr>
                <th width="5%">SL</th>
                <th width="25%">Student Name</th>
                <th width="15%">Phone</th>
                <th width="15%">District</th>
                <th width="20%">Course & Batch</th>
                <th width="10%" style="text-align: center;">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $key => $student)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>
                    <div style="font-weight: bold; color: #333;">{{ $student->name }}</div>
                    <div style="font-size: 9px; color: #888;">ID: ST-{{ $student->id + 2026000 }}</div>
                </td>
                <td>{{ $student->phone_number }}</td>
                <td>{{ $student->district }}</td>
                <td>
                    <div style="font-weight: 500;">{{ $student->course->name ?? 'N/A' }}</div>
                    <div style="font-size: 10px; color: #666;">Batch: {{ $student->batch ?? 'N/A' }}</div>
                </td>
                <td style="text-align: center;">
                    @php 
                        $st = strtolower($student->status);
                        $class = ($st == 'active') ? 'status-active' : (($st == 'pending') ? 'status-pending' : 'status-rejected');
                    @endphp
                    <span class="badge {{ $class }}">{{ strtoupper($st) }}</span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        This is a computer-generated document. &copy; {{ date('Y') }} NIYD Tour Management System.
    </div>
</body>
</html>