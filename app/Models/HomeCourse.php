<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeCourse extends Model
{
    use HasFactory;

    protected $table = 'homeCourses';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $attributes = array(
        'notSoUniqueId' => null
     );

     protected $fillable = ['notSoUniqueId','code','name'];
    /**
     * Gets pairings of the course.
     */
    public function pairings()
    {
        return $this->hasMany(Pairing::class);
    }
}
