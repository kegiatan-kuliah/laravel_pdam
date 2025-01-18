<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report</title>
  <style>
    table {
      width: 100%;
    }
    table, td {
      border: 1px solid;
    }
  </style>
</head>
<body>
    <h1 style="text-align:center;">Bill Report</h1>
    <table>
      <thead>
        <tr>
          <td>No</td>
          <td>Bill Date</td>
          <td>Due Date</td>
          <td>Customer</td>
          <td>Water Usage</td>
          <td>Total Amount</td>
          <td>Status</td>
        </tr>
      </thead>
      <tbody>
        @foreach($bills as $index => $bill)
          <tr>
            <td>{{ $index }}</td>
            <td>{{ $bill->bill_date }}</td>
            <td>{{ $bill->due_date }}</td>
            <td>{{ $bill->customer->name }}</td>
            <td>{{ $bill->monthlyReading->water_usage }}</td>
            <td>{{ $bill->total_amount }}</td>
            <td>{{ $bill->status }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
</body>
</html>