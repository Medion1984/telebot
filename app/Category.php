<?php

namespace App;

use Baum\Node;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Image;

class Category extends Node 
{
    use Sluggable;

    public $timestamps = false;
    
    protected $table = 'categories';
  
    protected $parentColumn = 'parent_id';
    
    protected $leftColumn = 'lft';
    
    protected $rightColumn = 'rgt';
    
    protected $depthColumn = 'depth';
  
    protected $orderColumn = 'sort';
    
    protected $guarded = array('id', 'parent_id', 'lft', 'rgt', 'depth');
  
    protected $fillable = ['name','slug','status','sort','parent_id'];
  
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function products()
    {
        return $this->hasMany(Product::class,'category');
    }
}
