<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kode Tindakan Terapi</title>
    <link rel="stylesheet" href="{{ asset('css/partials.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
</head>
<body>
<h2>Daftar Kode Tindakan Terapi</h2>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Kode</th>
        <th>Deskripsi</th>
        <th>Kategori</th>
        <th>Kategori Klinis</th>
    </tr>
    @foreach($data as $d)
    <tr>
        <td>{{ $d->idkode_tindakan_terapi }}</td>
        <td>{{ $d->kode }}</td>
        <td>{{ $d->deskripsi_tindakan_terapi }}</td>
        <td>{{ $d->kategori->nama_kategori }}</td>
        <td>{{ $d->kategoriKlinis->nama_kategori_klinis }}</td>
    </tr>
    @endforeach
</table>
</body>
</html>