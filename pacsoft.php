<?php
/**
 * Inkluderar alla filer då jag inte vill instansiera klasserna.
 *
 */
require_once 'pacsoft/pacsoft_object.php';
require_once 'pacsoft/pacsoft_shipment.php';
require_once 'pacsoft/pacsoft_sender.php';
require_once 'pacsoft/pacsoft_reciever.php';

/**
 * Pacsoft online class.
 *
 * @category Pacsoft
 * @author  Alexander Bergström <alexander.bergstorm@203creative.se>
 * @link  http://www.203creative.se
 */
class Pacsoft {

	// Codeigniter instantiation
	private $CI;

	// XML config
	public $xmlVersion = "1.0";
	public $xmlCharset = "ISO-8859-1";
	public $xmlRootName = "data";

	// Here we store all the senders
	private $senderRegistry = array();
	private $recieverRegistry = array();
	private $shipmentRegistry = array();

	// Sender partner things
	public $senderParner = array();
	public $senderPartnerID;
	public $senderCustNo;
	public $senderEdiAddress;
	public $senderPalletRegNo;
	public $senderTerminal;
	public $senderPostGiro;
	public $senderBankGiro;
	public $senderKonto;
	public $senderIban;
	public $senderBic;
	public $senderPaymentMethod;
	public $senderBookingId;
	public $senderBookingOffice;
	public $senderCustNoIssuerCode;

	/**
	 * Fetches the Codeigniter instantiation
	 *
	 * @return void
	 */
	function __construct() {
		$this->CI = &get_instance();
	}

	/**
	 * Add items to pacsoft xml
	 *
	 * @param array   $items items, their weight and stuff
	 */
	public function addItems( array $items ) {
		if ( is_array( $items ) ) {
			array_merge( $this->items, $items );
		}
	}

	/**
	 * Adds sender data to pacsoft object
	 *
	 * @param array   $data pacsoft sender data
	 */
	public function addSender( Pacsoft_sender $sender ) {
		$this->senderRegistry[] = $sender;
	}

	/**
	 * Adds sender data to pacsoft object
	 *
	 * @param array   $data pacsoft sender data
	 */
	public function addReciever( Pacsoft_reciever $reciever ) {
		$this->recieverRegistry[] = $reciever;
	}

	/**
	 * Adds shipment data to pacsoft object
	 *
	 * @param array   $data pacsoft sender data
	 */
	public function addShipment( array $data ) {
		$this->shipmentRegistry[] = new Pacsoft_shipment( $data );
	}

	/**
	 * Outputs xml version of pacsoft object.
	 *
	 * @return string xml output of pacsoft
	 */
	public function toXML() {
		$this->CI->load->library( 'xml_writer' );

		$xml = new Xml_writer();
		$xml->setCharSet( "UTF-8" );
		$xml->setXmlVersion( $this->xmlVersion );
		$xml->setRootName( 'data' );
		$xml->initiate();


		foreach ( $this->senderRegistry as $sender ) {

			$xml->startBranch( 'sender', array( 'sndid' => $sender->id ) );

			if ($sender->name != null) $xml->addNode( 'val', $sender->name, array( 'n' => 'name' ) );
			if ($sender->address != null) $xml->addNode( 'val', $sender->address, array( 'n' => 'address1' ) );
			if ($sender->address2 != null) $xml->addNode( 'val', $sender->address2, array( 'n' => 'address2' ) );
			if ($sender->zipCode) $xml->addNode( 'val', $sender->zipCode, array( 'n' => 'zipcode' ) );
			if ($sender->city) $xml->addNode( 'val', $sender->city, array( 'n' => 'city' ) );
			if ($sender->country) $xml->addNode( 'val', $sender->country, array( 'n' => 'country' ) );
			if ($sender->contact) $xml->addNode( 'val', $sender->contact, array( 'n' => 'contact' ) );
			if ($sender->phone) $xml->addNode( 'val', $sender->phone, array( 'n' => 'phone' ) );
			if ($sender->fax) $xml->addNode( 'val', $sender->fax, array( 'n' => 'fax' ) );
			if ($sender->email) $xml->addNode( 'val', $sender->email, array( 'n' => 'email' ) );
			if ($sender->sms) $xml->addNode( 'val', $sender->sms, array( 'n' => 'sms' ) );

			$xml->endBranch();

		}

		foreach ( $this->recieverRegistry as $reciever ) {

			$xml->startBranch( 'reciever', array( 'rcvid' => $reciever->rcvid ) );

			if ($reciever->name != null) $xml->addNode( 'val', $reciever->name, array( 'n' => 'name' ) );
			if ($reciever->address != null) $xml->addNode( 'val', $reciever->address, array( 'n' => 'address1' ) );
			if ($reciever->address2 != null) $xml->addNode( 'val', $reciever->address2, array( 'n' => 'address2' ) );
			if ($reciever->zipCode) $xml->addNode( 'val', $reciever->zipCode, array( 'n' => 'zipcode' ) );
			if ($reciever->city) $xml->addNode( 'val', $reciever->city, array( 'n' => 'city' ) );
			if ($reciever->country) $xml->addNode( 'val', $reciever->country, array( 'n' => 'country' ) );
			if ($reciever->contact) $xml->addNode( 'val', $reciever->contact, array( 'n' => 'contact' ) );
			if ($reciever->phone) $xml->addNode( 'val', $reciever->phone, array( 'n' => 'phone' ) );
			if ($reciever->fax) $xml->addNode( 'val', $reciever->fax, array( 'n' => 'fax' ) );
			if ($reciever->email) $xml->addNode( 'val', $reciever->email, array( 'n' => 'email' ) );
			if ($reciever->sms) $xml->addNode( 'val', $reciever->sms, array( 'n' => 'sms' ) );

			$xml->endBranch();

		}

		foreach ( $this->shipmentRegistry as $shipment ) {
			$xml->startBranch( 'shipment', array( 'orderno' => $shipment->orderNo ) );
			
			if ( $shipment->from != null ) $xml->addNode( 'val', $shipment->from, array( 'n' => 'from' ) );
			if ( $shipment->to != null ) $xml->addNode( 'val', $shipment->to, array( 'n' => 'to' ) );
			if ( $shipment->reference != null ) $xml->addNode( 'val', $shipment->reference, array( 'n' => 'reference' ) );
			if ( $shipment->freeText1 != null ) $xml->addNode( 'val', $shipment->freeText1, array( 'n' => 'freetext1' ) );
			if ( $shipment->message != null ) $xml->addNode( 'val', $shipment->message, array( 'n' => 'message' ) );
			if ( $shipment->cc != null ) $xml->addNode( 'val', $shipment->cc, array( 'n' => 'cc' ) );
			if ( $shipment->bcc != null ) $xml->addNode( 'val', $shipment->bcc, array( 'n' => 'bcc' ) );

			$xml->startBranch( 'container', array( 'type' => 'parcel' ) );

			if ( $shipment->container['copies'] != null ) $xml->addNode( 'val', $shipment->container['copies'], array( 'n' => 'copies' ) );
			if ( $shipment->container['weight'] != null ) $xml->addNode( 'val', $shipment->container['weight'], array( 'n' => 'weight' ) );
			if ( $shipment->container['contents'] != null ) $xml->addNode( 'val', $shipment->container['contents'], array( 'n' => 'contents' ) );

			$xml->endBranch();

			$xml->endBranch();
		}

		return $xml->getXml( false );
	}
}
