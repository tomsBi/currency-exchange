<html lang="en">
<head>
    <style>
        #rates {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 15%;
        }

        #rates td, #rates th {
            border: 1px solid #ffa62b;
            padding: 8px;
        }

        #rates tr:nth-child(even) {
            background-color: #f8f1f1;
        }

        #rates tr:hover {
            background-color: #16697a;
            color: white
        }

        #rates th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #16697a;
            color: #ffa62b;
        }
    </style>
    <title>Currency Exchange Rate</title>
</head>
<body>
<form method="post" action="/update">
    <button type="submit">Update</button>
</form>
<table id="rates">
    <tr>
        <th>Currency</th>
        <th>Rate</th>
    </tr>
    <tr>
        <?php foreach ($currencies

        as $currency){ ?>
        <td><?php echo $currency[1]; ?></td>
        <td><?php echo $currency[2]; ?></td>
    </tr>
    <?php } ?>
</table>
</body>
</html>
