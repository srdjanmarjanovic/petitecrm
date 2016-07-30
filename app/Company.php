<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * Return contact relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
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
