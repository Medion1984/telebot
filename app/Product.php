<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use Sluggable;
    
    protected $localImagePath = 'images/products/';

    protected $imageSize = 300;

    protected $fillable = ['name','slug','status','category','price_sale','price', 'materials', 'popular','measure'];
    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public static function getMeasure()
    {
        return [
            1 => 'За ед.',
            2 => 'За кв. метр',
            3 => 'За пог. метр'
        ];
    }
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function getImage(){
        $noImage = '/images/no-image.png';

        $pathToProductImage = '/'. $this->localImagePath . $this->id . '.jpg';

        if (file_exists(public_path().$pathToProductImage)) {
            return $pathToProductImage;
        }
        return $noImage;
    }
    public function uploadProductImage($image)
    {
        $path = $this->localImagePath. $this->id . '.jpg';
        Image::uploadImage($image, $path, $this->imageSize);
    }
    public static function getPopularProducts()
    {   
        return self::where('popular', '!=', null)->where('status', '!=', null)->get();
    }
}
