<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            color: #333;
        }

        h1 {
            color: #007BFF;
            text-align: center;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"], input[type="email"], input[type="tel"], input[type="date"]{
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        ul {
            color: red;
            list-style-type: none;
            padding: 0;
            margin-bottom: 20px;
        }

        ul li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <h1>Edit User</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}">

        <label for="phone">Phone:</label>
        <input type="tel" name="phone" id="phone" value="{{ old('phone', $user->phone) }}">

        <label for="bdy">Birthday:</label>
        <input type="date" name="bdy" id="bdy" value="{{ old('bdy', $user->bdy) }}">
        
        <button type="submit">Update User</button>
    </form>
</body>
</html>
