<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1e1e1e;
            color: #e0e0e0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #2c2c2c;
            padding: 20px;
            width: 100%;
            max-width: 400px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
            text-align: center;
            box-sizing: border-box;
        }

        h1 {
            font-size: 24px;
            color: #fff;
            margin-bottom: 20px;
        }

        .message {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            font-size: 14px;
            text-align: left;
            position: relative;
        }

        .message button {
            position: absolute;
            top: 5px;
            right: 5px;
            background: transparent;
            border: none;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
        }

        .success {
            background-color: #3d9140;
            color: #e0e0e0;
        }

        .error {
            background-color: #a94442;
            color: #e0e0e0;
        }

        form {
            text-align: left;
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
            color: #fff;
        }

        input {
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #444;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            background-color: #333;
            color: #e0e0e0;
            box-sizing: border-box;
        }

        input:focus {
            border-color: #6c757d;
            outline: none;
        }

        button {
            padding: 10px;
            background-color: #444;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            margin: 0 auto;
            text-align: center;
        }

        button:hover {
            background-color: #555;
        }

        .register-link {
            font-size: 14px;
            margin-top: 15px;
            color: #e0e0e0;
        }

        .register-link a {
            color: #007bff;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>

        @if (session()->has('success'))
        <div class="message success">
            <button onclick="this.parentElement.style.display='none'">&times;</button>
            {{ session('success') }}
        </div>
        @endif

        <!-- Display errors for email or password -->
        @if ($errors->any())
        <div class="message error">
            <button onclick="this.parentElement.style.display='none'">&times;</button>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required value="{{ old('email') }}" placeholder="Enter your email">
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required placeholder="Enter your password">
            </div>

            <div>
                <button type="submit">Login</button>
            </div>
        </form>

        <p class="register-link">
            Don't have an account? <a href="{{ route('register.show') }}">Register here</a>
        </p>
    </div>
</body>

</html>
