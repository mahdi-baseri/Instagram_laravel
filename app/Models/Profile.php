<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function profileImage()
    {
        $imgpath =  ($this->img) ? $this->img : 'profile/NtaDGsEGezyqidxSK0Lzgp4ACSfQF6TrP3FblToq.png';
        return  '/storage/' . $imgpath;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}
