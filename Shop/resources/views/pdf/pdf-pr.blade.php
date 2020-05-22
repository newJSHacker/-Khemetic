

<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h1>Purchase Request </h1>

<table>
    <tr>
        <th>sr</th>
        <th>Item</th>
        <th>Quantity</th>
    </tr>
    @foreach($user as $index => $pro)
        <tr>
            <td>{{ $index+1 }}</td>
            <td class="desc">{{ $pro->purchase_requested_item }}</td>
            <td>{{ $pro->purchase_requested_qty }}</td>
        </tr>
    @endforeach


</table>

</body>
</html>
