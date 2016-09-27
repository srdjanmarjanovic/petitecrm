<?php
namespace App\Managers;

use App\Company;

/**
 * Class CompanyManager
 *
 * @author Srdjan Marjanovic
 * @package App\Managers
 */
class CompanyManager
{
    /**
     * Return an existing or newly created company.
     *
     * @param $elements
     * @return  Company
     */
    public function getCompanyFromRequest($element)
    {
        if (!($company = Company::find($element))) {
            $company = Company::create(['name' => $element]);
        }

        return $company;
    }
}