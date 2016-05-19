<?php

/**
 * Custom handles for custom fields
 *
 * @package   PT_Content_Views_Pro
 * @author    PT Guy <http://www.contentviewspro.com/>
 * @license   GPL-2.0+
 * @link      http://www.contentviewspro.com/
 * @copyright 2014 PT Guy
 */
if ( !class_exists( 'PT_CV_CustomField' ) ) {

	/**
	 * @name PT_CV_CustomField
	 * @todo Utility functions
	 */
	class PT_CV_CustomField {
		/**
		 * Generate final output for csutom field
		 *
		 * @param array $field_values
		 *
		 * @return string
		 */
		public static function display_output( $field_values ) {
			$result = array();

			foreach ( $field_values as $value ) {
				$output = apply_filters( PT_CV_PREFIX_ . 'use_wp_oembed_get', true ) ? wp_oembed_get( $value ) : $value;

				if ( !$output ) {
					$output = '';

					$pathinfo	 = pathinfo( $value );
					$extension	 = isset( $pathinfo[ 'extension' ] ) ? strtolower( $pathinfo[ 'extension' ] ) : '';

					// If email
					if ( is_email( $value ) ) {
						$output = sprintf( '<a target="_blank" href="mailto:%1$s">%1$s</a>', antispambot( $value ) );
					}
					// Image
					else if ( preg_match( '/(gif|png|jp(e|g|eg)|bmp|ico|webp|jxr|svg)/i', $extension ) ) {
						$output = self::image( $value, $pathinfo[ 'filename' ] );
					}
					// Mp3
					else if ( $extension == 'mp3' ) {
						$output = self::embed_audio( $value );
					}
					// Mp4
					else if ( $extension == 'mp4' ) {
						$output = self::embed_video( $value );
					}
					// Normal url
					else if ( !filter_var( $value, FILTER_VALIDATE_URL ) === false ) {
						$output = sprintf( '<a target="_blank" href="%s">%s</a>', esc_attr( $value ), esc_html( $value ) );
					}
					// Support serialized data (such as: wp-types checkbox)
					else if ( is_array( $_arr = @unserialize( $value ) ) ) {
						#!
						# change $entry[ 0 ] to $entry in other cases
						#!
						$output = implode( ', ', array_map( array( __CLASS__, 'getfirst' ), $_arr ) );
					}
				}

				$result[] = $output;
			}


			return implode( ',', $result );
		}

		public static function getfirst( $entry ) {
			return $entry[ 0 ];
		}

		/**
		 * Image
		 *
		 * @param string $value
		 * @return string
		 */
		public static function image( $value, $name ) {
			return sprintf( '<img class="%s" src="%s" title="%s" style="width: 100%%">', PT_CV_PREFIX . 'ctf-image', esc_url( $value ), esc_attr( $name ) );
		}

		/**
		 * Embed audio code
		 *
		 * @param string $value
		 * @return string
		 */
		public static function embed_audio( $value ) {
			return '<audio controls>
					<source src="' . esc_url( $value ) . '" type="audio/mpeg">
					Your browser does not support the audio element.
					</audio>';
		}

		/**
		 * Embed audio code
		 *
		 * @param string $value
		 * @return string
		 */
		public static function embed_video( $value ) {
			return '<video controls>
					<source src="' . esc_url( $value ) . '" type="video/mp4">
					Your browser does not support HTML5 video.
					</video>';
		}

	}

}