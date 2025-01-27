<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
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
            max-width: 600px;
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h1 {
            font-size: 24px;
            color: #fff;
            margin-bottom: 20px;
        }

        .success {
            background: #3d9140;
            color: #e0e0e0;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #3d9140;
            border-radius: 5px;
            position: relative;
        }

        .success button {
            background: none;
            border: none;
            font-size: 16px;
            font-weight: bold;
            position: absolute;
            top: 5px;
            right: 10px;
            cursor: pointer;
            color: #e0e0e0;
        }

        p {
            color: #e0e0e0;
            margin-bottom: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            background: #444;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #333;
            border-radius: 5px;
            text-align: left;
        }

        li h3 {
            margin: 0 0 10px;
            color: #fff;
            font-size: 18px;
        }

        li p {
            margin: 0 0 10px;
            color: #ccc;
        }

        .timestamp {
            font-size: 12px;
            color: #999;
            margin-top: 10px;
        }

        a, button {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            background: #444;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        a:hover, button:hover {
            background: #555;
        }

        .delete-button {
            background: #dc3545;
        }

        .delete-button:hover {
            background: #b02a37;
        }

        .create-button {
            background: #28a745;
        }

        .create-button:hover {
            background: #1e7e34;
        }

        .posts {
            max-height: 400px;  
            overflow-y: auto;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="messages">
            @if (session('success'))
                <div class="success">
                    <button onclick="this.parentElement.style.display='none'">&times;</button>
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <h1>Welcome to Your Dashboard, {{ Auth::user()->name }}!</h1>
        <p>Manage your posts or log out when you're done.</p>

        <div class="posts">
            <h2>Your Posts</h2>
            @if ($posts->isEmpty())
                <p>You don't have any posts yet.</p>
                <a href="{{ route('post.create') }}" class="create-button">Create Your First Post</a>
            @else
                <ul>
                    @foreach ($posts as $post)
                        <li>
                            <h3>{{ $post->title }}</h3>
                            <p>{{ $post->body }}</p>
                            <div class="timestamp">
                                <strong>Created at:</strong> {{ $post->created_at->format('F j, Y, g:i a') }}
                            </div>
                            <div>
                                <a href="{{ route('post.edit', $post->id) }}">Edit</a>
                                <form action="{{ route('post.delete', $post->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button">Delete</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('post.create') }}" class="create-button">Create New Post</a>
            @endif
        </div>

        <form action="{{ route('logout') }}" method="POST" style="margin-top: 20px;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</body>

</html>
