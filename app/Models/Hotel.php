<?php
  
namespace App\Models;
  
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Hotel extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'hotel _name',
        'hotel_image',
        'hotel_address',
        'hotel_review',
        'status'
    ];
   
}