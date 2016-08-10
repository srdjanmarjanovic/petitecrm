<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * Set default attribute values.
     *
     * @var array
     */
    protected $attributes = [
        'type' => 'lead'
    ];

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
     * Mass assignment allowed fields.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'company_id',
        'role',
        'notes',
        'type'
    ];


    /**
     * Company relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get all of the tags for the contact.
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * Return display name.
     *
     * @return string
     */
    public function getDisplayName()
    {
        return !empty($this->getFullName()) ? $this->getFullName() : $this->email;
    }

    /**
     * Return full name.
     *
     * @return string
     */
    public function getFullName()
    {
        $bits = [];

        if (!empty($this->first_name)) {
            $bits[] = $this->first_name;
        }

        if (!empty($this->last_name)) {
            $bits[] = $this->last_name;
        }

        return implode(' ', $bits);
    }

    /**
     * Return class string based on contact type.
     *
     * @return string
     */
    public function getTypeClass()
    {
        switch ($this->type) {
            case 'lead':
            default:
                return 'fa-star-o';
            case 'prospect':
                return 'fa-star-half-o';
            case 'customer':
                return 'fa-star';
        }
    }

    /**
     * Return role in company for contact.
     */
    public function getRoleInCompany() 
    {
        $bits = [];

        if (!empty($this->role)) {
            $bits[] = $this->role;
        }

        if (!empty($this->company)) {
            $bits[] = $this->company->name;
        }        

        if (isset($bits[0]) && isset($bits[1])) {
            array_splice($bits, 1, 0, 'in');
        }

        return implode(' ' , $bits);
    }
}
