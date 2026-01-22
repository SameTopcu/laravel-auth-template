#  Laravel 11 Modern Mor Auth Şablonu

Bu proje, standart Laravel Breeze yapısını **modern mor gradyan** tasarımıyla birleştiren, tamamen Türkçeleştirilmiş bir yetkilendirme (Auth) şablonudur.

## ✨ Öne Çıkan Özellikler
* **Modern Arayüz:** Login ve Register sayfaları mor gradyan arka plan ve şık kart yapısıyla tasarlandı.
* **Tam Türkçe:** Hata mesajlarından arayüz metinlerine kadar her şey Türkçe (`lang/tr`).
* **Gelişmiş Mail Akışı:** Mailtrap entegrasyonu hazır ve e-posta doğrulama sayfası özelleştirildi.
* **Hata Yönetimi:** 403 Unauthorized hataları için optimize edilmiş yapı.

## 🛠️ Hızlı Kurulum

1. **Projeyi İndirin:**
   ```bash
   git clone [https://github.com/SameTopcu/laravel-auth-template.git](https://github.com/SameTopcu/laravel-auth-template.git)
   cd laravel-auth-template
2. **Bağımlılıkları Yükleyin:**
   ```bash
   composer install
   npm install && npm run dev
3. **Ortam Değişkenlerini Yapılandırın:**
   ```bash
   MAIL_MAILER=smtp
   MAIL_HOST=sandbox.smtp.mailtrap.io
   MAIL_PORT=2525
   MAIL_USERNAME=kullanici_adiniz
   MAIL_PASSWORD=sifreniz
4. **Veritabanı Hazırlığı:**
   ```bash
   php artisan key:generate
   php artisan migrate
   php artisan serve

   📂 Proje Yapısı Hakkında Notlar
*Tasarım:* resources/views/auth/ altındaki Blade dosyaları mor temaya uygun güncellenmiştir.

*Doğrulama:* E-posta aktivasyonundan sonra kullanıcıyı karşılayan özel verify-success sayfası eklenmiştir.

*Dil:* Proje varsayılan olarak Türkçe dil paketiyle çalışmaktadır.

👤 Geliştirici
Abdul Samet TOPCU GitHub: @SameTopcu
  
   
   
