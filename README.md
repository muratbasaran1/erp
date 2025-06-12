# Aid Manager

Basit bir PHP/MySQL uygulaması. Başvuruları kaydetmek ve listelemek için kullanılır.

## Kurulum

1. Depoyu klonlayın ve `composer install` çalıştırın (composer kullanmıyorsanız bu adımı atlayabilirsiniz).
2. `migrations/schema.sql` dosyasını veritabanınızda çalıştırın.
3. `config/config.php` içerisindeki veritabanı bilgilerini düzenleyin.
4. `public/` dizinini web sunucunuzda web root olarak ayarlayın.

## Kullanım

- `/` ana sayfası başvuru listesini gösterir.
- `/?action=create` yeni başvuru formunu gösterir.
- `/?action=export` CSV indirmeyi başlatır.

Uygulama Bootstrap tabanlı profesyonel bir arayüz sunar. Navigasyon çubuğu ve responsive tasarım sayesinde masaüstü ve mobil cihazlarda rahatlıkla kullanılabilir.
