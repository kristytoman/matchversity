<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DateTime;
use DateInterval;

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
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['mobilities'];

    /**
     * Get mobilities of the university.
     */
    public function mobilities()
    {
        return $this->hasMany(Mobility::class);
    }

    /**
     * Return student's mobilities.
     *
     * @param string  $id
     * @return array
     */
    public static function getStudentsMobilities($id)
    {
        return Mobility::where('user_id', 353)->get(); //TODO
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

    /**
     * Check if there's another mobility at the same time.
     * 
     * @param string  $id
     * @param string  $from
     * @param string  $to
     * 
     * @return bool
     */
    public static function hasUniqueMobility($id, $arrival, $to)
    {
        if (self::getPreviousMobility($id, $arrival, $to)) {
            return false;
        } 
        return true;
    }

    /**
     * Return student's mobility at the same time.
     * 
     * @param string  $id
     * @param string  $from
     * @param string  $to
     * 
     * @return Mobility|null
     */
    public static function getPreviousMobility($id, $arrival, $to)
    {
        $user = self::getByUtbID($id);
        $from = new DateTime($arrival);
        if (!$to) {
            $to = new DateTime($arrival);
            $to->add(new DateInterval('P6M'));
        }
        foreach ($user->mobilities as $mobility) {
            
            if (($mobility->arrival <= $from && $mobility->departure >= $from) ||
                ($mobility->arrival <= $to && $mobility->departure >= $to)) {
                    return $mobility;
                }
        }
        return null;
    }
}
