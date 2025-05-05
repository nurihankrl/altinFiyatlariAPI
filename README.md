# Altın Fiyatları API

Bu proje, [CollectAPI](https://collectapi.com/) kullanılarak altın fiyatlarını döndüren bir PHP tabanlı API'dir.

## Özellikler

- Altın türleri için alış, satış, oran, tarih ve saat bilgilerini sağlar.
- JSON formatında kullanıcı dostu bir çıktı döndürür.
- Hata durumlarında uygun HTTP durum kodları ve mesajları döner.

## Gereksinimler

- PHP 7.4 veya üzeri
- cURL eklentisi etkin bir PHP kurulumu
- CollectAPI API anahtarı

## Kurulum

1. Proje dosyalarını `c:\xampp\htdocs\altinFiyatlari` dizinine kopyalayın.
2. `api.php` dosyasındaki `authorization` başlığında bulunan API anahtarını kendi CollectAPI anahtarınızla değiştirin:
   ```php
   "authorization: apikey your_collectapi_key"
   ```
3. XAMPP veya başka bir yerel sunucuyu başlatın.

## Kullanım

API'yi kullanmak için aşağıdaki URL formatını kullanabilirsiniz:

```
http://localhost/altinFiyatlari/api.php
```

### Örnek Çıktı

Başarılı bir istek durumunda API aşağıdaki formatta bir JSON döndürür:

```json
{
    "altin_fiyatlari": [
        {
            "isim": "Gram Altın",
            "alis": "4051.85 TL",
            "satis": "4052.33 TL",
            "oran": "0.83%",
            "tarih": "2025-05-05",
            "saat": "10:55:54"
        },
        {
            "isim": "ONS Altın",
            "alis": "3265.61 TL",
            "satis": "3266.00 TL",
            "oran": "0.77%",
            "tarih": "2025-05-05",
            "saat": "10:55:51"
        }
    ]
}
```

### Hata Durumları

API, aşağıdaki hata durumlarını dönebilir:

- **500 Internal Server Error**: cURL hatası veya API'ye bağlanılamadı.
- **404 Not Found**: Altın fiyatları bilgisi bulunamadı.
