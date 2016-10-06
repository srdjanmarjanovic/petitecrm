<?php 
namespace App\Presenters;

/**
 * 
 */
class ContactPresenter extends BasePresenter
{		
    /**
     * Return display name.
     *
     * @return string
     */
    public function displayName()
    {
        return !empty($this->context->fullName) ? $this->context->fullName : $this->context->email;
    }

    /**
     * Return full name.
     *
     * @return string
     */
    public function fullName()
    {
        $bits = [];

        if (!empty($this->context->first_name)) {
            $bits[] = $this->context->first_name;
        }

        if (!empty($this->context->last_name)) {
            $bits[] = $this->context->last_name;
        }

        return implode(' ', $bits);
    }

    /**
     * Return class string based on contact type.
     *
     * @return string
     */
    public function typeClass()
    {
        switch ($this->context->type) {
            case 'lead':
            default:
                return 'fa-circle-o text-muted';
            case 'prospect':
                return 'fa-circle-o text-green';
            case 'customer':
                return 'fa-circle text-green';
        }
    }

    /**
     * Return role in company for contact.
     */
    public function roleInCompany() 
    {
        $bits = [];

        if (!empty($this->context->role)) {
            $bits[] = $this->context->role;
        }

        if (!empty($this->context->company)) {
            $bits[] = $this->context->company->name;
        }        

        if (isset($bits[0]) && isset($bits[1])) {
            array_splice($bits, 1, 0, 'in');
        }

        return implode(' ' , $bits);
    }
}