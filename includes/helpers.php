<?php

function scfwc_get_payout_schedule( $user_id = 0 ) {

	$wc_stripe_settings = get_option( 'woocommerce_stripe_settings', array() );
	$user               = $user_id ? get_user_by( 'id', $user_id ) : wp_get_current_user();
	$payout_schedule    = [];
	$prefix             = 'connect_payout_schedule_';

	// Default to global settings, if user settings are not set.
	foreach ( $wc_stripe_settings as $key => $value ) {

		// We only want to assign payout_schedule variables here.
		if ( false === stristr( $key, $prefix ) ) {
			continue;
		}

		$_key = str_replace( $prefix, '', $key );

		$user_settings = $user->payout_schedule;

		if ( ! empty( $user_settings ) && ! empty( $user_settings[ $key ] ) ) {
			$payout_schedule[ $_key ] = $user_settings[ $key ];
		} else {
			$payout_schedule[ $_key ] = $value;
		}

	}

	return apply_filters( 'scfwc_get_payout_schedule', $payout_schedule, $user );
}

function scfwc_get_seller_commission( $user_id = 0 ) {

	$wc_stripe_settings = get_option( 'woocommerce_stripe_settings', array() );
	$user               = $user_id ? get_user_by( 'id', $user_id ) : wp_get_current_user();
	$user_commission    = $user->connect_default_commission;

	$seller_commission = ! empty( $user_commission ) ? $user_commission : $wc_stripe_settings['connect_default_commission'];

	return apply_filters( 'scfwc_get_seller_commission', $seller_commission, $user );
}
