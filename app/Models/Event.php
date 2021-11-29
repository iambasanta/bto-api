<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','description','address','image','ticket_price','total_tickets','published_at','date'];

    public function attachImage($image){
        $filename = $image->store('public/events/thumbmails');
        $this->update(['image'=>$filename]);
    }

    protected $casts = ['date'=>'timestamp'];

    public static function boot(){
        parent::boot();
        static::creating(function($event){
            $event->slug = Str::slug($event->name);
        });
    }

    public function getDateAttribute($date){
        return Carbon::parse($date)->format('d-M,Y');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublished($query){
        return $query->where('published_at','<=',Carbon::now());
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }

    public function payments(){
        return $this->morphMany(Payment::class,'product');
    }

}
