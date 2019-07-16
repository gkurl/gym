<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $fillable = [
        'firstname', 'lastname', 'email', 'address', 'dateofbirth', 'contactnumber', 'subscription', 'password'
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
