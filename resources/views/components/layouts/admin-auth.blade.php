<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SwissPixel | Admin Login</title>

    @livewireStyles

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #eef2f7, #dfe7f2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            width: 100%;
            max-width: 420px;
            padding: 30px;
            background: #ffffff;
            border-radius: 14px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 35px 70px rgba(0,0,0,0.2);
        }

        .card h2 {
            margin-bottom: 25px;
            color: #1f2937;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            color: #374151;
            text-align: center;
        }

        input {
            width: 88%;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            outline: none;
            margin: 0 auto;
            display: block;
            transition: border 0.2s ease, box-shadow 0.2s ease;
            text-align: center;
        }

        input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.25);
        }

        button {
            width: 88%;
            padding: 12px;
            margin: 15px auto 0;
            display: block;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(37,99,235,0.35);
        }

        .error {
            margin-top: 6px;
            color: #dc2626;
            font-size: 0.85rem;
            text-align: center;
        }

        .footer-text {
            margin-top: 18px;
            font-size: 0.9rem;
        }

        .footer-text a {
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
        }

        .footer-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    {{ $slot }}

    @livewireScripts
</body>
</html>
