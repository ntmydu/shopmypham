<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Notifications\Notifiable;
use App\Models\Upload;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'menu_id',
        'price',
        'price_sale',
        'status'
    ];

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id')->withDefault(['name' => '']);
    }
    public function image()
    {
        return $this->hasMany(Upload::class, 'product_id', 'id');
    }
}