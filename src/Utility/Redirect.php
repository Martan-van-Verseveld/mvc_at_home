<?php
declare(strict_types=1);


namespace App\Utility;



/**
 *	Redirect is used to redirect the client
 */
class Redirect
{
	/**
	 *	@param ?string $location
	 */
    public static function to(?string $location = null) 
	{
        if($location) {
            if(is_numeric($location)) {
                switch($location) {
                    case 404:
                        header('HTTP/1.0 404 Not Found');
                        break;
                }
            }

            header('Location: '. $location);
            
			exit();
        }
    }
}
