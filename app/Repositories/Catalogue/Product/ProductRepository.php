<?php

namespace App\Repositories\Catalogue\Product;

use App\Contracts\Catalogue\Product\ProductRepositoryInterface;
use App\Models\Catalogue\Product;

class ProductRepository implements ProductRepositoryInterface
{
    protected $products;

    public function __construct()
    {
        $this->products = Product::query();
    }

    public function all()
    {
        $this->products = $this->products->where('published', 1)->where('blocked', 0);
        return $this->products;
    }

    public function getPublished(): mixed
    {
        $this->products = $this->products->where('published', 1)->where('blocked', 0);
        return $this;
    }

    public function getUnpublished(): mixed
    {
        $this->products = $this->products->where('published', 1)->where('blocked', 0);
        return $this;
    }

    public function getByUser($userId): mixed
    {
        $this->products = $this->products->where('user_id', $userId);
        return $this;
    }

    public function get(): mixed
    {
        return $this->products;
    }

    public function details($id): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Builder|array|null
    {
        return Product::query()->findOrFail($id);
    }
}
