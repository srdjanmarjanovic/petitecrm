<?php

namespace App;

use Elasticquent\ElasticquentTrait;
use Illuminate\Database\Eloquent\Model;
use App\Presenters\PresentableInterface;
use App\Presenters\ContactPresenter as Presenter;

class Contact extends Model implements PresentableInterface
{
    use ElasticquentTrait;

    public static function boot()
    {
        parent::boot();;

        static::saved(function (Contact $contact) {
            $contact->load('tags', 'company');
//            $contact->addToIndex();
        });

        static::deleted(function (Contact $contact) {
//            $contact->removeFromIndex();
        });
    }

    /**
     * Create contact instance.
     *
     * @param array $attributes
     * @return void|Contact
     */
    public static function create(array $attributes = [])
    {
        /** @var Contact $instance */
        $instance =  parent::create($attributes);

        if (isset($attributes['tags'])) {
            $instance->setTags($attributes['tags']);
        }

        if (isset($attributes['company_id'])) {
            $instance->setCompany($attributes['company_id']);
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

    protected $with = [
        'tags',
        'company'
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
     * Return sent interactions relationship.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function sentInteractions()
    {
        return $this->morphMany('App\Interaction', 'sender');
    }

    /**
     * Return received interactions relationship.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function receivedInteractions()
    {
        return $this->morphMany('App\Interaction', 'receiver');
    }

    /**
     * Return Contact Presenter.
     * 
     * @return Presenter
     */
    public function present()
    {
        return new Presenter($this);
    }

    /**
     * Set tags for new or existing contact.
     *
     * @param array $tags
     */
    private function setTags($tags)
    {
        $this->tags()->sync(app('TagManager')->getTagIdsFromRequest($tags));
    }

    /**
     * Set compay for new or existing contact.
     *
     * @param array $company
     */
    private function setCompany($company_name)
    {
        $this->company()->associate(app('CompanyManager')->getCompanyFromRequest($company_name));
        $this->save();
    }
}
