<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookLogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'book_id'     => $this->book_id,
            'user_id'     => $this->user_id,
            'date_start'  => $this->date_start,
            'date_end'    => $this->date_end,
            'planing_end' => $this->planing_end,
        ];
    }
}
