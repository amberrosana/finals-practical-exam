<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
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
        font-size: 12px;
        color: #fff;
        cursor: pointer;
        padding: 0;
    }

    .message button:hover {
        opacity: 0.8; 
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
        }

        button:hover {
            background-color: #555;
        }

        .login-link {
            font-size: 14px;
            margin-top: 15px;
            color: #e0e0e0;
        }

        .login-link a {
            color: #007bff;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Register User</h1>

        @if (session()->has('success'))
        <div class="message success">
            <button onclick="this.parentElement.style.display='none'">&times;</button>
            {{ session('success') }}
        </div>
        @endif

        @if (session()->has('error'))
        <div class="message error">
            <button onclick="this.parentElement.style.display='none'">&times;</button>
            {{ session('error') }}
        </div>
        @endif

        @error('name')
        <div class="message error">
            <button onclick="this.parentElement.style.display='none'">&times;</button>
            {{ $message }}
        </div>
        @enderror

        @error('email')
        <div class="message error">
            <button onclick="this.parentElement.style.display='none'">&times;</button>
            {{ $message }}
        </div>
        @enderror

        @error('password')
        <div class="message error">
            <button onclick="this.parentElement.style.display='none'">&times;</button>
            {{ $message }}
        </div>
        @enderror

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required value="{{ old('name') }}" placeholder="Enter your name">
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required value="{{ old('email') }}" placeholder="Enter your email">
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required placeholder="Enter your password">
            </div>

            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="Confirm your password">
            </div>

            <div>
                <button type="submit">Register</button>
            </div>
        </form>

        <p class="login-link">
            Already have an account? <a href="{{ route('login.show') }}">Login here</a>
        </p>
    </div>
</body>

</html>
