<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    public function subscriptionid() {

        return $this -> belongsTo(\App\Subscription::class, 'subscription_id');
    }

    protected $fillable = [
        'firstname', 'lastname', 'email', 'address', 'dateofbirth', 'contactnumber', 'subscription_id', 'password'
    ];

    protected $dates = [
        'dateofbirth', 'created_at', 'updated_at'
    ];

        /**
     * The storage format of the model's date columns.
     *
     * @var string
     */

    protected $casts = [

        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y',
        'dateofbirth' => 'datetime:d/m/Y',

    ];

    //default for registered users unless changed - 2 = regular user, 1 = admin user

    protected $attributes = [
        'role_id' => 2,
    ];
    /**
	 * Get the user's full name by concatenating the first and last names
	 *
	 * @return string
	 */
	public function getFullName()
	{
		return $this->firstname . ' ' . $this->lastname;
	}
}
