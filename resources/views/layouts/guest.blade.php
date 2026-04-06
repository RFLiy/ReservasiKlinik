<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jglow Clinic - Autentikasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/all.min.css">

    <style>
        :root { --gold-main: #a38944; --gold-dark: #8b7336; }

        body {
            background-color: #f4f1ea;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .auth-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            background-color: white;
        }

        .form-control {
            border: 1.5px solid #dee2e6;
            padding: 10px 20px;
            border-radius: 50px;
            transition: 0.3s;
        }

        .form-control:focus {
            border-color: var(--gold-main);
            box-shadow: 0 0 0 0.25rem rgba(163, 137, 68, 0.2);
        }

        .btn-gold {
            background-color: var(--gold-main);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 10px 30px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-gold:hover {
            background-color: var(--gold-dark);
            transform: translateY(-2px);
            color: white;
        }

        .text-gold { color: var(--gold-main); }
    </style>
</head>
<body>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-9 auth-card shadow-lg">
                {{ $slot }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
