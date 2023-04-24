<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    public $table = 'employees';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'category_id',
        'country_id',
        'status',
        'birthday',
        'resume',
        'bio',
        'linkedin',
        'twitter',
        'facebook',
        'instagram',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class, 'employee_id', 'id');
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class, 'employee_id', 'id');
    }

}
