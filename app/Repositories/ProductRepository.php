<?php

namespace App\Repositories;

interface ProductRepository {
    function getAll();
    function create(array $detailProduct);
}