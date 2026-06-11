<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Print Laporan Kegiatan DLH</title>
    <style>
        body { font-family: system-ui, sans-serif; padding: 20px; }
        h1 { color: #047857; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; font-size: 13px; }
        th { background: #ecfdf5; }
        @media print { .no-print { display: none; } }
    </style>
</head>
<body>
    <button class="no-print" onclick="window.print()" style="padding:8px 16px;background:#047857;color:white;border:none;border-radius:6px;cursor:pointer;margin-bottom:16px;">Cetak</button>
    <h1>SIAPK-DLH — Laporan Kegiatan</h1>
    <p style="color:#666;">Dicetak: {{ $generatedAt->format('d F Y H:i') }}</p>
    <table>
        <thead>
            <tr>
                <th>No</th><th>Judul</th><th>Kategori</th><th>Lokasi</th><th>Bidang</th><th>Tanggal</th><th>Status</th><th>Penulis</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kegiatan as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->kategori?->nama }}</td>
                    <td>{{ $item->lokasi?->nama }}</td>
                    <td>{{ $item->bidang?->nama }}</td>
                    <td>{{ $item->tanggal_kegiatan->format('d/m/Y') }}</td>
                    <td>{{ ucfirst($item->status) }}</td>
                    <td>{{ $item->user?->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
