<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
