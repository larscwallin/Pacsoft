<?php

/**
 * Pacsoft_shipment class.
 *
 * @category Pacsoft
 * @author  Alexander Bergström <alexander.bergstorm@203creative.se>
 * @link  http://www.203creative.se
 */
class Pacsoft_shipment
{
	public $orderNo;
	public $rcvid;
	public $mergeID;
	public $from;
	public $legalFrom;
	public $to;
	public $legalTo;
	public $agentTo;
	public $customsTo;
	public $shpid;
	public $freeText1;
	public $eurPallets;
	public $reference;
	public $referenceBarCode;
	public $rcvreference;
	public $sisFreeText1;
	public $cmrFreeText1;
	public $cmrDocuments1;
	public $cmrspecialagreement;
	public $termCode;
	public $termLocation;
	public $printSet;
	public $shipDate;
	public $customsUnit;
	public $flags;

	// How container should look like
	public $container = array(
		'copies' => null,
		'cntid1' => null,
		'marking' => null,
		'packagecode' => null,
		'weight' => null,
		'volume' => null,
		'area' => null,
		'lenght' => null,
		'width' => null,
		'height' => null,
		'itemno' => null,
		'contents' => null,
		'dnguncode' => null,
		'dnghzcode' => null,
		'dngpkcode' => null,
		'dngadrclass' => null,
		'dngdescr' => null,
		'dngmpcode' => null,
		'dngnote' => null,
		'dngnetweight' => null,
		'dngtrcode' => null,
		'dngnetvolume' => null,
		'dngflashpoint' => null,
		'dnglimitedquantities' => null,
		'dngseparation' => null
	);

	/**
	 * Initiates an object with props like data
	 *
	 * @param array   $data Data to put into this object
	 */
	public function __construct( array $data )
	{
		foreach ($data as $key => $value) {
			if ( property_exists($this, $key) ) {
				$this->{$key} = $value;
			}

			if (array_key_exists($key, $this->container)) {
				$this->container[$key] = $value;
			}

		}
	}

}