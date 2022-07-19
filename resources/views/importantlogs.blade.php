<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Admin Dashboard</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <p class="navbar-brand">Custom-Admin-Application</p>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/admin-logs">Admin Logs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/theme-logs">Theme Logs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/important-logs">Important Event Logs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/staff-logs">Staff Logs</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<section class="table">
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Event</th>
            <th scope="col">Date</th>
            <th scope="col">Author</th>
            <th scope="col">Abstract</th>
        </tr>
        </thead>
        @foreach($importantLogs as $importantLog)
            <tbody>
            <td>{{ ucfirst($importantLog['subject_type'])  }}</td>
            <td>{{ $importantLog['created_at']  }}</td>
            <td>{{ $importantLog['author'] }}</td>
            <td>{{ ucfirst($importantLog['description']) }}</td>
            </tbody>
        @endforeach
    </table>
</section>
</body>

