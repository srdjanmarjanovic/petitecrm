<?php
namespace App\Managers;

use App\Tag;

/**
 * Class TagManager
 *
 * @author Srdjan Marjanovic
 * @package App\Managers
 */
class TagManager
{

    /**
     * Return array of existing or newly created tags.
     *
     * @param $elements
     * @return array
     */
    public function getTagIdsFromRequest($elements)
    {
        $tag_ids = [];
        foreach ($elements as $element) {
            $tag = Tag::find($element);

            if (!$tag) {
                $tag = Tag::create(['name' => $element]);
            }

            $tag_ids[] = $tag->id;
        }

        return $tag_ids;
    }
}