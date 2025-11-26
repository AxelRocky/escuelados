<?php

class Helper
{
    public static function mostrar($data='', $detener=true)
    {
        print "<pre>";
        var_dump($data);
        print "</pre>";
        if ($detener) {
            exit;
    }
}
public static function encriptar($data)
{
    $llaveEncriptada = base64_decode(LLAVE);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC'));
    $cadena = openssl_encrypt($data, 'AES-256-CBC', $llaveEncriptada, 0, $iv);
    return base64_encode($cadena . "::" . $iv);
}
public static function desencriptar($data)
{
    $llaveEncriptada = base64_decode(LLAVE);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC'));
    list($cadena, $iv) = array_pad(explode("::", base64_decode($data), 2), 2, null);
    return openssl_decrypt($cadena, 'AES-256-CBC', $llaveEncriptada, 0, $iv);
}
}

?>