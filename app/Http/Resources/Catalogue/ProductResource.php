<?php

namespace App\Http\Resources\Catalogue;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'route' => route('web.products.show', $this->slug),
            'img' => "/uploads/products/{$this->images[0]}" ?? '',
            'title' => $this->title,
            'prices' => $this->prices,
        ];
    }
}
