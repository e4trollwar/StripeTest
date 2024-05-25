<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebhookCall extends Model
{
    protected $table ='test';
    protected $primaryKey ='id';
      protected $fillable =[
            'test',
            
      ];
    use HasFactory;
}
