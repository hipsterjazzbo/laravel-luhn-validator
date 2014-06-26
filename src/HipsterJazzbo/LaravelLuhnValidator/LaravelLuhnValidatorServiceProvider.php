<?php namespace HipsterJazzbo\LaravelLuhnValidator;

use Illuminate\Support\ServiceProvider;

class LaravelLuhnValidatorServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;
	
	public function boot()
	{
		/**
		 * Luhn algorithm number checker - (c) 2005-2008 shaman - www.planzero.org
		 */
		$this->app->validator->extend('luhn', function ($attribute, $value, $parameters)
		{
			// Strip any non-digits (useful for credit card numbers with spaces and hyphens)
			$value = preg_replace('/\D/', '', $value);

			// Set the string length and parity
			$number_length = strlen($value);
			$parity        = $number_length % 2;

			// Loop through each digit and do the maths
			$total = 0;
			for ($i = 0; $i < $number_length; $i ++)
			{
				$digit = $value[$i];

				// Multiply alternate digits by two
				if ($i % 2 == $parity)
				{
					$digit *= 2;

					// If the sum is two digits, add them together (in effect)
					if ($digit > 9)
					{
						$digit -= 9;
					}
				}

				// Total up the digits
				$total += $digit;
			}

			// If the total mod 10 equals 0, the number is valid
			return ($total % 10 === 0);
		});
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() 
	{
		// Nothing
	}
}
