<?php

/**
 * Configuration metadata for NavigatorHelper.
 * Defines the editable fields shown in the Admin Panel.
 * v20260317
 */

$meta['label_topics'] = ['string'];
$meta['label_latest'] = ['string'];
$meta['label_oldest'] = ['string'];
$meta['label_az']     = ['string'];

$meta['label_customlink']   = ['string']; 
$meta['customlink_url'] = ['string'];
$meta['customlink_newtab'] = ['onoff'];




/**
 * Marker is visible but not editable in the UI.
 */
$meta['marker_autoindex'] = ['string'];

/**
 * Articles to ignore when alphabetical sorting.
 * Comma‑separated list, editable in the Admin Panel.
 */

// Using 'multiline' instead of 'string' avoids a long scrolling list of terms
$meta['articles'] = array('multiline');


