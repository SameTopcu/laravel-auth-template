<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Giriş Yap - {{ config('app.name', 'Laravel') }}</title>

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

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 40px;
            animation: slideUp 0.5s ease-out;
        }

        .login-card h2 {
            color: #667eea;
            font-weight: 700;
            margin-bottom: 10px;
            text-align: center;
        }

        .login-card .subtitle {
            color: #999;
            text-align: center;
            margin-bottom: 30px;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            color: #333;
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
            color: #333;
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .form-control.is-invalid:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.15);
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
        }

        .form-check {
            margin-bottom: 20px;
        }

        .form-check-input {
            width: 18px;
            height: 18px;
            border: 2px solid #e0e0e0;
            cursor: pointer;
            margin-top: 0.3rem;
        }

        .form-check-input:checked {
            background-color: #667eea;
            border-color: #667eea;
        }

        .form-check-label {
            color: #666;
            cursor: pointer;
            margin-left: 8px;
        }

        .forgot-password {
            text-align: right;
            margin-bottom: 20px;
        }

        .forgot-password a {
            color: #667eea;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .forgot-password a:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px;
            font-weight: 600;
            border-radius: 8px;
            width: 100%;
            transition: all 0.3s ease;
            margin-top: 10px;
            cursor: pointer;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .signup-link {
            text-align: center;
            margin-top: 25px;
            color: #999;
        }

        .signup-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .signup-link a:hover {
            color: #764ba2;
        }

        .alert-success {
            background-color: #d4edda;
            border: 2px solid #28a745;
            color: #155724;
            border-radius: 8px;
            padding: 12px 15px;
            margin-bottom: 20px;
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
            .login-card {
                padding: 30px 20px;
            }

            .login-card h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Kapat"></button>
                </div>
            @endif

            <h2>Giriş Yap</h2>
            <p class="subtitle">Hesabınıza giriş yapın</p>

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <label for="email">E-posta</label>
                    <input 
                        type="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        required 
                        autofocus
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Şifre</label>
                    <input 
                        type="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        id="password" 
                        name="password" 
                        required
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="form-check">
                    <input 
                        class="form-check-input" 
                        type="checkbox" 
                        id="remember" 
                        name="remember" 
                        {{ old('remember') ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="remember">
                        Beni Hatırla
                    </label>
                </div>

                <!-- Forgot Password Link -->
                <div class="forgot-password">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Şifremi Unuttum?</a>
                    @endif
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-login">Giriş Yap</button>
            </form>

            <!-- Sign Up Link -->
            <div class="signup-link">
                Hesabınız yok mu? 
                <a href="{{ route('register') }}">Kayıt Ol</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- HTML5 Validation Messages in Turkish -->
    <script>
        // HTML5 doğrulama mesajlarını Türkçeleştir
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('form');
            
            forms.forEach(function(form) {
                form.addEventListener('invalid', function(e) {
                    const input = e.target;
                    
                    // HTML5 doğrulama mesajlarını Türkçeleştir
                    if (input.validity.valueMissing) {
                        const fieldName = input.getAttribute('name');
                        let message = 'Bu alan gereklidir.';
                        
                        if (fieldName === 'email') {
                            message = 'E-posta adresi gereklidir.';
                        } else if (fieldName === 'password') {
                            message = 'Şifre gereklidir.';
                        } else if (fieldName === 'name') {
                            message = 'Ad Soyad gereklidir.';
                        } else if (fieldName === 'password_confirmation') {
                            message = 'Şifre onayı gereklidir.';
                        }
                        
                        input.setCustomValidity(message);
                    } else if (input.validity.typeMismatch && input.type === 'email') {
                        input.setCustomValidity('Lütfen geçerli bir e-posta adresi girin. Örnek: kullanici@hotmail.com');
                    } else {
                        input.setCustomValidity('');
                    }
                }, true);
                
                // Input değiştiğinde custom validity'yi temizle
                form.addEventListener('input', function(e) {
                    if (e.target.validity.valid) {
                        e.target.setCustomValidity('');
                    }
                });
            });
        });
    </script>
</body>
</html>