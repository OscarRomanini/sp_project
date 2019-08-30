<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $id;
    protected $name;
    protected $fillable = ['name'];

    public function products()
    {
        $this->hasMany(Product::class);
    }
}