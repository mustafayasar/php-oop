<?php

class Data
{
    private $datas = [];

    // Sınıfa ait bir değişken (property) set edilmek istendiğinde çalışır.
    public function __set($name, $value) {
        echo "#log: $name isminde bir değişken tanımlandı. \n";

        $this->datas[$name] = $value;
    }

    // Sınıfa ait bir değişken (property) çağrıldığında çalışır.
    public function __get($name){
        echo "#log: $name isminde bir değişken çağırıldı. \n";

        return $this->datas[$name];
    }

    // Sınıfa ait bir değişken (property) isset edildiğinde.
    public function __isset($name) {
        echo "#log: $name isminde bir değişkenin varlığı sorgulandı. \n";

        return isset($this->datas[$name]);
    }

    // Sınıfa ait bir değişken (property) silindiğinde.
    public function __unset($name) {
        echo "#log: $name isminde bir değişkenin varlığı silindi. \n";

        unset($this->datas[$name]);
    }
}

$data           = new Data();
$data->name     = 'Mustafa';
$data->surname  = 'Yaşar';

echo 'Ad Soyad: '.$data->name.' '.$data->surname." \n";

if (!isset($data->age)) {
    echo "Yaş bilgisi yok. \n";
}

unset($data->surname);