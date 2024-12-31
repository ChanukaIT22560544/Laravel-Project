<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
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

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #007BFF;
            color: white;
            text-transform: uppercase;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #e9ecef;
        }

        button {
            padding: 8px 12px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.9;
        }

        button h5 {
            margin: 0;
        }

        a button {
            background-color: #28a745;
            color: white;
        }

        a button:hover {
            background-color: #218838;
        }

        form button {
            background-color: #dc3545;
            color: white;
        }

        form button:hover {
            background-color: #c82333;
        }

        .success-message {
            text-align: center;
            color: green;
            margin: 10px 0;
        }

        .add-user {
            display: flex;
            justify-content: center;
        }

        .add-user button {
            background-color: #007BFF;
            color: white;
        }

        .add-user button:hover {
            background-color: #0056b3;
        }


        .search-bar {
            margin-bottom: 20px;
            text-align: center;
        }

        .search-bar input {
            padding: 10px;
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .search-bar button {
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .search-bar button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <h1>User Management</h1>

    <div class="search-bar">
        <form method="GET" action="{{ url('/') }}">
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search by name or email">
            <button type="submit">🔎Search</button>
        </form>
    </div>

    <div class="add-user">
        <a href="{{ route('users.create') }}"><button><h5>➕Add New User</h5></button></a>
    </div>

    @if (session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Birthday</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->bdy }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}"><button>Edit</button></a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
