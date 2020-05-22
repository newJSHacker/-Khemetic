

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

<h1>GRN</h1>

<table>
    <tr>
        <th>sr</th>
        <th>Item Code</th>
        <th>Quantity</th>
        <th>Serial No.</th>
    </tr>
    @foreach($user as $index => $pro)
        <tr>
            <td>{{ $index+1 }}</td>
            <td class="desc">{{ $pro->received_item_code }}</td>
            <td>{{ $pro->received_item_qty }}</td>
            <td>{{ $pro->serial_num }}</td>
        </tr>
    @endforeach


</table>

</body>
</html>
