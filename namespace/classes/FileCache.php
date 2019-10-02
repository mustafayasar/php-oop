<?php

namespace classes;

use interfaces\CacheInterface;

class FileCache implements CacheInterface
{
    private $cache_dir  = '.../cache/';

    public function set($key, $value, $duration = null)
    {
        // $key'i kullanarak -istenirse şifrelenebilir- bir dosya oluşturuyoruz.

        // dosya varsa içini boşaltarak yapabiliriz işlemleri.

        // $value (serialize ederek) ve $duration bilgilerini bu dosya içerisine biribirinden ayırabileceğimiz şekilde kaydediyoruz.

        // dosyayı kapatıyoruz.

        echo "#log: FileCache->set($key, $value, $duration) çalıştırıldı. \n";
    }

    public function has($key)
    {
        // $key'in dosyasını var mı diye bakıyoruz.

        // dosya varsa ve duration değeri 'null' ise veya var ise
        // ve bu değer dosyanın son güncellenen zamanından günümüze kadar ki süreden -saniye cinsinden- az ise 'true' döndürüyoruz.

        // aksi takdirde boolean cinsinde 'false' değer döndürüyoruz.

        echo "#log: FileCache->has($key) çalıştırıldı. \n";
    }

    public function get($key)
    {
        // $key'in dosyasını açıyoruz.

        // daha önce kaydettiğimiz $value (unserialize ederek)
        // ve $duration verilerini birbirinden ayırarak alıyoruz.

        // dosyayı kapatıyoruz.

        // $duration değeri null ise veya
        // dosyanın son güncellenen zamanından günümüze kadar ki süreden -saniye cinsinden- az ise value'yi döndürüyoruz.

        // aksi takdirde boolean cinsinde 'false' değer döndürüyoruz.

        echo "#log: FileCache->get($key) çalıştırıldı. \n";
    }

    public function remove($key)
    {
        // $key'in dosyasını siliyoruz.

        echo "#log: FileCache->remove($key) çalıştırıldı. \n";
    }
}