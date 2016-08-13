<?php

namespace App;

use App\Managers\TagManager;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * Create contact instance.
     *
     * @param array $attributes
     * @return void|static
     */
    public static function create(array $attributes = [])
    {
        /** @var Contact $instance */
        $instance =  parent::create($attributes);

        if (isset($attributes['tags'])) {
            $instance->setTags($attributes['tags']);
        }
        
        return $instance;
    }

    /**
     * Update contact.
     *
     * @param array $attributes
     * @param array $options
     * @return bool|int
     */
    public function update(array $attributes = [], array $options = [])
    {
        parent::update($attributes, $options);

        if (isset($attributes['tags'])) {
            $this->setTags($attributes['tags']);
        }

        return $this;
    }

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

    /**
     * Set tags for new or existing contact.
     *
     * @param array $tags
     */
    private function setTags($tags)
    {
        $tag_manager = new TagManager();

        $this->tags()->sync($tag_manager->getTagIdsFromRequest($tags));
    }
}
