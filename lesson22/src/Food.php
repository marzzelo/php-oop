<?php

namespace Styde;

use JetBrains\PhpStorm\Pure;

class Food extends Model {
    
    public function getBeverageAttribute()
    {
        return $this->attributes['beverage'] ?? false;
    }

    #[Pure] public function getNameAttribute(): string
    {
    	return strtoupper($this->attributes['name']);
    }

}