<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
    protected $fillable = array('name', 'email', 'date_of_birth', 'display_name', 'gender');
    protected $guarded = array('id', 'role_id', 'password');

    public static function rules ($id = 0, $merge=[])
    {
        return array_merge(
            [
                'name'                  => 'required|alpha_spaces',
                'display_name'          => 'required|alpha_spaces',
                'email'                 => 'required|email|unique:users,email'. ($id ? ",$id" : ''),
                'date_of_birth'         => 'required|date',
                'password'              => 'required|alphaNum|min:6|max:64|confirmed',
                'password_confirmation' => 'required',
            ],
            $merge);
    }

    public function posts()
    {
        return $this->hasMany('Post');
    }

    public function role()
    {
        return $this->belongsTo('Role');
    }
	
	public function follows()
	{
		return $this->hasMany('User', 'followee_id');
	}

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
