<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SubscriptionType extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    public $table = 'subscription_types';

    protected $appends = [
        'picture',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kind',
        'title',
        'num_job_post',
        'num_month',
        'amount',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'type_id', 'id');
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'feature_subscription_type');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function getPictureAttribute()
    {
        $file = $this->getMedia('picture')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

}
