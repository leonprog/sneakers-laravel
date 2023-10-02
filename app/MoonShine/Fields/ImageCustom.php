<?php
namespace App\MoonShine\Fields;

use Illuminate\Database\Eloquent\Model;
use MoonShine\Fields\HasMany;

final class ImageCustom extends HasMany
{
    public function indexViewValue(Model $item, bool $container = false): string
    {
        return $item->image_path;
    }
}
