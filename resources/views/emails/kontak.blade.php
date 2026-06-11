<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f1f5f9; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .header { background: linear-gradient(135deg, #059669, #10b981); padding: 30px; text-align: center; }
        .header h1 { color: #ffffff; margin: 0; font-size: 22px; }
        .header p { color: #d1fae5; margin: 8px 0 0; font-size: 13px; }
        .body { padding: 30px; }
        .field { margin-bottom: 20px; }
        .field-label { font-size: 12px; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px; }
        .field-value { font-size: 15px; color: #1e293b; line-height: 1.6; }
        .message-box { background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px; margin-top: 8px; }
        .message-box p { margin: 0; color: #334155; font-size: 14px; line-height: 1.7; white-space: pre-wrap; }
        .footer { background: #f8fafc; padding: 20px 30px; text-align: center; border-top: 1px solid #e2e8f0; }
        .footer p { margin: 0; font-size: 12px; color: #94a3b8; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📩 Pesan Baru dari Website</h1>
            <p>SIAPK-DLH - Formulir Kontak</p>
        </div>
        <div class="body">
            <div class="field">
                <div class="field-label">Nama Pengirim</div>
                <div class="field-value">{{ $nama }}</div>
            </div>
            <div class="field">
                <div class="field-label">Email Pengirim</div>
                <div class="field-value"><a href="mailto:{{ $email }}" style="color: #059669; text-decoration: none;">{{ $email }}</a></div>
            </div>
            <div class="field">
                <div class="field-label">Subjek</div>
                <div class="field-value">{{ $subjek }}</div>
            </div>
            <div class="field">
                <div class="field-label">Isi Pesan</div>
                <div class="message-box">
                    <p>{{ $pesan }}</p>
                </div>
            </div>
        </div>
        <div class="footer">
            <p>Email ini dikirim melalui formulir kontak di website SIAPK-DLH.<br>Balas langsung ke email ini untuk merespon pengirim.</p>
        </div>
    </div>
</body>
</html>
