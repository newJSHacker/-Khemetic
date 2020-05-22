

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
<h1 style="padding-left: 40%;  background-color: #dddddd;">Invoice</h1>
<h3>Customer:
    @foreach($customer as $c)
    <span style="font-weight: normal">{{$c->customer_name}}</span>
@endforeach </h3>

<table>
    <tr>
        <th>sr</th>
        <th>Item Code</th>
        <th>Item</th>
        <th>Quantity</th>
        <th>Total</th>
    </tr>
    @foreach($invoice as $index => $inv)
        <tr>
            <td>{{ $index+1 }}</td>
            <td class="desc">{{ $inv->item_code }}</td>
            <td class="desc">{{ $inv->item_name }}</td>
            <td>{{ $inv->item_qty }}</td>
            <td>{{ $inv->item_price }}</td>
        </tr>
    @endforeach

<h3 style="float: right">Grand Total:
    @foreach($i as  $i)
       <span style="font-weight: normal">{{ $i->total_amount }}</span>
    @endforeach</h3>

</table>

</body>
</html>
