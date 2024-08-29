<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Lista De Clientes</h1>
    <div class="">
        <table class="table text-start align-middle table-bordered table-hover mb-0">
            <thead>
                <tr class="text-white">
                    <th scope="col">N°</th>
                    <th scope="col">CI</th>
                    <th scope="col">NOMBRES</th>
                    <th scope="col">PRIMER APELLIDO</th>
                    <th scope="col">SEGUNDO APELLIDO</th>
                    <th scope="col">DIRECCION</th>
                    <th scope="col">EMAIL</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                        <tr>
                            <td>{{ $item->cod_cliente }}</td>
                            <td>{{ $item->ci }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->apellido1 }}</td>
                            <td>{{ $item->apellido2 }}</td>
                            <td>{{ $item->direccion }}</td>
                            <td>{{ $item->email }}</td>
                        </tr>               
                    @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
<style>
    .table-responsive {
        margin: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th, .table td {
        padding: 12px;
        text-align: left;
        border: 1px solid #dee2e6;
    }

    .table thead {
        background-color: #007bff; /* Color de fondo para el encabezado */
        color: #ffffff; /* Color del texto del encabezado */
    }

    .table tbody tr:nth-child(even) {
        background-color: #f2f2f2; /* Color de fondo alterno para las filas */
    }

    .table tbody tr:hover {
        background-color: #e9ecef; /* Color de fondo cuando se pasa el cursor sobre una fila */
    }

    .table-bordered {
        border: 1px solid #dee2e6;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1; /* Color de fondo al pasar el cursor sobre una fila en tablas con hover */
    }

    .table th {
        font-weight: bold;
        text-align: center;
    }

    .table td {
        vertical-align: middle;
    }

    .mb-0 {
        margin-bottom: 0;
    }
</style>
