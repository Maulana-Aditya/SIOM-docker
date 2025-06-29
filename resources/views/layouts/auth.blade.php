<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login - SIOM')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* Mengambil variabel warna dari tema utama */
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

        html, body {
            height: 100%;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 51, 0.9)), url('{{ asset("assets/img/itsk.jpeg.jpg") }}') no-repeat center center fixed;
            background-size: cover;
            color: var(--white-color);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Container utama untuk kartu login */
        .auth-card {
            background-color: rgba(0, 0, 20, 0.75);
            padding: 30px 40px;
            border-radius: 12px;
            width: 100%;
            max-width: 450px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            backdrop-filter: blur(4px);
        }
        
        /* Header kartu: Logo dan judul */
        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .auth-header h3 {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 5px;
        }
        
        .auth-header p {
            color: var(--light-text);
            font-size: 0.9rem;
        }

        /* Styling untuk form */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--light-text);
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            background-color: rgba(255, 255, 255, 0.05);
            color: var(--white-color);
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(0, 216, 255, 0.2);
        }
        
        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875em;
            display: block;
            margin-top: .25rem;
        }

        /* Tombol Login */
        .btn-primary {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background-color: var(--primary-color);
            color: #000;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }
        
        .btn-primary:hover {
            background-color: #00b8d4;
            color: var(--white-color);
        }

        /* Link "Lupa Password" dan lainnya */
        .text-small {
            font-size: 0.85rem;
            color: var(--light-text);
            text-decoration: none;
        }
        
        .text-small:hover {
            color: var(--primary-color);
        }
        
        /* Footer kartu: Link untuk daftar */
        .auth-footer {
            margin-top: 25px;
            text-align: center;
            font-size: 0.9rem;
            color: var(--light-text);
        }
        
        .auth-footer a {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
        }

        /* Remember me checkbox */
        .custom-control-label {
             color: var(--light-text);
        }

    </style>
</head>
<body>

    @yield('content')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 800,
        once: true
      });
    </script>
</body>
</html>