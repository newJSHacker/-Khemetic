

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

<h1>Purchase Order List</h1>

<table>
    <tr>
        <th>sr</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Remarks</th>
    </tr>
    @foreach($user as $index => $pro)
        <tr>
            <td>{{ $index+1 }}</td>
            <td class="desc">{{ $pro->purchased_item_qty }}</td>
            <td>{{ $pro->purchased_item_price }}</td>
            <td>{{ $pro->remarks }}</td>
        </tr>
    @endforeach


</table>

</body>
</html>
