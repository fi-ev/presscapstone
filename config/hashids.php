<?php 

return [
    'salt' => env('HASHIDS_SALT', 'def'),
    'length' => env('HASHIDS_LENGTH', 10),
    'alphabet' => env('HASHIDS_ALPHABET', 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'),
];
