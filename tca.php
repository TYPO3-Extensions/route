<?php
if (!defined ('TYPO3_MODE'))  die ('Access denied.');



  ///////////////////////////////////////
  // 
  // INDEX
  // 
  // Other wizards and config drafts
  // tx_route_category
  // tx_route_path
  // tx_route_poi



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // 
  // Other wizards and config drafts

  $bool_exclude_default = true;

  $arr_wizard_url = array (
    'type'      => 'input',
    'size'      => '80',
    'max'       => '256',
    'checkbox'  => '',
    'eval'      => 'trim',
    'wizards'   => array (
      '_PADDING'  => '2',
      'link'      => array (
        'type'         => 'popup',
        'title'        => 'Link',
        'icon'         => 'link_popup.gif',
        'script'       => 'browse_links.php?mode=wizard',
        'JSopenParams' => $JSopenParams,
      ),
    ),
    'softref' => 'typolink',
  );

  $conf_file_gpx = array (
    'type'          => 'group',
    'internal_type' => 'file',
    'allowed'       => 'gpx',
    'disallowed'    => '', 
    'max_size'      => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'], 
    'uploadfolder'  => 'uploads/tx_route',
    'show_thumbs'   => 1,
    'size'          => 1,
    'minitems'      => 0,
    'maxitems'      => 1,
  );

  $conf_file_image = array (
    'type'          => 'group',
    'internal_type' => 'file',
    'allowed'       => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
    'max_size'      => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
    'uploadfolder'  => 'uploads/tx_route',
    'show_thumbs'   => 1,
    'size'          => 3,
    'minitems'      => 0,
    'maxitems'      => 20,
  );

  $conf_file_one_image             = $conf_file_image;
  $conf_file_one_image['size']     =  1;
  $conf_file_one_image['maxitems'] = 99;

  $conf_file_icon = array (
    'type'          => 'group',
    'internal_type' => 'file',
    'allowed'       => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
    'max_size'      => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
    'uploadfolder'  => 'uploads/tx_route',
    'show_thumbs'   => 1,
    'size'          => 1,
    'minitems'      => 0,
    'maxitems'      => 1,
  );

  $conf_input_30_trim = array (
    'type' => 'input',
    'size' => '30',
    'eval' => 'trim'
  );

  $conf_input_30 = array (
    'type' => 'input',
    'size' => '30',
  );

  $conf_input_30_trimRequired = array (
    'type' => 'input',
    'size' => '30',
    'eval' => 'trim,required'
  );
  
  $conf_input_80_trim = array (
    'type' => 'input',
    'size' => '80',
    'eval' => 'trim'
  );
  $conf_text_30_05 = array (
    'type' => 'text',
    'cols' => '30', 
    'rows' => '5',
  );
  $conf_text_30_05_trimRequired = array (
    'type' => 'text',
    'cols' => '30', 
    'rows' => '5',
    'eval' => 'trim,required'
  );
  
  $conf_text_50_10 = array (
    'type' => 'text',
    'cols' => '50', 
    'rows' => '10',
  );
  
  $conf_text_rte = array (
    'type' => 'text',
    'cols' => '30',
    'rows' => '5',
    'wizards' => array (
      '_PADDING' => 2,
      'RTE' => array (
        'notNewRecords' => 1,
        'RTEonly'       => 1,
        'type'          => 'script',
        'title'         => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
        'icon'          => 'wizard_rte2.gif',
        'script'        => 'wizard_rte.php',
      ),
    ),
  );

  $conf_hidden = array (
    'exclude'   => $bool_exclude_default,
    'l10n_mode' => 'exclude',
    'label'     => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
    'config'    => array (
      'type'    => 'check',
      'default' => '0'
    ),
  );
  $conf_starttime = array (
    'exclude'   => $bool_exclude_default,
    'l10n_mode' => 'exclude',
    'label'     => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
    'config'    => array (
      'type'     => 'input',
      'size'     => '8',
      'max'      => '20',
      'eval'     => 'date',
      'default'  => '0',
      'checkbox' => '0'
    ),
  );
  $conf_endtime = array (
    'exclude'   => $bool_exclude_default,
    'l10n_mode' => 'exclude',
    'label'     => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
    'config'    => array (
      'type'     => 'input',
      'size'     => '8',
      'max'      => '20',
      'eval'     => 'date',
      'checkbox' => '0',
      'default'  => '0',
      'range'    => array (
        'upper' => mktime(0, 0, 0, date('m'), date('d'), date('Y')+30),
        'lower' => mktime(0, 0, 0, date('m')-1, date('d'), date('Y')),
      ),
    ),
  );
  $conf_fegroup = array (
    'exclude'     => $bool_exclude_default,
    //'l10n_mode'   => 'mergeIfNotBlank',
    'label'     => 'LLL:EXT:route/locallang_db.xml:tca_phrase.accessByFeGroup',
    'config'      => array (
      'type'      => 'select',
      'size'      => $size_fegroup,
      'maxitems'  => 20,
      'items' => array (
        array ('LLL:EXT:lang/locallang_general.php:LGL.hide_at_login', -1),
        array ('LLL:EXT:lang/locallang_general.php:LGL.any_login', -2),
        array ('LLL:EXT:lang/locallang_general.php:LGL.usergroups', '--div--'),
      ),
      'exclusiveKeys' => '-1,-2',
      'foreign_table' => 'fe_groups'
    ),
  );
  // Other wizards and config drafts



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //
  // tx_route_category

$TCA['tx_route_category'] = array (
  'ctrl' => $TCA['tx_route_category']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  
      'type,' . 
      'title,title_lang_ol,' . 
      'icons,icon_offset_x,icon_offset_y,' .
      'tx_route_poi,' .
      'tx_route_path,' .
      'hidden' ,
  ),
  'columns' => array (
    'title' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:route/locallang_db.xml:tx_route_category.title',
      'config'  => $conf_input_30_trimRequired,
    ),
    'title_lang_ol' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:route/locallang_db.xml:tca_phrase.lang_ol',
      'config'  => $conf_input_30_trim,
    ),
    'icons' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'   => 'LLL:EXT:route/locallang_db.xml:tx_route_category.icons',
      'config'    => $conf_file_image,
    ),
    'icon_offset_x' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:route/locallang_db.xml:tx_route_category.icon_offset_x',
      'config'    => array (
        'type'     => 'input',
        'size'     => '3',
        'max'      => '3',
        'eval'     => 'int',
        'default'  => '0',
      ),
    ),
    'icon_offset_y' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:route/locallang_db.xml:tx_route_category.icon_offset_y',
      'config'    => array (
        'type'     => 'input',
        'size'     => '3',
        'max'      => '3',
        'eval'     => 'int',
        'default'  => '0',
      ),
    ),
    'tx_route_path' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_category.tx_route_path',
      'config'    => array (
        'type'                => 'select',
        'size'                => 20,
        'minitems'            => 0,
        'maxitems'            => 99,
        'MM'                  => 'tx_route_path_mm_tx_route_category',
        'MM_opposite_field'   => 'tx_route_category',
        'foreign_table'       => 'tx_route_path',
        'foreign_table_where' => 'AND tx_route_path.pid=###CURRENT_PID### AND tx_route_path.deleted = 0 AND tx_route_path.hidden = 0 ORDER BY tx_route_path.title',
        'items' => array (
          '0' => array (
            '0' => '',
            '1' => '',
          ),
        ),
        'suppress_icons' => 1,
        'wizards' => array (
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:route/locallang_db.xml:wizard.add',
            'icon'   => 'add.gif',
            'params' => array (
              'table'    => 'tx_route_path',
              'pid'      => '###CURRENT_PID###',
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:route/locallang_db.xml:wizard.list',
            'icon'   => 'list.gif',
            'params' => array (
              'table' => 'tx_route_path',
              'pid'      => '###CURRENT_PID###',
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array (
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:route/locallang_db.xml:wizard.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => 'height=680,width=800,status=0,menubar=0,scrollbars=1',
          ),
        ),
      ),
    ),
    'tx_route_poi' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_category.tx_route_poi',
      'config'    => array (
        'type'                => 'select',
        'size'                => 20,
        'minitems'            => 0,
        'maxitems'            => 99,
        'MM'                  => 'tx_route_poi_mm_tx_route_category',
        'MM_opposite_field'   => 'tx_route_category',
        'foreign_table'       => 'tx_route_poi',
        'foreign_table_where' => 'AND tx_route_poi.pid=###CURRENT_PID### AND tx_route_poi.deleted = 0 AND tx_route_poi.hidden = 0 ORDER BY tx_route_poi.title',
        'items' => array (
          '0' => array (
            '0' => '',
            '1' => '',
          ),
        ),
        'suppress_icons' => 1,
        'wizards' => array (
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:route/locallang_db.xml:wizard.add',
            'icon'   => 'add.gif',
            'params' => array (
              'table'    => 'tx_route_poi',
              'pid'      => '###CURRENT_PID###',
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:route/locallang_db.xml:wizard.list',
            'icon'   => 'list.gif',
            'params' => array (
              'table' => 'tx_route_poi',
              'pid'      => '###CURRENT_PID###',
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array (
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:route/locallang_db.xml:wizard.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => 'height=680,width=800,status=0,menubar=0,scrollbars=1',
          ),
        ),
      ),
    ),
    'hidden'    => $conf_hidden,
  ),
  'types' => array (
    '0' => array ( 'showitem' =>
      '--div--;LLL:EXT:route/locallang_db.xml:tx_route_category.div_cat,' .
        'type,title;;1;;1-1-1,' .
      '--div--;LLL:EXT:route/locallang_db.xml:tx_route_category.div_icon,   ' .
        '--palette--;LLL:EXT:route/locallang_db.xml:tca_phrase.icons;icons,' .
      '--div--;LLL:EXT:route/locallang_db.xml:tx_route_category.div_path,   ' .
        'tx_route_path,' .
      '--div--;LLL:EXT:route/locallang_db.xml:tx_route_category.div_poi,   ' .
        'tx_route_poi,' .
      '--div--;LLL:EXT:route/locallang_db.xml:tx_route_category.div_control,' .
        'hidden'
    ),
  ),
  'palettes' => array (
    '1'               => array ('showitem' => 'title_lang_ol'),
    'icons'      => array (
      'showitem'        =>  
          'icons;LLL:EXT:route/locallang_db.xml:tca_phrase.files,' 
        . '--linebreak--,'
        . 'icon_offset_x;LLL:EXT:route/locallang_db.xml:tx_route_category.icon_offset_x,' 
        . 'icon_offset_y;LLL:EXT:route/locallang_db.xml:tx_route_category.icon_offset_y,' 
        ,
      'canNotCollapse'  =>  1,
    ),
  ),
);
  // tx_route_category



  ///////////////////////////////////////
  // 
  // tx_route_path
  
$TCA['tx_route_path'] = array (
  'ctrl' => $TCA['tx_route_path']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  
        'sys_language_uid,l10n_parent,l10n_diffsource,' 
      . 'title,tx_route_category,short,bodytext,' 
      . 'gpxfile, gpxdata,' 
      . 'icon,iconwidth,iconheight,icon_lat,icon_lon,color,line_width,' 
      . 'tx_route_poi,' 
      . 'list_title,list_short,map_title,map_short,' 
      . 'address_start,address_end,url,' 
      . 'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,' 
      . 'hidden,starttime,endtime,fe_group,'
      . 'seo_keywords,seo_description' 
      ,
  ),
  'feInterface' => $TCA['tx_route_path']['feInterface'],
  'columns' => array (
    'sys_language_uid' => array (
      'exclude' => 1,
      'label'   => 'LLL:EXT:lang/locallang_general.php:LGL.language',
      'config'  => array (
        'type'                => 'select',
        'foreign_table'       => 'sys_language',
        'foreign_table_where' => 'AND sys_language.hidden = 0 ORDER BY sys_language.title',
        'items' => array (
          array ('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
          array ('LLL:EXT:lang/locallang_general.php:LGL.default_value',0),
        ),
      ),
    ),
    'l10n_parent' => array (
      'displayCond' => 'FIELD:sys_language_uid:>:0',
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
      'config' => array (
        'type' => 'select',
        'items' => array (
          array ('', 0),
        ),
        'foreign_table' => 'tx_route_path',
        'foreign_table_where' => 'AND tx_route_path.uid=###REC_FIELD_l10n_parent### AND tx_route_path.sys_language_uid IN (-1,0)',
      ),
    ),
    'l10n_diffsource' => array (
      'config' => array (
        'type' => 'passthrough'
      ),
    ),
    'title' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_path.title',
      'config'    => $conf_input_30_trimRequired,
    ),
    'tx_route_category' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_path.tx_route_category',
      'config'    => array (
        'type'                => 'select',
        'size'                => 2,
        'minitems'            => 0,
        'maxitems'            => 1,
        'MM'                  => 'tx_route_path_mm_tx_route_category',
        'foreign_table'       => 'tx_route_category',
        'foreign_table_where' => 'AND tx_route_category.pid=###CURRENT_PID### AND tx_route_category.deleted = 0 AND tx_route_category.hidden = 0 ORDER BY tx_route_category.title',
        'items' => array (
          '0' => array (
            '0' => '',
            '1' => '',
          ),
        ),
        'suppress_icons' => 1,
        'wizards' => array (
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:route/locallang_db.xml:wizard.add',
            'icon'   => 'add.gif',
            'params' => array (
              'table'    => 'tx_route_category',
              'pid'      => '###CURRENT_PID###',
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:route/locallang_db.xml:wizard.list',
            'icon'   => 'list.gif',
            'params' => array (
              'table' => 'tx_route_category',
              'pid'      => '###CURRENT_PID###',
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array (
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:route/locallang_db.xml:wizard.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => 'height=680,width=800,status=0,menubar=0,scrollbars=1',
          ),
        ),
      ),
    ),
    'short' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_path.short',
      'config'    => $conf_text_30_05,
    ),
    'bodytext' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_path.bodytext',
      'config'    => $conf_text_rte,
    ),
    'gpxfile' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_path.gpxfile',
      'config'    => $conf_file_gpx,
    ),
    'gpxdata' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_path.gpxdata',
      'config'    => $conf_text_30_05,
    ),
    'icon' => array (
      'l10n_mode' => 'exclude',
      'exclude'   => $bool_exclude_default,
      'label'     => 'LLL:EXT:route/locallang_db.xml:tca_phrase.icon',
      'config'    => $conf_file_icon,
    ),
    'iconwidth' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imagewidth',
      'config'    => array (
        'type'      => 'input',
        'size'      => '10',
        'max'       => '10',
        'eval'      => 'trim',
        'checkbox'  => '0',
        'default'   => ''
      ),
    ),
    'iconheight' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imageheight',
      'config'    => array (
        'type'      => 'input',
        'size'      => '10',
        'max'       => '10',
        'eval'      => 'trim',
        'checkbox'  => '0',
        'default'   => ''
      ),
    ),
    'icon_lat' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_path.icon_lat',
      'config'    => $conf_input_30_trim,
    ),
    'icon_lon' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_path.icon_lon',
      'config'    => $conf_input_30_trim,
    ),
    'color' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_path.color',
      'config'  => array (
        'type'    => 'input',
        'size'    => 10,
        'eval'    => 'required,trim',
        'default' => '#800000',
        'wizards' => array (
          'colorChoice' => array (
            'type'          => 'colorbox',
            'title'         => 'LLL:EXT:examples/locallang_db.xml:tx_examples_haiku.colorPick',
            'script'        => 'wizard_colorpicker.php',
            'dim'           => '20x20',
            'tableStyle'    => 'border: solid 1px black; margin-left: 20px;',
            'JSopenParams'  => 'height=300,width=380,status=0,menubar=0,scrollbars=0',
          )
        )
      )
    ),
    'line_width' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_path.line_width',
      'config'    => array (
        'type'    => 'input',  
        'size'    => '2',
        'max'     => '2',
        'eval'    => 'required,int',
        'range'   => array (
          'lower' => '1',  
          'upper' => '99',
        ),
        'default' => '1',
      ),
    ),
    'tx_route_poi' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_path.tx_route_poi',
      'config'    => array (
        'type'                => 'select',
        'size'                => 20,
        'minitems'            => 0,
        'maxitems'            => 99,
        'MM'                  => 'tx_route_path_mm_tx_route_poi',
        'foreign_table'       => 'tx_route_poi',
        'foreign_table_where' => 'AND tx_route_poi.pid=###CURRENT_PID### AND tx_route_poi.deleted = 0 AND tx_route_poi.hidden = 0  AND tx_route_poi.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_route_poi.title',
        'items' => array (
          '0' => array (
            '0' => '',
            '1' => '',
          ),
        ),
        'suppress_icons' => 1,
        'wizards' => array (
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:route/locallang_db.xml:wizard.add',
            'icon'   => 'add.gif',
            'params' => array (
              'table'    => 'tx_route_poi',
              'pid'      => '###CURRENT_PID###',
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:route/locallang_db.xml:wizard.list',
            'icon'   => 'list.gif',
            'params' => array (
              'table' => 'tx_route_poi',
              'pid'      => '###CURRENT_PID###',
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array (
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:route/locallang_db.xml:wizard.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => 'height=680,width=800,status=0,menubar=0,scrollbars=1',
          ),
        ),
      ),
    ),
    'list_title' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_path.list_title',
      'config'    => $conf_input_30,
    ),
    'list_short' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_path.list_short',
      'config'    => $conf_text_30_05,
    ),
    'map_title' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_path.map_title',
      'config'    => $conf_input_30,
    ),
    'map_short' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_path.map_short',
      'config'    => $conf_text_30_05,
    ),
    'address_start' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_path.address_start',
      'config'    => $conf_text_30_05,
    ),
    'address_end' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_path.address_end',
      'config'    => $conf_text_30_05,
    ),
    'url' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_path.url',
      'config'    => $conf_input_30_trim,
    ),
    'image' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tca_phrase.image',
      'config'    => $conf_file_image,
    ),
    'imagecaption' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tca_phrase.imagecaption',
      'config'    => $conf_text_30_05,
    ),
    'imagecaption_position' => array (
      'exclude'   => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imagecaption_position',
      'config'    => array (
        'type' => 'select',
        'items' => array (
          array ('', ''),
          array ('LLL:EXT:cms/locallang_ttc.xml:imagecaption_position.I.1', 'center'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imagecaption_position.I.2', 'right'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imagecaption_position.I.3', 'left'),
        ),
        'default' => ''
      ),
    ),
    'imageseo' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tca_phrase.imageseo',
      'config'    => $conf_text_30_05,
    ),
    'imagewidth' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imagewidth',
      'config'    => array (
        'type'      => 'input',
        'size'      => '10',
        'max'       => '10',
        'eval'      => 'trim',
        'checkbox'  => '0',
        'default'   => ''
      ),
    ),
    'imageheight' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imageheight',
      'config'    => array (
        'type'      => 'input',
        'size'      => '10',
        'max'       => '10',
        'eval'      => 'trim',
        'checkbox'  => '0',
        'default'   => ''
      ),
    ),
    'imageorient' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imageorient',
      'config'    => array (
        'type'  => 'select',
        'items' => array (
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.0', 0, 'selicons/above_center.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.1', 1, 'selicons/above_right.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.2', 2, 'selicons/above_left.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.3', 8, 'selicons/below_center.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.4', 9, 'selicons/below_right.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.5', 10, 'selicons/below_left.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.6', 17, 'selicons/intext_right.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.7', 18, 'selicons/intext_left.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.8', '--div--'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.9', 25, 'selicons/intext_right_nowrap.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.10', 26, 'selicons/intext_left_nowrap.gif'),
        ),
        'selicon_cols'      => 6,
        'default'           => '0',
        'iconsInOptionTags' => 1,
      ),
    ),
    'imageborder' => array (
      'exclude'   => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imageborder',
      'config' => array (
        'type' => 'check'
      ),
    ),
    'image_noRows' => array (
      'exclude'   => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_noRows',
      'config'    => array (
        'type' => 'check'
      ),
    ),
    'image_link' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_link',
      'config'    => array (
        'type' => 'text',
        'cols' => '30',
        'rows' => '3',
        'wizards' => array (
          '_PADDING' => 2,
          'link' => array (
            'type' => 'popup',
            'title' => 'Link',
            'icon' => 'link_popup.gif',
            'script' => 'browse_links.php?mode=wizard',
            'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
          ),
        ),
        'softref' => 'typolink[linkList]'
      ),
    ),
    'image_zoom' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_zoom',
      'config'    => array (
        'type' => 'check'
      ),
    ),
    'image_effects' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_effects',
      'config'    => array (
        'type' => 'select',
        'items' => array (
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.0', 0),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.1', 1),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.2', 2),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.3', 3),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.4', 10),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.5', 11),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.6', 20),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.7', 23),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.8', 25),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.9', 26),
        ),
      ),
    ),
    'image_frames' => array (
      'exclude'   => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_frames',
      'config'    => array (
        'type'  => 'select',
        'items' => array (
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.0', 0),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.1', 1),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.2', 2),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.3', 3),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.4', 4),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.5', 5),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.6', 6),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.7', 7),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.8', 8),
        ),
      ),
    ),
    'image_compression' => array (
      'exclude'   => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_compression',
      'config'    => array (
        'type'  => 'select',
        'items' => array (
          array ('LLL:EXT:lang/locallang_general.php:LGL.default_value', 0),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.1', 1),
          array ('GIF/256', 10),
          array ('GIF/128', 11),
          array ('GIF/64', 12),
          array ('GIF/32', 13),
          array ('GIF/16', 14),
          array ('GIF/8', 15),
          array ('PNG', 39),
          array ('PNG/256', 30),
          array ('PNG/128', 31),
          array ('PNG/64', 32),
          array ('PNG/32', 33),
          array ('PNG/16', 34),
          array ('PNG/8', 35),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.15', 21),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.16', 22),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.17', 24),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.18', 26),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.19', 28),
        ),
      ),
    ),
    'imagecols' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imagecols',
      'config'    => array (
        'type'  => 'select',
        'items' => array (
          array ('1', 1),
          array ('2', 2),
          array ('3', 3),
          array ('4', 4),
          array ('5', 5),
          array ('6', 6),
          array ('7', 7),
          array ('8', 8),
        ),
        'default' => 1
      ),
    ),
    'hidden'    => $conf_hidden,
    'starttime' => $conf_starttime,
    'endtime'   => $conf_endtime,
    'fe_group'  => $conf_fegroup,
    'seo_keywords'  => array (
      'exclude'   => $bool_exclude_default,
      'label'     => 'LLL:EXT:route/locallang_db.xml:tca_phrase.seo_keywords',
      'l10n_mode' => 'prefixLangTitle',
      'config'    => $conf_input_80_trim,
    ),
    'seo_description' => array (
      'exclude'   => $bool_exclude_default,
      'label'     => 'LLL:EXT:route/locallang_db.xml:tca_phrase.seo_description',
      'l10n_mode' => 'prefixLangTitle',
      'config'    => $conf_text_50_10,
    ),
  ),
  'types' => array (
    '0' => array(
      'showitem' => 
        '--div--;LLL:EXT:route/locallang_db.xml:tx_route_path.div_path,' . 
          'title,' .
          'tx_route_category,' .
          'short,' .
          'bodytext;;;richtext[]:rte_transform[mode=ts];,' .
        '--div--;LLL:EXT:route/locallang_db.xml:tx_route_path.div_gpx,' . 
          'gpxfile,gpxdata,' .
        '--div--;LLL:EXT:route/locallang_db.xml:tx_route_path.div_poi,' . 
          'tx_route_poi,' .
        '--div--;LLL:EXT:route/locallang_db.xml:tx_route_path.div_design,' . 
          'icon,iconwidth,iconheight,' .
          'icon_lat,' .
          'icon_lon,' .
          'color,' .
          'line_width,' .
        '--div--;LLL:EXT:route/locallang_db.xml:tx_route_path.div_shortterms,' . 
          'list_title,' .
          'list_short,' .
          'map_title,' .
          'map_short,' .
        '--div--;LLL:EXT:route/locallang_db.xml:tx_route_path.div_address,' . 
          'address_start,' .
          'address_end,' .
          'url,' .
        '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,' .
          '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,' .
          '--palette--;LLL:EXT:route/locallang_db.xml:palette.image_accessibility;image_accessibility,' .
          '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,' .
          '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,' .
          '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,' .
        '--div--;LLL:EXT:route/locallang_db.xml:tx_route_path.div_control,' . 
          'hidden,' .
          '--palette--;LLL:EXT:route/locallang_db.xml:palette.time;time,' .
          'fe_group,'.
        '--div--;LLL:EXT:route/locallang_db.xml:tx_route_path.div_seo,         seo_keywords,seo_description'.
        '',
      ),
  ),
  'palettes' => array (
    'image_accessibility' => array (
      'showitem'        => 'imageseo;LLL:EXT:route/locallang_db.xml:tca_phrase.imageseo,',
      'canNotCollapse'  => 1,
    ),
    'imageblock' => array (
      'showitem'        => 
        'imageorient;LLL:EXT:cms/locallang_ttc.xml:imageorient_formlabel,' . 
        'imagecols;LLL:EXT:cms/locallang_ttc.xml:imagecols_formlabel,' . 
        '--linebreak--,' .
        'image_noRows;LLL:EXT:cms/locallang_ttc.xml:image_noRows_formlabel,' . 
        'imagecaption_position;LLL:EXT:cms/locallang_ttc.xml:imagecaption_position_formlabel',
      'canNotCollapse'  => 1,
    ),
    'imagefiles' => array (
      'showitem'        => 
        'image;LLL:EXT:cms/locallang_ttc.xml:image_formlabel,' . 
        'imagecaption;LLL:EXT:cms/locallang_ttc.xml:imagecaption_formlabel,',
      'canNotCollapse'  => 1,
    ),
    'imagelinks' => array (
      'showitem'        => 
        'image_zoom;LLL:EXT:cms/locallang_ttc.xml:image_zoom_formlabel, ' .
        'image_link;LLL:EXT:cms/locallang_ttc.xml:image_link_formlabel',
      'canNotCollapse'  => 1,
    ),
    'image_settings' => array (
      'showitem'        => 
        'imagewidth;LLL:EXT:cms/locallang_ttc.xml:imagewidth_formlabel,' . 
        'imageheight;LLL:EXT:cms/locallang_ttc.xml:imageheight_formlabel,' . 
        'imageborder;LLL:EXT:cms/locallang_ttc.xml:imageborder_formlabel,' . 
        '--linebreak--,' .
        'image_compression;LLL:EXT:cms/locallang_ttc.xml:image_compression_formlabel,' . 
        'image_effects;LLL:EXT:cms/locallang_ttc.xml:image_effects_formlabel,' . 
        'image_frames;LLL:EXT:cms/locallang_ttc.xml:image_frames_formlabel',
      'canNotCollapse' => 1,
    ),
    'time' => array (
      'showitem'        => 
        'starttime;LLL:EXT:lang/locallang_general.xml:LGL.starttime,' .
        'endtime;LLL:EXT:lang/locallang_general.xml:LGL.endtime,',
      'canNotCollapse'  => 1,
    ),
  )
);
  // tx_route_path



  ///////////////////////////////////////
  // 
  // tx_route_poi
  
$TCA['tx_route_poi'] = array (
  'ctrl' => $TCA['tx_route_poi']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  
        'sys_language_uid,l10n_parent,l10n_diffsource,' 
      . 'title,tx_route_category,short,bodytext,' 
      . 'lat,lon,address,url,' 
      . 'tx_route_path,' 
      . 'list_title,list_short,map_title,map_short,' 
      . 'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,' 
      . 'hidden,starttime,endtime,fe_group,'
      . 'seo_keywords,seo_description' 
      ,
  ),
  'feInterface' => $TCA['tx_route_poi']['feInterface'],
  'columns' => array (
    'sys_language_uid' => array (
      'exclude' => 1,
      'label'   => 'LLL:EXT:lang/locallang_general.php:LGL.language',
      'config'  => array (
        'type'                => 'select',
        'foreign_table'       => 'sys_language',
        'foreign_table_where' => 'AND sys_language.hidden = 0 ORDER BY sys_language.title',
        'items' => array (
          array ('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
          array ('LLL:EXT:lang/locallang_general.php:LGL.default_value',0),
        ),
      ),
    ),
    'l10n_parent' => array (
      'displayCond' => 'FIELD:sys_language_uid:>:0',
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
      'config' => array (
        'type' => 'select',
        'items' => array (
          array ('', 0),
        ),
        'foreign_table' => 'tx_route_poi',
        'foreign_table_where' => 'AND tx_route_poi.uid=###REC_FIELD_l10n_parent### AND tx_route_poi.sys_language_uid IN (-1,0)',
      ),
    ),
    'l10n_diffsource' => array (
      'config' => array (
        'type' => 'passthrough'
      ),
    ),
    'title' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_poi.title',
      'config'    => $conf_input_30_trimRequired,
    ),
    'tx_route_category' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_poi.tx_route_category',
      'config'    => array (
        'type'                => 'select',
        'size'                => 1,
        'minitems'            => 1,
        'maxitems'            => 1,
        'MM'                  => 'tx_route_poi_mm_tx_route_category',
        'foreign_table'       => 'tx_route_category',
        'foreign_table_where' => 'AND tx_route_category.pid=###CURRENT_PID### AND tx_route_category.deleted = 0 AND tx_route_category.hidden = 0 ORDER BY tx_route_category.title',
        'wizards' => array (
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:route/locallang_db.xml:wizard.add',
            'icon'   => 'add.gif',
            'params' => array (
              'table'    => 'tx_route_category',
              'pid'      => '###CURRENT_PID###',
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:route/locallang_db.xml:wizard.list',
            'icon'   => 'list.gif',
            'params' => array (
              'table' => 'tx_route_category',
              'pid'      => '###CURRENT_PID###',
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array (
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:route/locallang_db.xml:wizard.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => 'height=680,width=800,status=0,menubar=0,scrollbars=1',
          ),
        ),
      ),
    ),
    'short' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_poi.short',
      'config'    => $conf_text_30_05,
    ),
    'bodytext' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_poi.bodytext',
      'config'    => $conf_text_rte,
    ),
    'lat' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_poi.lat',
      'config'    => $conf_input_30_trim,
    ),
    'lon' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_poi.lon',
      'config'    => $conf_input_30_trim,
    ),
    'address' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_poi.address',
      'config'    => $conf_text_30_05,
    ),
    'url' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_poi.url',
      'config'    => $conf_input_30_trim,
    ),
    'tx_route_path' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_poi.tx_route_path',
      'config'    => array (
        'type'                => 'select',
        'size'                => 10,
        'minitems'            => 0,
        'maxitems'            => 99,
        'MM'                  => 'tx_route_path_mm_tx_route_poi',
        'MM_opposite_field'   => 'tx_route_poi',
        'foreign_table'       => 'tx_route_path',
        'foreign_table_where' => 'AND tx_route_path.pid=###CURRENT_PID### AND tx_route_path.deleted = 0 AND tx_route_path.hidden = 0 AND tx_route_path.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_route_path.title',
        'items' => array (
          '0' => array (
            '0' => '',
            '1' => '',
          ),
        ),
        'suppress_icons' => 1,
        'wizards' => array (
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:route/locallang_db.xml:wizard.add',
            'icon'   => 'add.gif',
            'params' => array (
              'table'    => 'tx_route_path',
              'pid'      => '###CURRENT_PID###',
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:route/locallang_db.xml:wizard.list',
            'icon'   => 'list.gif',
            'params' => array (
              'table' => 'tx_route_path',
              'pid'      => '###CURRENT_PID###',
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array (
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:route/locallang_db.xml:wizard.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => 'height=680,width=800,status=0,menubar=0,scrollbars=1',
          ),
        ),
      ),
    ),
    'list_title' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_poi.list_title',
      'config'    => $conf_input_30,
    ),
    'list_short' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_poi.list_short',
      'config'    => $conf_text_30_05,
    ),
    'map_title' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_poi.map_title',
      'config'    => $conf_input_30,
    ),
    'map_short' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_poi.map_short',
      'config'    => $conf_text_30_05,
    ),
    'image' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tca_phrase.image',
      'config'    => $conf_file_image,
    ),
    'imagecaption' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tca_phrase.imagecaption',
      'config'    => $conf_text_30_05,
    ),
    'imagecaption_position' => array (
      'exclude'   => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imagecaption_position',
      'config'    => array (
        'type' => 'select',
        'items' => array (
          array ('', ''),
          array ('LLL:EXT:cms/locallang_ttc.xml:imagecaption_position.I.1', 'center'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imagecaption_position.I.2', 'right'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imagecaption_position.I.3', 'left'),
        ),
        'default' => ''
      ),
    ),
    'imageseo' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tca_phrase.imageseo',
      'config'    => $conf_text_30_05,
    ),
    'imagewidth' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imagewidth',
      'config'    => array (
        'type'      => 'input',
        'size'      => '10',
        'max'       => '10',
        'eval'      => 'trim',
        'checkbox'  => '0',
        'default'   => ''
      ),
    ),
    'imageheight' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imageheight',
      'config'    => array (
        'type'      => 'input',
        'size'      => '10',
        'max'       => '10',
        'eval'      => 'trim',
        'checkbox'  => '0',
        'default'   => ''
      ),
    ),
    'imageorient' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imageorient',
      'config'    => array (
        'type'  => 'select',
        'items' => array (
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.0', 0, 'selicons/above_center.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.1', 1, 'selicons/above_right.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.2', 2, 'selicons/above_left.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.3', 8, 'selicons/below_center.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.4', 9, 'selicons/below_right.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.5', 10, 'selicons/below_left.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.6', 17, 'selicons/intext_right.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.7', 18, 'selicons/intext_left.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.8', '--div--'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.9', 25, 'selicons/intext_right_nowrap.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.10', 26, 'selicons/intext_left_nowrap.gif'),
        ),
        'selicon_cols'      => 6,
        'default'           => '0',
        'iconsInOptionTags' => 1,
      ),
    ),
    'imageborder' => array (
      'exclude'   => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imageborder',
      'config' => array (
        'type' => 'check'
      ),
    ),
    'image_noRows' => array (
      'exclude'   => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_noRows',
      'config'    => array (
        'type' => 'check'
      ),
    ),
    'image_link' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_link',
      'config'    => array (
        'type' => 'text',
        'cols' => '30',
        'rows' => '3',
        'wizards' => array (
          '_PADDING' => 2,
          'link' => array (
            'type' => 'popup',
            'title' => 'Link',
            'icon' => 'link_popup.gif',
            'script' => 'browse_links.php?mode=wizard',
            'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
          ),
        ),
        'softref' => 'typolink[linkList]'
      ),
    ),
    'image_zoom' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_zoom',
      'config'    => array (
        'type' => 'check'
      ),
    ),
    'image_effects' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_effects',
      'config'    => array (
        'type' => 'select',
        'items' => array (
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.0', 0),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.1', 1),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.2', 2),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.3', 3),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.4', 10),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.5', 11),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.6', 20),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.7', 23),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.8', 25),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.9', 26),
        ),
      ),
    ),
    'image_frames' => array (
      'exclude'   => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_frames',
      'config'    => array (
        'type'  => 'select',
        'items' => array (
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.0', 0),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.1', 1),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.2', 2),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.3', 3),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.4', 4),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.5', 5),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.6', 6),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.7', 7),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.8', 8),
        ),
      ),
    ),
    'image_compression' => array (
      'exclude'   => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_compression',
      'config'    => array (
        'type'  => 'select',
        'items' => array (
          array ('LLL:EXT:lang/locallang_general.php:LGL.default_value', 0),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.1', 1),
          array ('GIF/256', 10),
          array ('GIF/128', 11),
          array ('GIF/64', 12),
          array ('GIF/32', 13),
          array ('GIF/16', 14),
          array ('GIF/8', 15),
          array ('PNG', 39),
          array ('PNG/256', 30),
          array ('PNG/128', 31),
          array ('PNG/64', 32),
          array ('PNG/32', 33),
          array ('PNG/16', 34),
          array ('PNG/8', 35),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.15', 21),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.16', 22),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.17', 24),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.18', 26),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.19', 28),
        ),
      ),
    ),
    'imagecols' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imagecols',
      'config'    => array (
        'type'  => 'select',
        'items' => array (
          array ('1', 1),
          array ('2', 2),
          array ('3', 3),
          array ('4', 4),
          array ('5', 5),
          array ('6', 6),
          array ('7', 7),
          array ('8', 8),
        ),
        'default' => 1
      ),
    ),
    'hidden'    => $conf_hidden,
    'starttime' => $conf_starttime,
    'endtime'   => $conf_endtime,
    'fe_group'  => $conf_fegroup,
    'seo_keywords'  => array (
      'exclude'   => $bool_exclude_default,
      'label'     => 'LLL:EXT:route/locallang_db.xml:tca_phrase.seo_keywords',
      'l10n_mode' => 'prefixLangTitle',
      'config'    => $conf_input_80_trim,
    ),
    'seo_description' => array (
      'exclude'   => $bool_exclude_default,
      'label'     => 'LLL:EXT:route/locallang_db.xml:tca_phrase.seo_description',
      'l10n_mode' => 'prefixLangTitle',
      'config'    => $conf_text_50_10,
    ),
  ),
  'types' => array (
    '0' => array(
      'showitem' => 
        '--div--;LLL:EXT:route/locallang_db.xml:tx_route_poi.div_poi,' . 
          'title,' .
          'tx_route_category,' .
          'short,' .
          'bodytext;;;richtext[]:rte_transform[mode=ts];,' .
        '--div--;LLL:EXT:route/locallang_db.xml:tx_route_poi.div_properties,' . 
          'lat,' .
          'lon,' .
          'address,' .
          'url,' .
        '--div--;LLL:EXT:route/locallang_db.xml:tx_route_poi.div_paths,' . 
          'tx_route_path,' .
        '--div--;LLL:EXT:route/locallang_db.xml:tx_route_poi.div_shortterms,' . 
          'list_title,' .
          'list_short,' .
          'map_title,' .
          'map_short,' .
        '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,' .
          '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,' .
          '--palette--;LLL:EXT:route/locallang_db.xml:palette.image_accessibility;image_accessibility,' .
          '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,' .
          '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,' .
          '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,' .
        '--div--;LLL:EXT:route/locallang_db.xml:tx_route_poi.div_control,' . 
          'hidden,' .
          '--palette--;LLL:EXT:route/locallang_db.xml:palette.time;time,' .
          'fe_group,'.
        '--div--;LLL:EXT:route/locallang_db.xml:tx_route_poi.div_seo,' . 
          'seo_keywords,seo_description' .
        '',
      ),
  ),
  'palettes' => array (
    'image_accessibility' => array (
      'showitem'        => 'imageseo;LLL:EXT:route/locallang_db.xml:tca_phrase.imageseo,',
      'canNotCollapse'  => 1,
    ),
    'imageblock' => array (
      'showitem'        => 
        'imageorient;LLL:EXT:cms/locallang_ttc.xml:imageorient_formlabel,' . 
        'imagecols;LLL:EXT:cms/locallang_ttc.xml:imagecols_formlabel,' . 
        '--linebreak--,' .
        'image_noRows;LLL:EXT:cms/locallang_ttc.xml:image_noRows_formlabel,' . 
        'imagecaption_position;LLL:EXT:cms/locallang_ttc.xml:imagecaption_position_formlabel',
      'canNotCollapse'  => 1,
    ),
    'imagefiles' => array (
      'showitem'        => 
        'image;LLL:EXT:cms/locallang_ttc.xml:image_formlabel,' . 
        'imagecaption;LLL:EXT:cms/locallang_ttc.xml:imagecaption_formlabel,',
      'canNotCollapse'  => 1,
    ),
    'imagelinks' => array (
      'showitem'        => 
        'image_zoom;LLL:EXT:cms/locallang_ttc.xml:image_zoom_formlabel, ' .
        'image_link;LLL:EXT:cms/locallang_ttc.xml:image_link_formlabel',
      'canNotCollapse'  => 1,
    ),
    'image_settings' => array (
      'showitem'        => 
        'imagewidth;LLL:EXT:cms/locallang_ttc.xml:imagewidth_formlabel,' . 
        'imageheight;LLL:EXT:cms/locallang_ttc.xml:imageheight_formlabel,' . 
        'imageborder;LLL:EXT:cms/locallang_ttc.xml:imageborder_formlabel,' . 
        '--linebreak--,' .
        'image_compression;LLL:EXT:cms/locallang_ttc.xml:image_compression_formlabel,' . 
        'image_effects;LLL:EXT:cms/locallang_ttc.xml:image_effects_formlabel,' . 
        'image_frames;LLL:EXT:cms/locallang_ttc.xml:image_frames_formlabel',
      'canNotCollapse' => 1,
    ),
    'time' => array (
      'showitem'        => 
        'starttime;LLL:EXT:lang/locallang_general.xml:LGL.starttime,' .
        'endtime;LLL:EXT:lang/locallang_general.xml:LGL.endtime,',
      'canNotCollapse'  => 1,
    ),
  )
);
  // tx_route_poi

?>