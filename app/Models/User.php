<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['utbID'];

    /**
     * Return student's mobilities.
     *
     * @param string  $id
     * @return array
     */
    public static function getStudentsMobilities($id)
    {
        return [Mobility::find(1)]; //TODO
    }

    /**
     * Create or find an instance of University location in the database.
     *
     * @param string  $utbID
     * @return User
     */
    public static function getByUtbID($utbID)
    {
        return self::firstOrCreate([
            'utbID' => $utbID
        ]);
    }
}
