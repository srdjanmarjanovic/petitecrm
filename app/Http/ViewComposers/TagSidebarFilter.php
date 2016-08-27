<?php

namespace App\Http\ViewComposers;
use App\Tag;
use App\Contact;
use App\Company;
use Illuminate\View\View;

class TagSidebarFilter
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $tags = $this->getTags($view->context);
        $no_tag_count = $this->getNoTagCount($view->context);

        $view->with(compact('tags', 'no_tag_count'));
    }

    /**
     * Retreive tags for context.
     */
    private function getTags($context) 
    {
        return Tag::has($context)->get()->sortByDesc(function($tag) use ($context) {
            return count($tag->{$context});
        });
    }

    /**
     * Retreive count of $context without tags.
     */
    private function getNoTagCount($context) 
    {
        switch ($context) {
            case 'companies':
                return Company::has('tags', '=', 0)->count();
            case 'contacts':
                return Contact::has('tags', '=', 0)->count();
            default:
                throw new Exception("Unknown contexts in no tag count");
        }
    }
}