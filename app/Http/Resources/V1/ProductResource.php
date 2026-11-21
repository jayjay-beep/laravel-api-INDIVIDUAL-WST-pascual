<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Transforms a Product model into the JSON structure our API returns.
 */
class ProductResource extends JsonResource
{
    /**
     * Build the array that becomes the JSON response.
     */
    public function toArray(Request $request): array
    {
        return [
            // What kind of object this is
            'type' => 'product',
            'id' => $this->id,
            // The product's own fields, renamed to camelCase for the client
            'attributes' => [
                'product' => $this->product,
                'description' => $this->description,
                'status' => $this->status,
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at,
            ],
            // Related objects: for now only the id of the author
            'relationships' => [
                'author' => [
                    'data' => [
                        'type' => 'user',
                        'id' => $this->user_id,
                    ],
                ],
            ],
            // Link to this product
            'links' => [
                'self' => route('products.show', ['product' => $this->id]),
            ],
        ];
    }
}