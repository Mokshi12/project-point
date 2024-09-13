<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    
    <h2>Payment Details</h2>
    <table>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Full Name</td>
            <td><?php echo $_POST['full_name']; ?></td>
        </tr>
        <tr>
            <td>Name on Card</td>
            <td><?php echo $_POST['name_on_card']; ?></td>
        </tr>
        <tr>
            <td>Card Number</td>
            <td><?php echo $_POST['card_number']; ?></td>
        </tr>
        <tr>
            <td>Card CVV</td>
            <td><?php echo $_POST['card_cvv']; ?></td>
        </tr>
        <tr>
            <td>Expiration Month</td>
            <td><?php echo $_POST['exp_month']; ?></td>
        </tr>
        <tr>
            <td>Expiration Year</td>
            <td><?php echo $_POST['exp_year']; ?></td>
        </tr>
        <tr>
            <td>Amount</td>
            <td><?php echo $_POST['amount']; ?></td>
        </tr>
        <tr>
            <td>Contact Number</td>
            <td><?php echo $_POST['contactnumber']; ?></td>
        </tr>
    </table>
</body>
</html>
