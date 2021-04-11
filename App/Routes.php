<?php

return [
    "GET" => [
        "/index.php/home" => "Home@index",
        "/index.php/buyerOrder" => "BuyerOrder@index",
        "/index.php/reports" => "Reports@index"
    ],
    "POST" => [
        "/index.php/save" => "BuyerOrder@save",
        "/index.php/buyerOrder" => "BuyerOrder@index",
        "/index.php/search" => "Reports@search"
    ]
];
