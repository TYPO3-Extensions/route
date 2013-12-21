<?php
if( ! defined( 'TYPO3_MODE' ) )
{
  die( 'Access denied.' );
}



  ////////////////////////////////////////////////////////////////////////////
  //
  // INDEX

  // Set TYPO3 version
  // Configuration by the extension manager
  //    Localization support
  // Enables the Include Static Templates
  // Add pagetree icons
  // TCA for tables
  // addToInsertRecords



  ////////////////////////////////////////////////////////////////////////////
  //
  // Set TYPO3 version

  // Set TYPO3 version as integer (sample: 4.7.7 -> 4007007)
list( $main, $sub, $bugfix ) = explode( '.', TYPO3_version );
$version = ( ( int ) $main ) * 1000000;
$version = $version + ( ( int ) $sub ) * 1000;
$version = $version + ( ( int ) $bugfix ) * 1;
$typo3Version = $version;
  // Set TYPO3 version as integer (sample: 4.7.7 -> 4007007)

if( $typo3Version < 3000000 ) 
{
  $prompt = '<h1>ERROR</h1>
    <h2>Unproper TYPO3 version</h2>
    <ul>
      <li>
        TYPO3 version is smaller than 3.0.0
      </li>
      <li>
        constant TYPO3_version: ' . TYPO3_version . '
      </li>
      <li>
        integer $this->typo3Version: ' . ( int ) $this->typo3Version . '
      </li>
    </ul>
      ';
  die ( $prompt );
}
  // Set TYPO3 version

    

  ////////////////////////////////////////////////////////////////////////////
  //
  // Configuration by the extension manager

$confArr  = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['route']);

  // Language for labels of static templates and page tsConfig
$beLanguage = $confArr['beLanguage'];
switch( $beLanguage )
{
  case( 'German'):
    $beLanguage = 'de';
    break;
  default:
    $beLanguage = 'default';
}
  // Language for labels of static templates and page tsConfig

$geocodingEnabled = $confArr['geocodingEnabled'];
  // Configuration by the extension manager




  ////////////////////////////////////////////////////////////////////////////
  //
  // Enables the Include Static Templates

  // Case $beLanguage
switch( true ) 
{
  case( $beLanguage == 'de' ):
      // German
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'static/',          'Route' );
    switch( true )
    {
      case( $typo3Version < 4007000 ):
        t3lib_extMgm::addStaticFile($_EXTKEY,'static/typo3/4.6/', '+Route: TYPO3 < 4.7 (einbinden!)');
        break;
      default:
        t3lib_extMgm::addStaticFile($_EXTKEY,'static/typo3/4.6/', '+Route: TYPO3 < 4.7 (NICHT einbinden!)');
        break;
    }
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'static/dev/47676', '+Route (dev 47676)');
    break;
  default:
      // English
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'static/',          'Route' );
    switch( true )
    {
      case( $typo3Version < 4007000 ):
        t3lib_extMgm::addStaticFile($_EXTKEY,'static/typo3/4.6/', '+Route: TYPO3 < 4.7 (obligate!)');
        break;
      default:
        t3lib_extMgm::addStaticFile($_EXTKEY,'static/typo3/4.6/', '+Route: TYPO3 < 4.7 (don\'t use it!)');
        break;
    }
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'static/dev/47676', '+Route (dev 47676)' );
    break;
}
  // Case $beLanguage
  // Enables the Include Static Templates
  


  ////////////////////////////////////////////////////////////////////////////
  //
  // Add pagetree icons

  // Case $beLanguage
switch( true )
{
  case( $beLanguage == 'de' ):
      // German
    $TCA['pages']['columns']['module']['config']['items'][] =
       array( 'Route', 'route', t3lib_extMgm::extRelPath( $_EXTKEY ).'files/img/route.png' );
    break;
  default:
      // English
    $TCA['pages']['columns']['module']['config']['items'][] =
       array( 'Route', 'route', t3lib_extMgm::extRelPath( $_EXTKEY ).'files/img/route.png' );
}
  // Case $beLanguage

t3lib_SpriteManager::addTcaTypeIcon('pages', 'contains-route', '../typo3conf/ext/route/files/img/route.png');
  // Add pagetree icons



  ///////////////////////////////////////////////////////////
  //
  // Methods for backend workflows

//require_once(t3lib_extMgm::extPath($_EXTKEY).'lib/flexform/class.tx_route_flexform.php');
require_once(t3lib_extMgm::extPath($_EXTKEY).'lib/userfunc/class.tx_route_userfunc.php');
  // Methods for backend workflows



  ////////////////////////////////////
  //
  // TCA for tables

  // Path
$TCA['tx_route_path'] = array (
  'ctrl' => array (
    'title'                     => 'LLL:EXT:route/locallang_db.xml:tx_route_path',
    'label'                     => 'title',  
    'tstamp'                    => 'tstamp',
    'crdate'                    => 'crdate',
    'cruser_id'                 => 'cruser_id',
    'languageField'             => 'sys_language_uid',
    'transOrigPointerField'     => 'l10n_parent',
    'transOrigDiffSourceField'  => 'l10n_diffsource',
    'delete'                    => 'deleted',  
    'default_sortby'            => 'ORDER BY title',  
    'hideAtCopy'                => true,
    'enablecolumns'             => array (
      'disabled'  => 'hidden',
      'starttime' => 'starttime',
      'endtime'   => 'endtime',
      'fe_group'  => 'fe_group',
    ),
    'dividers2tabs'     => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath( $_EXTKEY ) . 'tca.php',
    'iconfile'          => t3lib_extMgm::extRelPath( $_EXTKEY ) . 'files/img/route.png',
    'searchFields'      => 'title,short,bodytext,url,' 
      . 'tx_route_category,' 
      . 'tx_route_marker,' 
      . 'list_title,list_short,map_title,map_short,' 
      . 'address_start,address_end,' 
      . 'seo_keywords,seo_description',
    'tx_browser'  => array (
        'route' => array (
          'gpxfile' => 'gpxfile',  
          'geodata' => 'geodata',  
        ),
        
    ),
  ),
);
  // Path

  // Marker
$TCA['tx_route_marker'] = array (
  'ctrl' => array (
    'title'                     => 'LLL:EXT:route/locallang_db.xml:tx_route_marker',
    'label'                     => 'title',  
    'tstamp'                    => 'tstamp',
    'crdate'                    => 'crdate',
    'cruser_id'                 => 'cruser_id',
    'languageField'             => 'sys_language_uid',
    'transOrigPointerField'     => 'l10n_parent',
    'transOrigDiffSourceField'  => 'l10n_diffsource',
    'delete'                    => 'deleted',  
    'default_sortby'            => 'ORDER BY title',  
    'hideAtCopy'                => true,
    'enablecolumns'             => array (
      'disabled'  => 'hidden',
      'starttime' => 'starttime',
      'endtime'   => 'endtime',
      'fe_group'  => 'fe_group',
    ),
    'dividers2tabs'     => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath( $_EXTKEY ) . 'tca.php',
    'iconfile'          => t3lib_extMgm::extRelPath( $_EXTKEY ) . 'files/img/route.png',
    'searchFields'      => 'title,short,bodytext,tx_route_category,addressname,street,zip,city,areaLevel2,areaLevel1,country,phone,fax,email,url,tx_route_path,list_title,list_short,map_title,map_short,seo_keywords,seo_description',
    'tx_browser'        => array (
      'geoupdate' => array (
        'address' => array (
          'country'     => 'country',
          'areaLevel1'  => 'areaLevel1',
          'areaLevel2'  => 'areaLevel2',
          'location'    => array (
            'zip'   => 'zip',  
            'city'  => 'city',  
          ),
          'street'  => array (
            'name'    => 'street',  
            'number'  => null,  
          ),
        ),
        'api' => array (
          'prompt'    => 'geoupdateprompt',  
          'forbidden' => 'geoupdateforbidden',  
        ),
        'geodata' => array (
          'lat'     => 'lat',  
          'lon'     => 'lon',  
        ),
        'update'  => $geocodingEnabled,  
      ),
    ),
  ),
);
  // Marker
  
  // Category
$TCA['tx_route_category'] = array (
  'ctrl' => array (
    'title'             => 'LLL:EXT:route/locallang_db.xml:tx_route_category',
    'label'             => 'title',  
    'tstamp'            => 'tstamp',
    'crdate'            => 'crdate',
    'cruser_id'         => 'cruser_id',
    'delete'            => 'deleted',
    'enablecolumns'   => array (
      'disabled'  => 'hidden',
    ),
    'sortby'            => 'sorting',
    'dividers2tabs'     => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath( $_EXTKEY ) . 'tca.php',
    'thumbnail'         => 'image',
    'iconfile'          => t3lib_extMgm::extRelPath( $_EXTKEY ) . 'files/img/route.png',
    'searchFields'      =>  'title,title,title_lang_ol,formlabelcss',
  ),
);
  // Category
  // TCA for tables



  ////////////////////////////////////
  //
  // addToInsertRecords

t3lib_extMgm::addToInsertRecords( 'tx_route_category');
t3lib_extMgm::addToInsertRecords( 'tx_route_path');
t3lib_extMgm::addToInsertRecords( 'tx_route_marker');
  // addToInsertRecords




?>