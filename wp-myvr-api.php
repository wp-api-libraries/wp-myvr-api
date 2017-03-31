<?php
/**
 * WP MYVR API (https://developer.myvr.com/api/#/overview)
 *
 * @package WP-MYVR-API
 */

/*
Plugin Name: WP MYVR API
Plugin URI: https://github.com/wp-api-libraries/wp-myvr-api
Description: Perform API requests to myvr in WordPress.
Author: WP API Libraries
Version: 1.0.0
Text Domain: wp-myvr-api
Author URI: https://wp-api-libraries.com/
GitHub Plugin URI: https://github.com/wp-api-libraries/wp-myvr-api
GitHub Branch: master
*/

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* Check if class exists. */
if ( ! class_exists( 'MyVrAPI' ) ) {

	/**
	 * MyVrAPIclass.
	 */
	class MyVrAPI {

		/**
		 * API Key.
		 *
		 * @var string
		 */
		static private $api_key;

		 /**
		  * URL to the API.
		  *
		  * @var string
		  */
		private $base_uri = 'https://api.myvr.com/v1/';

		/**
		 * __construct function.
		 *
		 * @access public
		 * @return void
		 */
		public function __construct( $api_key ) {

			static::$api_key = $api_key;

			$this->args['headers'] = array(
				'Authorization:' => 'Bearer ' . $api_key,
			);

		}

		 /**
		  * Fetch the request from the API.
		  *
		  * @access private
		  * @param mixed $request Request URL.
		  * @return $body Body.
		  */
		private function fetch( $request ) {
			$response = wp_remote_get( $request );
			$code = wp_remote_retrieve_response_code( $response );
			if ( 200 !== $code ) {
				return new WP_Error( 'response-error', sprintf( __( 'Server response code: %d', 'wp-myvr-api' ), $code ) );
			}
			$body = wp_remote_retrieve_body( $response );
			return json_decode( $body );
		}

		/* PROPERTIES. */

		public function add_property() {

		}

		public function get_property() {

		}

		public function update_property() {

		}

		public function delte_property() {

		}

		public function get_properties() {

			// https://api.myvr.com/v1/properties/

			$request = $this->base_uri . 'properties/';
			return $this->fetch( $request );

		}

		/* RATES. */



		/* FEES. */

		/* PHOTOS. */

		/* ROOMS. */

		/* AMENITIES. */

		/* AVAILABILITY. */

		/* CALENDAR EVENTS. */

		/* BOOKING - INQUIRIES. */

		/* BOOKING - QUOTES. */

		/* BOOKING - RESERVATIONS. */

	} // End Class.
} // End Class Check.
