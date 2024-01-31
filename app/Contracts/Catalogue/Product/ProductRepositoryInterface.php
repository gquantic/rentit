<?php

namespace App\Contracts\Catalogue\Product;

use App\Models\Catalogue\Product;
use App\Repositories\Catalogue\Product\ProductRepository;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryInterface
{
    public function all();

    /**
     * Получить опубликованные
     * @return ProductRepository
     */
    public function getPublished(): mixed;

    /**
     * Получить неопубликованные
     * @return ProductRepository
     */
    public function getUnpublished(): mixed;

    public function getByUser($userId): mixed;

    /**
     * Получить итоговый запрос
     * @return Product|Collection
     */
    public function get(): mixed;
}
