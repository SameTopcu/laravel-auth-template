<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Şifre Sıfırla - {{ config('app.name', 'Laravel') }}</title>

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
            padding: 20px 0;
        }

        .reset-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .reset-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 40px;
            animation: slideUp 0.5s ease-out;
        }

        .reset-card h2 {
            color: #667eea;
            font-weight: 700;
            margin-bottom: 10px;
            text-align: center;
        }

        .reset-card .subtitle {
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

        .btn-reset {
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

        .btn-reset:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-reset:active {
            transform: translateY(0);
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
            .reset-card {
                padding: 30px 20px;
            }

            .reset-card h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="reset-container">
        <div class="reset-card">
            <h2>Şifre Sıfırla</h2>
            <p class="subtitle">Yeni şifrenizi belirleyin</p>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">E-posta</label>
                    <input 
                        id="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        type="email" 
                        name="email" 
                        value="{{ old('email', $request->email) }}" 
                        required 
                        autofocus
                    />
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Yeni Şifre</label>
                    <input 
                        id="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        type="password" 
                        name="password" 
                        required
                    />
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation">Şifre Onay</label>
                    <input 
                        id="password_confirmation" 
                        class="form-control @error('password_confirmation') is-invalid @enderror" 
                        type="password" 
                        name="password_confirmation" 
                        required
                    />
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-reset">Şifre Sıfırla</button>
            </form>
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
