<?php
namespace App;

use App\Managers\TagManager;
use App\Industry;
use Illuminate\Database\Eloquent\Model;
use App\Presenters\PresentableInterface;

class Company extends Model implements PresentableInterface
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
     * Mass assignment allowed fields.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'website',
        'phone',
        'address',
        'city',
        'country'
    ];
    
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
        
        return $instance;
    }

    public function update(array $attributes = [], array $options = [])
    {
         parent::update($attributes, $options);

        if (isset($attributes['tags'])) {
            $this->setTags($attributes['tags']);
        }

        return $this;
    }

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
     * Industry relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    /**
     * Get all of the tags for the company.
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
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
}
