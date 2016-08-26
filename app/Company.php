<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * Set the dates array so we can format them from a blade template.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * Get all contacts for the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    /**
     * Get all of the tags for the company.
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * Return formatted location.
     *
     * @return string
     */
    public function getLocation()
    {
        $bits = [];

        if (!empty($this->address)) {
            $bits[] = $this->address;
        }

        if (!empty($this->city)) {
            $bits[] = $this->city;
        }

        if (!empty($this->country)) {
            $bits[] = $this->country;
        }

        return implode(', ', $bits);
    }
}
