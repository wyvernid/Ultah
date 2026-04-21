<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Wish extends Model
{
    protected $fillable = [
        'name',
        'hobby',
        'favorite_food',
        'favorite_color',
        'favorite_place',
        'favorite_friend',
        'favorite_partner',
        'favorite_book',
        'message',
        'ip_address',
    ];
}