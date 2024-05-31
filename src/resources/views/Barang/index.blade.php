<!DOCTYPE html>
<html>
<head>
    <title>Data Pelanggan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
        
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Data Pelanggan</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>WhatsApp</th>
            <th>Barang</th>
            <th>Description</th>
        </tr>
        @foreach($barangs as $barang)
        <tr>
            <td>{{ $barang->name }}</td>
            <td>{{ $barang->age }}</td>
            <td>{{ $barang->email }}</td>
            <td>{{ $barang->whatsap }}</td>
            <td>{{ $barang->barang }}</td>
            <td>{{ $barang->description }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>