<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;
    
    protected string $sprite;
    
    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getSpriteAttribute()
    {
      if ( $this->attributes['id'] < 100 ) {
        return "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/".$this->attributes['id'].".png";
      }
      return "https://assets.pokemon.com/assets/cms2/img/pokedex/full/".$this->attributes['id'].".png";
    }
    
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['sprite'];
    
}
