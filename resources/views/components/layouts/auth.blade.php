<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Optimize') }}</title>
    @livewireStyles
    <style>
        :root {
            --primary: #3b82f6;
            --primary-hover: #2563eb;
            --bg-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --glass-bg: rgba(255, 255, 255, 0.95);
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --border-color: #e5e7eb;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: var(--bg-gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }

        .card {
            width: 100%;
            max-width: 600px; /* Increased max-width for more space */
            padding: 40px;
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .card h2 {
            font-size: 1.875rem;
            font-weight: 800;
            color: var(--text-main);
            margin-bottom: 8px;
        }

        .card p.subtitle {
            color: var(--text-muted);
            margin-bottom: 32px;
            font-size: 0.95rem;
        }
        
        /* Added for the two-column grid */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-full-width {
            grid-column: span 2;
        }

        .form-group {
            margin-bottom: 0px; /* Removed bottom margin from individual group */
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-main);
        }

        input {
            width: 100%;
            padding: 12px 16px;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            background: #f9fafb;
            font-size: 1rem;
            transition: all 0.2s ease;
            box-sizing: border-box; 
        }

        input:focus {
            outline: none;
            background: #ffffff;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
        }

        button {
            width: 100%;
            padding: 14px;
            margin-top: 20px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        button:hover {
            background: var(--primary-hover);
            transform: translateY(-1px);
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
        }

        .error {
            color: #ef4444;
            font-size: 0.75rem;
            font-weight: 500;
            margin-top: 6px;
        }

        .footer-text {
            margin-top: 24px;
            font-size: 0.875rem;
            color: var(--text-muted);
            text-align: center;
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            .form-grid {
                grid-template-columns: 1fr; /* Stack columns on mobile */
            }
            .form-full-width {
                grid-column: span 1;
            }
            .card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <main>
        {{ $slot }}
    </main>
    @livewireScripts
</body>
</html>
