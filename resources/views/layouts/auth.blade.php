<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login - SIOM')</title>

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    :root {
        --primary-color: #00d8ff;
        --dark-blue: #000033;
        --light-text: #e0e0e0;
        --white-color: #ffffff;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
    height: 100vh;
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 51, 0.85)),
                url('{{ asset("assets/img/itsk.jpeg.jpg") }}') no-repeat center center fixed;
    background-size: cover;
    color: var(--white-color);
}

    body.login-page {
        height: 100vh;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 51, 0.85)),
                    url('{{ asset("assets/img/itsk.jpeg.jpg") }}') no-repeat center center fixed;
        background-size: cover;
    }

    .auth-card {
        background-color: rgba(0, 0, 20, 0.75);
        padding: 30px 40px;
        border-radius: 12px;
        max-width: 450px;
        width: 100%;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(6px);
    }

    .form-control {
        background-color: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.2);
        color: #fff;
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    .form-control:focus {
        background-color: rgba(255,255,255,0.08) !important;
        color: #fff !important;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(0,216,255,0.3);
    }

    .btn-primary {
        background-color: var(--primary-color);
        color: #000;
        border: none;
    }

    .btn-primary:hover {
        background-color: #00b8d4;
        color: #fff;
    }

    .text-small {
        font-size: 0.9rem;
        color: var(--light-text);
    }

    .text-small:hover {
        color: var(--primary-color);
    }

    .overlay-container {
        min-height: 100vh;
        padding: 50px 20px;
        background-color: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(3px);
    }

    /* Autofill fix */
    input:-webkit-autofill,
    textarea:-webkit-autofill,
    select:-webkit-autofill {
        background-color: rgba(255,255,255,0.08) !important;
        -webkit-box-shadow: 0 0 0 1000px rgba(255,255,255,0.08) inset !important;
        -webkit-text-fill-color: #fff !important;
        transition: background-color 5000s ease-in-out 0s;
    }
    select.form-control {
        background-color: rgba(255, 255, 255, 0.08);
        color: #fff;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    /* Tambahan penting */
    select.form-control option {
        background-color: #111 !important; /* Warna dropdown item */
        color: white !important;           /* Warna teks item */
    }
</style>

    @stack('styles')
</head>
<body class="{{ request()->is('login') ? 'login-page' : '' }}">
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>
    @stack('scripts')
</body>
</html>
