<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ssl_encrypt {
    public function stringEncrypt ($plainText, $cryptKey = '7R7zX2Urc7qvjhkr') {

        $cipher   = 'aes-128-cbc';

        if (in_array($cipher, openssl_get_cipher_methods()))
        {
            $ivlen = openssl_cipher_iv_length($cipher);
            $iv = openssl_random_pseudo_bytes($ivlen);
            $ciphertext_raw = openssl_encrypt(
            $plainText, $cipher, $cryptKey, $options=OPENSSL_RAW_DATA, $iv);
            $hmac = hash_hmac('sha256', $ciphertext_raw, $cryptKey, $as_binary=true);
            $encodedText = bin2hex( $iv.$hmac.$ciphertext_raw );
        }

        return $encodedText;
    }


    //Return decrypted string
    public function stringDecrypt ($encodedText, $cryptKey = '7R7zX2Urc7qvjhkr') {
        $c = @hex2bin($encodedText);
        $cipher   = 'aes-128-cbc';

        if (in_array($cipher, openssl_get_cipher_methods()))
        {
            $ivlen = openssl_cipher_iv_length($cipher);
            $iv = substr($c, 0, $ivlen);
            $hmac = substr($c, $ivlen, $sha2len=32);
            $ivlenSha2len = $ivlen+$sha2len;
            $ciphertext_raw = substr($c, $ivlen+$sha2len);
            $plainText = openssl_decrypt(
            $ciphertext_raw, $cipher, $cryptKey, $options=OPENSSL_RAW_DATA, $iv);
        }

        return $plainText;
    }
}