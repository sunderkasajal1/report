<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2014 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
use \Model\Details;

class Controller_Customize extends Controller
{

	/**
	 * This action serves Image upload part
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_upload()
	{
		
		//var_dump($_POST['file']);
		$filename = 'background_image_26.png';
		move_uploaded_file( $_FILES['file']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/schoolonweb/report/public/assets/uploaded_images/'.$filename);
		$response = array();
		$response['filename'] = "http://devtab.schoolcom.in/schoolonweb/report/public/assets/uploaded_images/".$filename;
		return json_encode($response);
	}

	
}
