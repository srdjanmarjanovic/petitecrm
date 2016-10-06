<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Contact;

class Interaction extends Model
{
	protected $fillable = [
		'sender_type',
		'sender_id',
		'recipient_type',
		'recipient_id',
		'body',
		'parent_id',
	];

	public static function boot()
	{
	    parent::boot();;

	    static::creating(function (Interaction $Interaction) {
	    	do {
	    		$uuid = uniqid();
	    	} while (Interaction::where('uuid', '=', $uuid)->first());

	    	$interaction->uuid = $uuid;
	    });
	}
	/**
	 * Return sender relationship.
	 * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function sender()
	{
		return $this->morphTo();
	}

	/**
	 * Return recipient relationship.
	 * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function receiver()
	{
		return $this->morphTo();
	}
	
	/**
	 * Return parent interaction relationship.
	 * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function parent()
	{
		return $this->belongsTo('App\Category', 'parent_id');
	}

	/**
	 * Return chilren interaction relationship.
	 * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function children()
	{
		return $this->hasMany('App\Category');
	}

	/**
	 * Find all interactions for the given user and contact.
	 * 
	 * @param  Contact $contact
	 * @return 
	 */
	public static function findForContact(Contact $contact) {
		$interactions = self::where(function($query) use ($contact) {
									$query->where('sender_type', '=', 'Hello World')
										   ->where('sender_id', '=', $contact->id);
								})		
							    ->orWhere(function($query) use ($contact) {
									$query->where('receiver_type', '=', Contact::class)
                      				      ->where('receiver_id', '=', $contact->id);
								})->get();
		return $interactions;
	}
}
