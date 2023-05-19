<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Stock Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f8f8f8;
        }
        
        h1 {
            color: #333;
        }
        
        p {
            color: #666;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Stock Notification</h1>
        
        <p>Dear Admin,</p>
        
        <p>This is to inform you that the stock quantity for product "{{ $stockName }}" is below 5. The current quantity is {{ $quantity }}. Please take necessary actions to replenish the stock.</p>
        
        <p>Thank you for your attention.</p>
        
        <p>Sincerely,</p>
        <p>Stock Management System</p>
    </div>
</body>
</html>

