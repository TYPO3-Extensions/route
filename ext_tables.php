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
  // Configuration by the extension manager




  ////////////////////////////////////////////////////////////////////////////
  //
  // Enables the Include Static Templates

  // Case $beLanguage
switch( true ) 
{
  case( $beLanguage == 'de' ):
      // German
    t3lib_extMgm::addStaticFile($_EXTKEY, 'static/',              'Route');
    t3lib_extMgm::addStaticFile($_EXTKEY, 'static/css/',          '+Route CSS');
//    switch( true )
//    {
//      case( $typo3Version < 4007000 ):
//        t3lib_extMgm::addStaticFile($_EXTKEY,'static/typo3/4.6/', '+Flip it!: Basis fuer TYPO3 < 4.7 (einbinden!)');
//        break;
//      default:
//        t3lib_extMgm::addStaticFile($_EXTKEY,'static/typo3/4.6/', '+Flip it!: Basis fuer TYPO3 < 4.7 (NICHT einbinden!)');
//        break;
//    }
    break;
  default:
      // English
    t3lib_extMgm::addStaticFile($_EXTKEY, 'static/',              'Route');
    t3lib_extMgm::addStaticFile($_EXTKEY, 'static/css/',          '+Route CSS');
//    switch( true )
//    {
//      case( $typo3Version < 4007000 ):
//        t3lib_extMgm::addStaticFile($_EXTKEY,'static/typo3/4.6/', '+Flip it!: Basis for TYPO3 < 4.7 (obligate!)');
//        break;
//      default:
//        t3lib_extMgm::addStaticFile($_EXTKEY,'static/typo3/4.6/', '+Flip it!: Basis for TYPO3 < 4.7 (don\'t use it!)');
//        break;
//    }
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
  ),
);
  // Path

  // POI
$TCA['tx_route_poi'] = array (
  'ctrl' => array (
    'title'             => 'LLL:EXT:route/locallang_db.xml:tx_route_poi',
    'label'             => 'title',  
    'tstamp'            => 'tstamp',
    'crdate'            => 'crdate',
    'cruser_id'         => 'cruser_id',
    'delete'            => 'deleted',  
    'default_sortby'    => 'ORDER BY title',  
    'hideAtCopy'        => true,
    'enablecolumns'     => array (
      'disabled'  => 'hidden',
      'starttime' => 'starttime',
      'endtime'   => 'endtime',
      'fe_group'  => 'fe_group',
    ),
    'dividers2tabs'     => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath( $_EXTKEY ) . 'tca.php',
    'iconfile'          => t3lib_extMgm::extRelPath( $_EXTKEY ) . 'files/img/route.png',
  ),
);
  // POI
  
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
    'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif',
    'type'              => 'type',
    'typeicon_column'   => 'type',
    'typeicons'         => array(
      'cat_text'  => '../typo3conf/ext/route/ext_icon/cat_text.gif',
      'cat_color' => '../typo3conf/ext/route/ext_icon/cat_color.gif',
      'cat_image' => '../typo3conf/ext/route/ext_icon/cat_image.gif',
    ),
  ),
);
  // Category
  // TCA for tables



  ////////////////////////////////////
  //
  // addToInsertRecords

t3lib_extMgm::addToInsertRecords( 'tx_route_category');
t3lib_extMgm::addToInsertRecords( 'tx_route_path');
t3lib_extMgm::addToInsertRecords( 'tx_route_poi');
  // addToInsertRecords




?>