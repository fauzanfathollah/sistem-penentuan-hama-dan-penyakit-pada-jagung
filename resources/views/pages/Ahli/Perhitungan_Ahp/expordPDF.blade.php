<!DOCTYPE html>
<html>
<head>
    <title>Hasil Keputusan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h3>Hasil Keputusan</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kriteria</th>
                <th>Bobot</th>
                <th>Gejala</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hasilKriteria as $index => $hasil)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $hasil['kriteria'] }}</td>
                    <td>{{ $hasil['bobot'] }}</td>
                    <td>{{ $hasil['gejala'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Alternatif Penyakit</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Penyakit</th>
                <th>Bobot</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hasilAlternatif as $index => $hasil)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $hasil['nama'] }}</td>
                    <td>{{ $hasil['bobot'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <strong>Kesimpulan: {{ $kesimpulan }}</strong>
</body>
</html>
