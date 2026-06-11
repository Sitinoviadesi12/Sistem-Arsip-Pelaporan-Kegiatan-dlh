<?php

$replacements = [
    'app/Livewire/Admin/Dokumentasi/Index.php' => [
        31 => 'Dokumentasi berhasil dihapus.'
    ],
    'app/Livewire/Admin/Kategori/Index.php' => [
        73 => 'Kategori berhasil diperbarui.',
        81 => 'Kategori berhasil ditambahkan.',
        92 => 'Kategori berhasil dihapus.',
    ],
    'app/Livewire/Admin/Kegiatan/Form.php' => [
        124 => 'Kegiatan berhasil diperbarui.',
        129 => 'Kegiatan berhasil dibuat.',
    ],
    'app/Livewire/Admin/Kegiatan/Index.php' => [
        59 => 'Kegiatan berhasil dipublish.',
        67 => 'Kegiatan dikembalikan ke draft.',
        82 => 'Kegiatan berhasil dihapus.',
    ],
    'app/Livewire/Admin/Kegiatan/Show.php' => [
        32 => 'Kegiatan dipublish ke website publik.',
        40 => 'Kegiatan di-unpublish.',
        64 => 'Dokumentasi berhasil diunggah.',
        72 => 'Dokumentasi dihapus.',
    ],
    'app/Livewire/Admin/Lokasi/Index.php' => [
        73 => 'Lokasi berhasil diperbarui.',
        81 => 'Lokasi berhasil ditambahkan.',
        92 => 'Lokasi berhasil dihapus.',
    ],
    'app/Livewire/Admin/Pengaturan/Index.php' => [
        43 => 'Profil berhasil diperbarui.',
        58 => 'Password berhasil diperbarui.',
    ]
];

foreach ($replacements as $file => $lines) {
    $filePath = __DIR__ . '/' . $file;
    if (!file_exists($filePath)) continue;
    $content = file($filePath);
    foreach ($lines as $lineNum => $msg) {
        // Find empty message and replace with correct one
        $content[$lineNum - 1] = str_replace("'message' => ''", "'message' => '" . $msg . "'", $content[$lineNum - 1]);
    }
    file_put_contents($filePath, implode("", $content));
}
echo "Fixed.\n";
