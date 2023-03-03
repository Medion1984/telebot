<?php

namespace App;

use Baum\Node;

class MaterialCategory extends Node 
{
    public $timestamps = false;
    
    protected $table = 'material_categories';
  
    protected $parentColumn = 'parent_id';
    
    protected $leftColumn = 'lft';
    
    protected $rightColumn = 'rgt';
    
    protected $depthColumn = 'depth';
  
    protected $orderColumn = 'sort';
    
    protected $guarded = array('id', 'parent_id', 'lft', 'rgt', 'depth');
  
    protected $fillable = ['name','status','sort','parent_id'];
  
    public function materials()
    {
        return $this->hasMany(Material::class,'category_material');
    }
}

