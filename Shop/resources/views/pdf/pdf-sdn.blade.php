

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

<h1>SDN</h1>

<table>
    <tr>
        <th>sr</th>
        <th>Item Code</th>
        <th>Quantity</th>
        <th>Invoice Number</th>
    </tr>
    @foreach($user as $index => $sdn)
        <tr>
            <td>{{ $index+1 }}</td>
            <td class="desc">{{ $sdn->sales_delivered_item }}</td>
            <td>{{ $sdn->sales_delivered_qty }}</td>
            <td>{{ $sdn->sales_inv_code}}</td>
        </tr>
    @endforeach


</table>

</body>
</html>
