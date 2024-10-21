<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      color: #333;
    }
    .container {
      width: 100%;
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #ffffff;
      margin-top: 10px;
      margin-bottom: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .header {
      text-align: center;
      background-color: #cc000e;
      color: #ffffff;
      padding: 10px 0;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }
    .header h1 {
      margin: 0;
      font-size: 24px;
    }
    .content {
      padding: 20px;
      text-align: center;
    }
    .content p {
      font-size: 16px;
      line-height: 1.6;
    }
    .reset-button {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #cc000e;
      color: #ffffff;
      text-decoration: none;
      border-radius: 5px;
      font-size: 18px;
    }
    .reset-button:hover {
      background-color: #8a020c;
    }
    .footer {
      margin-top: 20px;
      font-size: 12px;
      color: #666666;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>{{$data['subject']}}</h1>
    </div>
    <div class="content">
      <p>Hi {{$data['first_name']}},</p>
      @if ($data['is_created'])
        <p>We received your registration for a new account.</p>
      @else
        <p>We received a request to reset your password.</p>
      @endif
      <p>Click the button below to reset new password for your account.</p>
      <a href="{{env('FRONTEND_APP_BASE_URL')}}/auth/reset_password?token={{$data['token']}}" class="reset-button">Reset password</a>
      <p>If you didn't request this, please ignore this email.</p>
    </div>
    <div class="footer">
      <p>If you have any questions, feel free to contact our support team.</p>
      <p>supports@publicofgamer.com</p>
      <p>Thank you!</p>
    </div>
  </div>
</body>
</html>