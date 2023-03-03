<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materials';

    public $timestamps = false;

    protected $fillable = ['name','price','status','category_material'];

    public function categories()
    {
        return $this->belongsTo(MaterialCategory::class, 'category_material');
    }
    public function getMaterials($array = [])
    {
        $materials = $this::whereIn('id', $array)->get();
        return $materials;
    }
}
