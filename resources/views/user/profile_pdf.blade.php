<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @page { margin: 50px; }
        body { 
            font-family: 'Helvetica', 'Arial', sans-serif; 
            font-size: 13px; 
            color: #333; 
            line-height: 1.4; 
        }
        
        /* Watermark Effect */
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 80px;
            color: rgba(240, 240, 240, 0.5);
            z-index: -1000;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Header Layout */
        .header-table { width: 100%; border-bottom: 3px solid #34495e; margin-bottom: 30px; padding-bottom: 15px; }
        .title-area { width: 70%; }
        .id-badge { 
            background: #34495e; 
            color: white; 
            padding: 5px 15px; 
            border-radius: 4px; 
            display: inline-block; 
            font-size: 12px;
            margin-top: 5px;
        }
        .user-photo { 
            width: 80px; 
            height: 80px; 
            border: 2px solid #ddd; 
            text-align: center; 
            line-height: 80px; 
            font-size: 30px; 
            background: #f9f9f9;
            border-radius: 8px;
        }

        /* Info Grid */
        .section-header {
            background: #f1f4f9;
            color: #2c3e50;
            padding: 7px 12px;
            font-weight: bold;
            border-left: 5px solid #3498db;
            margin: 20px 0 10px 0;
            text-transform: uppercase;
            font-size: 11px;
        }

        .info-table { width: 100%; margin-bottom: 10px; }
        .info-table td { padding: 8px 5px; border-bottom: 1px solid #f2f2f2; }
        .label { color: #7f8c8d; font-weight: bold; width: 30%; font-size: 11px; }
        .value { color: #2c3e50; font-weight: bold; width: 70%; }

        /* Remarks Box */
        .remarks-box {
            margin-top: 20px;
            padding: 15px;
            background: #fff9e6;
            border: 1px dashed #f1c40f;
            border-radius: 5px;
        }

        /* Footer / Signature */
        .footer { position: fixed; bottom: 0; width: 100%; border-top: 1px solid #eee; padding-top: 10px; }
        .signature-wrapper { margin-top: 50px; }
        .sig-box { float: right; width: 200px; text-align: center; }
        .line { border-top: 1px solid #333; margin-bottom: 5px; }
    </style>
</head>
<body>
    <div class="watermark">NIYD 2026</div>

    <table class="header-table">
        <tr>
            <td class="title-area">
                <h1 style="margin:0; color: #2c3e50;">Official User Profile</h1>
                <p style="margin:5px 0; color: #7f8c8d;">NIYD Educational Tour - 2026</p>
                <div class="id-badge">
                    @php
                        $prefix = $student->user_type == 'teacher' ? 'TR-' : ($student->user_type == 'staff' ? 'SF-' : 'ST-');
                    @endphp
                    ID: {{ $prefix }}{{ $student->id + 2026000 }}
                </div>
            </td>
            <td align="right">
               
            </td>
        </tr>
    </table>

    {{-- Section 1: Basic Info --}}
    <div class="section-header">Personal Information</div>
    <table class="info-table">
        <tr>
            <td class="label">FULL NAME</td>
            <td class="value">{{ strtoupper($student->name) }}</td>
            <td class="label">BLOOD GROUP</td>
            <td class="value" style="color: #e74c3c;">{{ $student->blood_group ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td class="label">PHONE NUMBER</td>
            <td class="value">{{ $student->phone_number }}</td>
            <td class="label">EMAIL</td>
            <td class="value">{{ $student->email ?? 'N/A' }}</td>
        </tr>
    </table>

    {{-- Section 2: Address --}}
    <div class="section-header">Address & Contact</div>
    <table class="info-table">
        <tr>
            <td class="label">DISTRICT</td>
            <td class="value">{{ $student->district }}</td>
            <td class="label">EMERGENCY NO</td>
            <td class="value" style="color: #e67e22;">{{ $student->emergency_contact }}</td>
        </tr>
        <tr>
            <td class="label">PRESENT ADDRESS</td>
            <td colspan="3" class="value">{{ $student->permanent_address ?? 'Not Provided' }}</td>
        </tr>
    </table>

    {{-- Section 3: Professional/Academic --}}
    <div class="section-header">{{ $student->user_type == 'student' ? 'Academic Details' : 'Professional Details' }}</div>
    <table class="info-table">
        <tr>
            <td class="label">{{ $student->user_type == 'student' ? 'ENROLLED COURSE' : 'DEPARTMENT' }}</td>
            <td class="value">{{ $student->course->name ?? $student->department ?? 'N/A' }}</td>
            <td class="label">USER TYPE</td>
            <td class="value">{{ ucfirst($student->user_type) }}</td>
        </tr>
        <tr>
            <td class="label">{{ $student->user_type == 'student' ? 'BATCH NUMBER' : 'DESIGNATION' }}</td>
            <td class="value">{{ $student->batch ?? 'N/A' }}</td>
            <td class="label">STATUS</td>
            <td class="value">
                <span style="color: {{ $student->status == 'active' ? '#27ae60' : '#f39c12' }};">
                    &#8226; {{ strtoupper($student->status ?? 'PENDING') }}
                </span>
            </td>
        </tr>
    </table>

    {{-- Remarks --}}
    @if($student->remarks)
    <div class="section-header">Administrative Remarks</div>
    <div class="remarks-box">
        <span style="font-size: 10px; color: #95a5a6; display: block; margin-bottom: 5px;">OFFICIAL NOTE:</span>
        "{{ $student->remarks }}"
    </div>
    @endif

    {{-- Signature Section --}}
    <div class="signature-wrapper">
        <table width="100%">
            <tr>
                <td width="30%">
                    <div style="font-size: 10px; color: #95a5a6; margin-top: 50px;">
                        Report Generated:<br>
                        {{ date('d M, Y h:i A') }}
                    </div>
                </td>
                <td width="40%"></td>
                <td width="30%">
                    <div class="sig-box" style="margin-top: 50px;">
                        <div class="line"></div>
                        <strong style="font-size: 11px;">Authorized Signature</strong><br>
                        <span style="font-size: 9px; color: #7f8c8d;">NIYD Authority</span>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <table width="100%">
            <tr>
                <td style="font-size: 9px; color: #bdc3c7;">
                    NIYD Tour 2026 | Document Verification Code: {{ md5($student->id) }}
                </td>
                <td align="right" style="font-size: 9px; color: #bdc3c7;">
                    Page 1 of 1
                </td>
            </tr>
        </table>
    </div>
</body>
</html>