
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>E-posta Doğrulama - {{ config('app.name', 'Laravel') }}</title>

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

        .verify-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .verify-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 40px;
            animation: slideUp 0.5s ease-out;
        }

        .verify-card h2 {
            color: #667eea;
            font-weight: 700;
            margin-bottom: 10px;
            text-align: center;
        }

        .verify-card .subtitle {
            color: #999;
            text-align: center;
            margin-bottom: 30px;
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .btn-verify {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px;
            font-weight: 600;
            border-radius: 8px;
            width: 100%;
            transition: all 0.3s ease;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .btn-verify:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-logout {
            background-color: transparent;
            color: #999;
            border: 2px solid #e0e0e0;
            padding: 10px;
            font-weight: 600;
            border-radius: 8px;
            width: 100%;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-logout:hover {
            border-color: #667eea;
            color: #667eea;
        }

        .alert-success {
            background-color: #d4edda;
            border: 2px solid #28a745;
            color: #155724;
            border-radius: 8px;
            padding: 12px 15px;
            margin-bottom: 20px;
        }

        .button-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
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

        @media (max-width: 576px) {
            .verify-card {
                padding: 30px 20px;
            }

            .verify-card h2 {
                font-size: 1.5rem;
            }

            .verify-card .subtitle {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="verify-container">
        <div class="verify-card">
            <h2>E-posta Doğrulama</h2>
            <p class="subtitle">
                Devam etmeden önce, size gönderdiğimiz bağlantıya tıklayarak e-posta adresinizi doğrulayabilir misiniz? 
                Eğer e-posta gelmediyse, yenisini memnuniyetle göndeririz.
            </p>

            <!-- Status Message -->
            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Kayıt sırasında verdiğiniz e-posta adresine yeni bir doğrulama bağlantısı gönderildi.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Kapat"></button>
                </div>
            @endif

            <div class="button-group">
                <!-- Resend Email -->
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-verify">
                        Doğrulama E-postasını Tekrar Gönder
                    </button>
                </form>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-logout">
                        Çıkış Yap
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>