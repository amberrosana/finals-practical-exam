<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Post</title>
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

        input, textarea {
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

        input:focus, textarea:focus {
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
        <h1>Create Post</h1>

        @if (session()->has('success'))
            <div class="message success">
                <button onclick="this.parentElement.style.display='none'">&times;</button>
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="message error">
                <button onclick="this.parentElement.style.display='none'">&times;</button>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('post.store') }}" method="POST">
            @csrf
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required placeholder="Enter the title">
            </div>

            <div>
                <label for="body">Body</label>
                <textarea name="body" id="body" rows="4" required placeholder="Enter the post content">{{ old('body') }}</textarea>
            </div>

            <div>
                <button type="submit">Create Post</button>
            </div>
        </form>
    </div>
</body>

</html>
