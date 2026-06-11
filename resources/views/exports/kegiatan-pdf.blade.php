<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Kegiatan DLH</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; }
        h1 { color: #047857; font-size: 18px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 6px; text-align: left; }
        th { background: #ecfdf5; color: #047857; }
        .meta { color: #666; font-size: 10px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <h1>SIAPK-DLH — Laporan Kegiatan</h1>
    <p class="meta">Dinas Lingkungan Hidup · Dicetak: {{ $generatedAt->format('d F Y H:i') }}</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Lokasi</th>
                <th>Bidang</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Penulis</th>
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
