<?php
if (!defined ('TYPO3_MODE'))  die ('Access denied.');



  ///////////////////////////////////////
  // 
  // INDEX
  // 
  // Other wizards and config drafts
  // tx_route_category
  // tx_route_path



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // 
  // Other wizards and config drafts

  $bool_exclude_default = false;

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

  $conf_datetime = array (
    'type'    => 'input',
    'size'    => '10',
    'max'     => '20',
    'eval'    => 'datetime',
    'default' => mktime(date('H'),date('i'),0,date('m'),date('d'),date('Y')),
  );
  
  $conf_datetimeend = $conf_datetime;
  unset($conf_datetimeend['default']);

  $conf_archivedate = $conf_datetimeend;
  $conf_archivedate['eval'] = 'date';

  $conf_file_document = array (
    'type'          => 'group',
    'internal_type' => 'file',
    'allowed'       => '',
    'disallowed'    => 'php,php3', 
    'max_size'      => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'], 
    'uploadfolder'  => 'uploads/tx_org',
    'show_thumbs'   => 1,
    'size'          => 10,
    'minitems'      => 0,
    'maxitems'      => 99,
  );

  $conf_file_one_document             = $conf_file_document;
  $conf_file_one_document['size']     = 1;
  $conf_file_one_document['maxitems'] = 1;

  $conf_file_image = array (
    'type'          => 'group',
    'internal_type' => 'file',
    'allowed'       => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
    'max_size'      => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
    'uploadfolder'  => 'uploads/tx_org',
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
    'uploadfolder'  => 'uploads/tx_org',
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
    'exclude'   => $bool_time_control,
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
    'exclude'   => $bool_time_control,
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
    'exclude'     => $bool_fegroup_control,
    //'l10n_mode'   => 'mergeIfNotBlank',
    'label'       => 'LLL:EXT:lang/locallang_general.php:LGL.fe_group',
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
  $conf_topnews = array (
    'exclude' => $bool_exclude_none,
//    'l10n_mode'   => 'exclude',
    'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_news.topnews',
    'config'  => array (
      'type'    => 'check',
      'default' => '0',
    ),
  );
  if ($bool_topnews_sorting === true)
  {
    $conf_topnews['config'] = array (
      'type'          => 'select',
      'items' => array(
        array('LLL:EXT:org/locallang_db.xml:tx_org_news.topnews.3', 3),
        array('LLL:EXT:org/locallang_db.xml:tx_org_news.topnews.2', 2),
        array('LLL:EXT:org/locallang_db.xml:tx_org_news.topnews.1', 1),
        array('LLL:EXT:org/locallang_db.xml:tx_org_news.topnews.0', 0),
      ),
      'size'           => 4,
      'maxitems'       => 1,
      'suppress_icons' => 1,
      'default'        => 0,
    );
  }
  $conf_pages = array (
    'exclude'   => $bool_exclude_default,
    'l10n_mode' => 'exclude',
    'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.pages',
    'config'    => array (
      'type'          => 'group',
      'internal_type' => 'db',
      'allowed'       => 'pages',
      'size'          => '10',
      'maxitems'      => '99',
      'minitems'      => '0',
      'show_thumbs'   => '1'
    ),
  );
  // Other wizards and config drafts



///////////////////////////////////////
  // 
  // tx_route_category
  
$TCA['tx_route_category'] = array(
  'ctrl' => $TCA['tx_route_category']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  'title,title_lang_ol,icons,icon_offset_x,icon_offset_y,'.
                              'hidden,'.
                              'image,imagecaption,imageseo',
  ),
  'columns' => array (
    'title' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:route/locallang_db.xml:tx_route_category.title',
      'config'  => $conf_input_30_trimRequired,
    ),
    'title_lang_ol' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:route/locallang_db.xml:tx_route_category.title_lang_ol',
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
    'hidden'    => $conf_hidden,
  ),
  'types' => array (
    '0' => array (
      'showitem' =>  '--div--;LLL:EXT:route/locallang_db.xml:tx_route_category.div_cat,     title;;1;;1-1-1,icons,icon_offset_x,icon_offset_y,'.
                     '--div--;LLL:EXT:route/locallang_db.xml:tx_route_category.div_control, hidden'
    ),
  ),
  'palettes' => array (
    '1' => array (
      'showitem' => 'title_lang_ol,'
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
    'showRecordFieldList' =>  'customerEmail,' . 
                              'fileDeliveryorder,fileInvoice,fileRevocation,fileTerms,' . 
                              'items,' . 
                              'numberDeliveryorder,numberInvoice,numberOrder,' . 
                              'pdfDeliveryorderToCustomer,pdfDeliveryorderToVendor,pdfInvoiceToCustomer,' .
                              'pdfInvoiceToVendor,pdfRevocationToCustomer,pdfRevocationToVendor,pdfTermsToCustomer,pdfTermsToVendor,' .
                              'quantity,' . 
                              'sumGross,sumNet,sumTaxReduced,sumTaxNormal,' . 
                              'tstamp',
  ),
  'feInterface' => $TCA['tx_route_path']['feInterface'],
  'columns' => array (
    'customerEmail' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:route/locallang_db.xml:tx_route_path.customerEmail',
      'config' => array (
        'type' => 'input',  
        'size' => '40',  
        'eval' => '',
      )
    ),
    'fileDeliveryorder' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:route/locallang_db.xml:tx_route_path.fileDeliveryorder',
      'config' => array (
        'type' => 'group',
        'internal_type' => 'file',
        'allowed' => 'pdf',  
        'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],  
        'uploadfolder' => 'uploads/tx_route',
        'show_thumbs' => 1,  
        'size' => 1,  
        'minitems' => 0,
        'maxitems' => 1,
      )
    ),
    'fileInvoice' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:route/locallang_db.xml:tx_route_path.fileInvoice',
      'config' => array (
        'type' => 'group',
        'internal_type' => 'file',
        'allowed' => 'pdf',  
        'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],  
        'uploadfolder' => 'uploads/tx_route',
        'show_thumbs' => 1,  
        'size' => 1,  
        'minitems' => 0,
        'maxitems' => 1,
      )
    ),
    'fileRevocation' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:route/locallang_db.xml:tx_route_path.fileRevocation',
      'config' => array (
        'type' => 'group',
        'internal_type' => 'file',
        'allowed' => 'pdf',  
        'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],  
        'uploadfolder' => 'uploads/tx_route',
        'show_thumbs' => 1,  
        'size' => 1,  
        'minitems' => 0,
        'maxitems' => 1,
      )
    ),
    'fileTerms' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:route/locallang_db.xml:tx_route_path.fileTerms',
      'config' => array (
        'type' => 'group',
        'internal_type' => 'file',
        'allowed' => 'pdf',  
        'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],  
        'uploadfolder' => 'uploads/tx_route',
        'show_thumbs' => 1,  
        'size' => 1,  
        'minitems' => 0,
        'maxitems' => 1,
      )
    ),
    'numberDeliveryorder' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:route/locallang_db.xml:tx_route_path.numberDeliveryorder',
      'config' => array (
        'type' => 'input',  
        'size' => '10',  
        'eval' => 'int',
      )
    ),
    'numberInvoice' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:route/locallang_db.xml:tx_route_path.numberInvoice',
      'config' => array (
        'type' => 'input',  
        'size' => '10',  
        'eval' => 'int',
      )
    ),
    'numberOrder' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:route/locallang_db.xml:tx_route_path.numberOrder',
      'config' => array (
        'type' => 'input',  
        'size' => '10',  
        'eval' => 'int',
      )
    ),
    'pdfDeliveryorderToCustomer' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:route/locallang_db.xml:tx_route_path.pdfDeliveryorderToCustomer',
      'config' => array (
        'type' => 'check',
        'default' => 1,
      )
    ),
    'pdfDeliveryorderToVendor' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:route/locallang_db.xml:tx_route_path.pdfDeliveryorderToVendor',
      'config' => array (
        'type' => 'check',
        'default' => 1,
      )
    ),
    'pdfInvoiceToCustomer' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:route/locallang_db.xml:tx_route_path.pdfInvoiceToCustomer',
      'config' => array (
        'type' => 'check',
        'default' => 1,
      )
    ),
    'pdfInvoiceToVendor' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:route/locallang_db.xml:tx_route_path.pdfInvoiceToVendor',
      'config' => array (
        'type' => 'check',
        'default' => 1,
      )
    ),
    'pdfRevocationToCustomer' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:route/locallang_db.xml:tx_route_path.pdfRevocationToCustomer',
      'config' => array (
        'type' => 'check',
        'default' => 1,
      )
    ),
    'pdfRevocationToVendor' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:route/locallang_db.xml:tx_route_path.pdfRevocationToVendor',
      'config' => array (
        'type' => 'check',
        'default' => 1,
      )
    ),
    'pdfTermsToCustomer' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:route/locallang_db.xml:tx_route_path.pdfTermsToCustomer',
      'config' => array (
        'type' => 'check',
        'default' => 1,
      )
    ),
    'pdfTermsToVendor' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:route/locallang_db.xml:tx_route_path.pdfTermsToVendor',
      'config' => array (
        'type' => 'check',
        'default' => 1,
      )
    ),
    'sumGross' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:route/locallang_db.xml:tx_route_path.sumGross',
      'config' => array (
        'type' => 'input',  
        'size' => '10',  
        'eval' => 'double2,nospace',
      )
    ),
    'sumNet' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:route/locallang_db.xml:tx_route_path.sumNet',
      'config' => array (
        'type' => 'input',  
        'size' => '10',  
        'eval' => 'double2,nospace',
      )
    ),
    'sumTaxNormal' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:route/locallang_db.xml:tx_route_path.sumTaxNormal',
      'config' => array (
        'type' => 'input',  
        'size' => '10',  
        'eval' => 'double2,nospace',
      )
    ),
    'sumTaxReduced' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:route/locallang_db.xml:tx_route_path.sumTaxReduced',
      'config' => array (
        'type' => 'input',  
        'size' => '10',  
        'eval' => 'double2,nospace',
      )
    ),
    'quantity' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:route/locallang_db.xml:tx_route_path.quantity',
      'config' => array (
        'type' => 'input',
        'size' => '10',
        'eval' => 'int',
      )
    ),
    'items' => array (
      'l10n_mode' => 'exclude',
      'exclude' => 0,
      'label' => 'LLL:EXT:route/locallang_db.xml:tx_route_path.items',
      'config' => array (
        'type' => 'select',  
        'foreign_table' => 'tx_route_category',  
        'foreign_table_where' => 'AND tx_route_category.pid=###CURRENT_PID### ORDER BY tx_route_category.uid',  
        'size' => 10,  
        'minitems' => 0,
        'maxitems' => 10,  
        "MM" => "tx_route_path_mm_tx_route_category",  
        'wizards' => array(
          '_PADDING'  => 2,
          '_VERTICAL' => 1,
          'add' => array(
            'type'   => 'script',
            'title'  => 'Create new record',
            'icon'   => 'add.gif',
            'params' => array(
              'table'    => 'tx_route_category',
              'pid'      => '###CURRENT_PID###',
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type'   => 'script',
            'title'  => 'List',
            'icon'   => 'list.gif',
            'params' => array(
              'table' => 'tx_route_category',
              'pid'   => '###CURRENT_PID###',
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type'                     => 'popup',
            'title'                    => 'Edit',
            'script'                   => 'wizard_edit.php',
            'popup_onlyOpenIfSelected' => 1,
            'icon'                     => 'edit2.gif',
            'JSopenParams'             => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
          ),
        ),
      )
    ),
    'tstamp' => array (
      'exclude'   => 0,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:route/locallang_db.xml:tx_route_path.tstamp',
      'config'    => array (
        'type'    => 'input',
        'size'    => '10',
        'max'     => '20',
        'eval'    => 'datetime',
        'default' => mktime(date('H'),date('i'),0,date('m'),date('d'),date('Y')),
      ),
    ),
      
  ),
  'types' => array (
    '0' => array(
      'showitem' => 
        '--div--;LLL:EXT:route/locallang_db.xml:tx_route_path.div.email,' .
          '--palette--;LLL:EXT:route/locallang_db.xml:tx_route_path.palette.emailDate;emailDate,' .
          '--palette--;LLL:EXT:route/locallang_db.xml:tx_route_path.palette.isSentToCustomer;isSentToCustomer,' .
          '--palette--;LLL:EXT:route/locallang_db.xml:tx_route_path.palette.isSentToVendor;isSentToVendor,' .
          '--palette--;LLL:EXT:route/locallang_db.xml:tx_route_path.palette.files;files,' .
        '--div--;LLL:EXT:route/locallang_db.xml:tx_route_path.div.numbers,' .
          '--palette--;LLL:EXT:route/locallang_db.xml:tx_route_path.palette.numbers;numbers,' .
        '--div--;LLL:EXT:route/locallang_db.xml:tx_route_path.div.sum,' .
          '--palette--;LLL:EXT:route/locallang_db.xml:tx_route_path.palette.sum;sum,' .
        '',
      ),
  ),
  'palettes' => array (
    'emailDate' => array (
      'showitem' => 
        'customerEmail;LLL:EXT:route/locallang_db.xml:tx_route_path.customerEmail,' .
        'tstamp;LLL:EXT:route/locallang_db.xml:tx_route_path.tstamp,' .
        '',
      'canNotCollapse' => 1,
    ),
    'files' => array (
      'showitem' => 
        'fileDeliveryorder;LLL:EXT:route/locallang_db.xml:tx_route_path.fileDeliveryorder,' .
        'fileInvoice;LLL:EXT:route/locallang_db.xml:tx_route_path.fileInvoice,' .
        '--linebreak--,' . 
        'fileRevocation;LLL:EXT:route/locallang_db.xml:tx_route_path.fileRevocation,' .
        'fileTerms;LLL:EXT:route/locallang_db.xml:tx_route_path.fileTerms,' .
        '',
      'canNotCollapse' => 1,
    ),
    'isSentToCustomer' => array (
      'showitem' => 
        'pdfDeliveryorderToCustomer;LLL:EXT:route/locallang_db.xml:tx_route_path.pdfDeliveryorderToCustomer,' .
        'pdfInvoiceToCustomer;LLL:EXT:route/locallang_db.xml:tx_route_path.pdfInvoiceToCustomer,' .
        'pdfRevocationToCustomer;LLL:EXT:route/locallang_db.xml:tx_route_path.pdfRevocationToCustomer,' .
        'pdfTermsToCustomer;LLL:EXT:route/locallang_db.xml:tx_route_path.pdfTermsToCustomer,' .
        '',
      'canNotCollapse' => 1,
    ),
    'isSentToVendor' => array (
      'showitem' => 
        'pdfDeliveryorderToVendor;LLL:EXT:route/locallang_db.xml:tx_route_path.pdfDeliveryorderToVendor,' .
        'pdfInvoiceToVendor;LLL:EXT:route/locallang_db.xml:tx_route_path.pdfInvoiceToVendor,' .
        'pdfRevocationToVendor;LLL:EXT:route/locallang_db.xml:tx_route_path.pdfRevocationToVendor,' .
        'pdfTermsToVendor;LLL:EXT:route/locallang_db.xml:tx_route_path.pdfTermsToVendor,' .
        '',
      'canNotCollapse' => 1,
    ),
    'numbers' => array (
      'showitem' => 
        'numberOrder;LLL:EXT:route/locallang_db.xml:tx_route_path.numberOrder,' .
        'numberDeliveryorder;LLL:EXT:route/locallang_db.xml:tx_route_path.numberDeliveryorder,' .
        'numberInvoice;LLL:EXT:route/locallang_db.xml:tx_route_path.numberInvoice,' .
        '',
      'canNotCollapse' => 1,
    ),
    'sum' => array (
      'showitem' => 
        'sumNet;LLL:EXT:route/locallang_db.xml:tx_route_path.sumNet,' .
        '--linebreak--,' . 
        'sumTaxReduced;LLL:EXT:route/locallang_db.xml:tx_route_path.sumTaxReduced,' .
        '--linebreak--,' . 
        'sumTaxNormal;LLL:EXT:route/locallang_db.xml:tx_route_path.sumTaxNormal,' .
        '--linebreak--,' . 
        'sumGross;LLL:EXT:route/locallang_db.xml:tx_route_path.sumGross,' .
        '',
      'canNotCollapse' => 1,
    ),
  )
);
  // tx_route_path

?>