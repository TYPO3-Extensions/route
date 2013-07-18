<?php

  //////////////////////////////////
  //
  // TEMPLATE
  
  // Template file for
  // typo3conf/realurl_conf.php

  // INDEX
  // Default real URL configuration
  // Real URL configuration for all pages
  // rootpage_id
  // typo3-route.de



  //////////////////////////////////
  //
  // Default real URL configuration

$TYPO3_CONF_VARS['EXTCONF']['realurl'] = array
(
  '_DEFAULT' => array
  (
    'init' => array
    (
      'respectSimulateStaticURLs' => 0,
      'enableCHashCache'          => 1,
      'appendMissingSlash'        => 'ifNotFile',
      'enableUrlDecodeCache'      => 1,
      'enableUrlEncodeCache'      => 1,
      'reapplyAbsRefPrefix'       => 1,
    ),
    'pagePath' => array
    (
      'type'              => 'user',
      'userFunc'          => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
      'spaceCharacter'    => '-',
      'languageGetVar'    => 'L',
      'expireDays'        => 7,
      'rootpage_id'       => 0,
      'firstHitPathCache' => 1,
    ),
    'preVars' => array
    (
      array
      (
        'GETvar'    => 'no_cache',
        'valueMap'  => array
        (
          'nc' => 1,
        ),
        'noMatch' => 'bypass',
      ),
    ),
  ),
);
  // Default real URL configuration



  //////////////////////////////////
  //
  // Real URL configuration for all pages

$TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT']['postVarSets'] = array
(
  '_DEFAULT' => array 
  (
    // news: organiser_news
    'news' => array 
    (
      array
      (
        'GETvar' => 'tx_browser_pi1[showUid]',
        'lookUpTable' => array
        (
          'table'               => 'tx_organiser_news',
          'id_field'            => 'uid',
          'alias_field'         => 'title',
          'addWhereClause'      => ' AND NOT deleted AND NOT hidden',
          'useUniqueCache'      => 1,
          'useUniqueCache_conf' => array
          (
            'strtolower'      => 1,
            'spaceCharacter'  => '-',
          ),
        )
      ),
    ),
    'browse' => array 
    (
      array 
      (
        'GETvar' => 'tx_browser_pi1[azTab]',
      ),
      array 
      (
        'GETvar' => 'tx_browser_pi1[pointer]',
      ),
    ),
    'sort' => array 
    (
      array 
      (
        'GETvar' => 'tx_browser_pi1[sort]',
      ),
    ),
    'suche' => array 
    (
      array 
      (
        'GETvar' => 'tx_browser_pi1[sword]',
      ),
    ),
  ),
);
  // Real URL configuration for all pages



  //////////////////////////////////////////////
  //
  // rootpage_id

  // typo3-route.de        8065

$TYPO3_CONF_VARS['EXTCONF']['realurl']['typo3-route.de'] = $TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT'];
$TYPO3_CONF_VARS['EXTCONF']['realurl']['typo3-route.de']['pagePath']['rootpage_id'] = 8065;
  // rootpage_id



  //////////////////////////////////////////////
  //
  // typo3-route.de

$TYPO3_CONF_VARS['EXTCONF']['realurl']['typo3-route.de']['postVarSets']['_DEFAULT'] = array(
  'poi' => array(
    array(
      'GETvar'      => 'tx_browser_pi1[markerUid]' ,
      'lookUpTable' => array(
        'table'               => 'tx_route_marker',
        'id_field'            => 'uid',
        'alias_field'         => 'title',
        'addWhereClause'      => ' AND NOT deleted AND NOT hidden',
        'useUniqueCache'      => 1,
        'useUniqueCache_conf' => array(
          'strtolower'     => 1,
          'spaceCharacter' => '-',
        ),
      ),
    ),
  ),
  'pfad' => array(
    array(
      'GETvar'      => 'tx_browser_pi1[routeUid]' ,
      'lookUpTable' => array(
        'table'               => 'tx_route_path',
        'id_field'            => 'uid',
        'alias_field'         => 'title',
        'addWhereClause'      => ' AND NOT deleted AND NOT hidden',
        'useUniqueCache'      => 1,
        'useUniqueCache_conf' => array(
          'strtolower'     => 1,
          'spaceCharacter' => '-',
        ),
      ),
    ),
  ),
  'index' => array(
    array(
      'GETvar' => 'tx_browser_pi1[azTab]' ,
    ),
  ),
  'ansicht' => array(
    array(
      'GETvar' => 'tx_browser_pi1[mode]' ,
    ),
  ),
  'seite' => array(
    array(
      'GETvar' => 'tx_browser_pi1[pointer]' ,
    ),
  ),
  'element' => array(
    array(
      'GETvar'      => 'tx_browser_pi1[plugin]' ,
      'lookUpTable' => array(
        'table'               => 'tt_content',
        'id_field'            => 'uid',
        'alias_field'         => 'header',
        'addWhereClause'      => ' AND NOT deleted AND NOT hidden',
        'useUniqueCache'      => 1,
        'useUniqueCache_conf' => array(
          'strtolower'     => 1,
          'spaceCharacter' => '-',
        ),
      ),
    ),
  ),
  'sort' => array(
    array(
     'GETvar' => 'tx_browser_pi1[sort]' ,
    ),
  ),
  'suche' => array(
    array(
      'GETvar' => 'tx_browser_pi1[sword]' ,
    ),
  ),
);
  // typo3-route.de

?>