<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialSites extends Model
{
    use HasFactory, SoftDeletes;
    public function social(){
        return $this->hasMany(Social::class,'social_id');
    }
}
