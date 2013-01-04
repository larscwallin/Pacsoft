<?php
if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

/**
 * Pacsoft_reciever class.
 *
 * @category Pacsoft
 * @author  Alexander Bergström <alexander.bergstorm@203creative.se>
 * @link  http://www.203creative.se
 */
class Pacsoft_reciever extends Pacsoft_object {

	public $rcvid;

	/**
	 * Initiates an object with props like data
	 *
	 * @param array   $data Data to put into this object
	 */
	public function __construct( array $data ) {

		if ( !$data['id'] ) {
			throw new Exception('Pacsoft_reciever needs an id.');
		}

		foreach ( $data as $key => $value ) {
			if ( property_exists( $this, $key ) ) {
				$this->{$key} = $value;
			}
		}
	}
}
