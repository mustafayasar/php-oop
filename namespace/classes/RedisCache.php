<?php

namespace classes;

use interfaces\CacheInterface;

/**
 * https://github.com/phpredis/phpredis extensionunu kullanarak redis ile cache tutmak istiyoruz.
 * Daha yönetilebilir olması için bu kütüphane ile aramıza bir sınıf yapmak mantıklıdır.
 * İlerde başka bir extension veya yöntem kullanacak olsanız sadece bu sınıfı değiştirerek kolay bir geçiş sağlamış olursunuz.
 *
 * Class RedisCache
 * @package classes
 */
class RedisCache implements CacheInterface
{
    public $redis  = false;

    const REDIS_IP = '127.0.0.1';
    const REDIS_PORT = '6739';
    const REDIS_PASS = false;

    public function __construct()
    {
        // $this->redis değişkenimize bakıyoruz bağlantı kurulmamışsa -yani false ise-
        // $this->connect() metodumuzu çağırıyoruz.

        $this->connect();
    }

    private function connect()
    {
        // Redise bağlanıyoruz.
        // Ve redis nesnemizi diğer metodlarda kullanabilmek için $this->redis değişkenine atıyoruz.

        /*
        $redis = new Redis();
        $redis->connect(self::REDIS_IP, self::REDIS_PORT);

        if (self::REDIS_PASS) {
            $redis->auth(self::REDIS_PASS);
        }

        $this->redis = $redis;
        */

        echo "#log: RedisCache->connect() çalıştırıldı. \n";
    }

    public function set($key, $value, $duration = null)
    {
        // $key, $value, $duration ile cachemizi $this->redis->set() metoduna gönderiyoruz.
        // gelen sonucu return ediyoruz.
        // diğer metodları da benzer şekilde yapıyoruz.
    }

    public function has($key)
    {
        // return $this->redis->exists($key);
    }

    public function get($key)
    {
        // return $this->redis->get($key);
    }

    public function remove($key)
    {
        // return $this->redis->del($key);
    }
}