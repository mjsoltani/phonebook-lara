<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone','is_admin','image'];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'contacts_groups');
    }
}
