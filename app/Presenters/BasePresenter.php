<?php 
namespace App\Presenters;

abstract class BasePresenter {

	/**
	 * @var PresentableInterface
	 */
	protected $context;

	public function __construct(PresentableInterface $context)
	{
		$this->context = $context;
	}

	public function __get($property) 
	{
		if (method_exists($this, $property)){
			return call_user_func([$this, $property]);
		}

		$class_name = static::class;

		throw new \Exception("Property {$property} does not exist on the class {$class_name}");
	}
}