<?php

namespace App\Http\Resources;

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
            'id' => $this->id,
            'product_name' => $this->product_name,
            'image_url' => $this->image_url,
            // 'category_id' => $this->category_id,
            // 'supplier_id' => $this->supplier_id,
            'unit_price' => $this->unit_price,
            'stock_quantity' => $this->stock_quantity,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'supplier' => new SupplierResource($this->whenLoaded('supplier')),
        ];
    }
}
