<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body { font-family: 'sans-serif'; font-size: 14px; color: #333; line-height: 1.6; }
        .header { text-align: center; border-bottom: 2px solid #4A90E2; padding-bottom: 20px; margin-bottom: 20px; }
        .header h2 { margin: 0; color: #4A90E2; text-transform: uppercase; }
        .header p { margin: 5px 0 0; font-weight: bold; color: #666; }
        
        .section-title { 
            background: #f8f9fa; 
            padding: 8px 12px; 
            font-weight: bold; 
            color: #4A90E2;
            border-left: 4px solid #4A90E2;
            margin-top: 25px;
            text-transform: uppercase;
            font-size: 12px;
        }
        
        table { width: 100%; margin-top: 10px; border-collapse: collapse; }
        td { padding: 10px; border-bottom: 1px solid #f0f0f0; vertical-align: top; }
        .label { font-weight: bold; color: #555; width: 35%; }
        .content { color: #000; }
        
        .footer { margin-top: 60px; width: 100%; }
        .signature-box { float: right; text-align: center; width: 200px; }
        .signature-line { border-top: 1px solid #000; padding-top: 5px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Student Official Profile</h2>
        <p>Student ID: ST-{{ $student->id + 2024000 }}</p>
    </div>

    <div class="section-title">Personal Information</div>
    <table>
        <tr>
            <td class="label">Full Name:</td>
            <td class="content">{{ $student->name }}</td>
        </tr>
        <tr>
            <td class="label">Phone Number:</td>
            <td class="content">{{ $student->phone_number }}</td>
        </tr>
        <tr>
            <td class="label">Blood Group:</td>
            <td class="content">{{ $student->blood_group ?? 'N/A' }}</td>
        </tr>
    </table>

    <div class="section-title">Address Details</div>
    <table>
        <tr>
            <td class="label">Village:</td>
            <td class="content">{{ $student->village ?? 'Not Provided' }}</td>
        </tr>
        <tr>
            <td class="label">District:</td>
            <td class="content">{{ $student->district }}</td>
        </tr>
    </table>

    <div class="section-title">Academic & Enrollment</div>
    <table>
        <tr>
            <td class="label">Enrolled Course:</td>
            <td class="content">{{ $student->course->name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td class="label">Batch Number:</td>
            <td class="content">{{ $student->batch ?? 'Awaiting Batch' }}</td>
        </tr>
        <tr>
            <td class="label">Admission Status:</td>
            <td class="content" style="color: {{ $student->status == 'active' ? 'green' : 'orange' }}; font-weight: bold;">
                {{ strtoupper($student->status) }}
            </td>
        </tr>
    </table>

    @if($student->remarks)
    <div class="section-title">Administrative Remarks</div>
    <div style="padding: 10px; font-style: italic; color: #666;">
        "{{ $student->remarks }}"
    </div>
    @endif

    <div class="footer">
        <div class="signature-box">
            <p style="margin-bottom: 40px;"></p>
            <div class="signature-line">Authorized Signature</div>
            <p style="font-size: 10px; color: #888;">Generated on: {{ date('d M, Y') }}</p>
        </div>
    </div>
</body>
</html>