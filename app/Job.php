<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Job extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    public $table = 'jobs';

    protected $appends = [
        'photo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'max_apply',
        'title',
        'salary',
        'address',
        'top_rated',
        'promoted',
        'company_id',
        'job_nature',
        'created_at',
        'updated_at',
        'deleted_at',
        'location_id',
        'requirements',
        'full_description',
        'short_description',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
//        $this->addMediaConversion('thumb')->width(100)->height(100);
        $this->addMediaConversion('thumb')->width(300);
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

    public function forms()
    {
        return $this->hasMany(Form::class, 'job_id', 'id');
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function scopeSearchResults($query)
    {
        return $query->when(!empty(request()->input('location', 0)), function($query) {
            $query->whereHas('location', function($query) {
                $query->whereId(request()->input('location'));
            });
        })
        ->when(!empty(request()->input('category', 0)), function($query) {
            $query->whereHas('categories', function($query) {
                $query->whereId(request()->input('category'));
            });
        })
        ->when(!empty(request()->input('search', '')), function($query) {
            $query->where(function($query) {
                $search = request()->input('search');
                $query->where('title', 'LIKE', "%$search%")
                    ->orWhere('short_description', 'LIKE', "%$search%")
                    ->orWhere('full_description', 'LIKE', "%$search%")
                    ->orWhere('job_nature', 'LIKE', "%$search%")
                    ->orWhere('requirements', 'LIKE', "%$search%")
                    ->orWhere('address', 'LIKE', "%$search%")
                    ->orWhereHas('company', function($query) use($search) {
                        $query->where('name', 'LIKE', "%$search%");
                    });
            });
        });
    }
}
