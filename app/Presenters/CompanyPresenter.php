<?php 
namespace App\Presenters;

/**
 * CompanyPresenter
 */
class CompanyPresenter extends BasePresenter
{
	private $context;

	public function __construct(PresentableInterface $context)
	{
		$this->context = $context;
	}
	/**
     * Return formatted location.
     *
     * @return string
     */
    public function location()
    {
        $bits = [];

        if (!empty($this->context->address)) {
            $bits[] = $this->context->address;
        }

        if (!empty($this->context->city)) {
            $bits[] = $this->context->city;
        }

        if (!empty($this->context->country)) {
            $bits[] = $this->context->country;
        }

        return implode(', ', $bits);
    }
}