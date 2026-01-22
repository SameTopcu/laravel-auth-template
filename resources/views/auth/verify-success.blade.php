<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="refresh" content="3;url={{ route('dashboard', absolute: false) }}">

    <title>E-posta Doğrulandı - {{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .success-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .success-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 40px;
            animation: slideUp 0.5s ease-out;
            text-align: center;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: scaleIn 0.5s ease-out;
        }

        .success-icon svg {
            width: 50px;
            height: 50px;
            color: white;
        }

        .success-card h2 {
            color: #667eea;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .success-card .message {
            color: #666;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .countdown {
            color: #999;
            font-size: 0.9rem;
            margin-top: 20px;
        }

        .btn-dashboard {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-dashboard:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
            color: white;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.5);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @media (max-width: 576px) {
            .success-card {
                padding: 30px 20px;
            }

            .success-card h2 {
                font-size: 1.5rem;
            }

            .success-icon {
                width: 60px;
                height: 60px;
            }

            .success-icon svg {
                width: 40px;
                height: 40px;
            }
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-card">
            <div class="success-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            
            <h2>E-postanız Doğrulandı!</h2>
            <p class="message">
                E-postanız doğrulandı, 5 saniye içinde panele yönlendiriliyorsunuz.
            </p>
            
            <div class="countdown" id="countdown">5 saniye sonra yönlendirileceksiniz...</div>
            
            <a href="{{ route('dashboard', absolute: false) }}" class="btn-dashboard">
                Panele Git
            </a>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Geri sayım gösterimi
        let countdown = 5;
        const countdownElement = document.getElementById('countdown');
        
        const timer = setInterval(function() {
            countdown--;
            if (countdown > 0) {
                countdownElement.textContent = countdown + ' saniye sonra yönlendirileceksiniz...';
            } else {
                countdownElement.textContent = 'Yönlendiriliyor...';
                clearInterval(timer);
            }
        }, 1000);
    </script>
</body>
</html>
