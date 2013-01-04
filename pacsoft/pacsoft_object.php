<?php

/**
 * Pacsoft_object class.
 *
 * @category Pacsoft
 * @author  Alexander Bergström <alexander.bergstorm@203creative.se>
 * @link  http://www.203creative.se
 */
class Pacsoft_object
{
	
	/**
	 * The id for object, is used to find specific object in registry
	 * 
	 * @var int
	 */
	public $id;

	/**
	 * Object name
	 * @var string
	 */
	public $name;

	/**
	 * object address
	 * @var string
	 */
	public $address;

	/**
	 * object address line 2
	 * @var string
	 */
	public $address2;

	/**
	 * object zip code
	 * @var int
	 */
	public $zipCode;

	/**
	 * object city
	 * @var string
	 */
	public $city;

	/**
	 * object country
	 * @var string
	 */
	public $country;

	/**
	 * object contact
	 * @var string
	 */
	public $contact;

	/**
	 * objects phone number
	 * @var int
	 */
	public $phone;

	/**
	 * objects fax number
	 * @var int
	 */
	public $fax;

	/**
	 * objects email-address
	 * @var $email
	 */
	public $email;

	/**
	 * objects sms-phone number for avi-avisering
	 * @var int
	 */
	public $sms;

	/**
	 * objects organisation number
	 * @var int
	 */
	public $orgNo;

	/**
	 * objects vat-number
	 * @var int
	 */
	public $vatNo;

	
}