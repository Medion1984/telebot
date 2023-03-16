<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    protected $fillable = ['owner', 'phone', 'address','characteristics','product','quantity','status'];

    public static function getStatus(){
        return [
            0 => 'новый',
            1 => 'в обработке',
            2 => 'идет работа',
            3 => 'закончен',
            4 => 'отклонен'
        ];
    }
    public static function canMakeOrder($phone)
    {
        $order = Order::where('phone', $phone)->first();

        if($order != null && $order->status < 3){
            return true;
        } else {
            return false;
        }
    }
    public static function getFreshOrders()
    {
        return Order::where('status', 0)->get()->count();
    }
    public static function getWorkingOrders()
    {
        return Order::whereIn('status', [1,2])->get()->count();
    }
    public static function getFinishedOrders()
    {
        return Order::where('status', 3)->get()->count();
    }
    public function getProduct()
    {
        return Product::where('slug', $this->product)->first();
    }
    public function getStatusText()
    {
        $result = '';
        $text = self::getStatus()[$this->status];
        switch($this->status){  
            case 0:
                $result = '<span class="badge badge-primary">'.$text.'</span>';
                break;
            case 1: 
                $result = '<span class="badge badge-warning">'.$text.'</span>';
                break;
            case 2: 
                $result = '<span class="badge badge-success">'.$text.'</span>';
                break;
            case 3: 
                $result = '<span class="badge badge-success">'.$text.'</span>';
                break;
            case 4: 
                $result = '<span class="badge badge-danger">'.$text.'</span>';
                break;
        }
        return $result;
    }
    public function getCreatedAtAttribute($value)
    {   
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d-m-Y');

        return $date;
    }
    public function getUpdatedAtAttribute($value)
    {   
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d-m-Y');

        return $date;
    }
}
