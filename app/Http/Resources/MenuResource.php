<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Resource Menu
 */
class MenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'code' => $this->code,
            'category' => $this->category->getTranslation('name', $request->locale),
            'tray_slots' => $this->tray_slots,
            'price' =>  (float) $this->price,
            'title' =>  $this->getTranslation('title', $request->locale),
            'subtitle' =>  $this->getTranslation('subtitle', $request->locale),
            'description' => $this->getTranslation('description', $request->locale),
            'tray_label' => html_entity_decode($this->tray_label),
            'tray_fontsize' => $this->tray_fontsize,
            'image' => $this->img_1,
            'image_url_path' => url(Storage::disk('public')->url('/menu/'.$this->id.'/'.$this->img_1)),
        ];
    }
}
