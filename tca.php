<?php
if (!defined ('TYPO3_MODE'))  die ('Access denied.');



  ///////////////////////////////////////
  // 
  // INDEX
  // 
  // tx_route_path_category
  // tx_route_path



  ///////////////////////////////////////
  // 
  // tx_route_path_category
  
$TCA['tx_route_path_category'] = array (
  'ctrl' => $TCA['tx_route_path_category']['ctrl'],
  'interface' => array (
    'showRecordFieldList' => 'title'
  ),
  'feInterface' => $TCA['tx_route_path_category']['feInterface'],
  'columns' => array (
    'title' => array (    
      'exclude' => 0,    
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path_category.title',
      'config' => array (
        'type' => 'input',  
        'size' => '30',  
        'eval' => 'required',
      )
    ),
  ),
  'types' => array (
    '0' => array('showitem' => 'hidden;;1;;1-1-1, title;;%2%;;2-2-2')
  ),
  'palettes' => array (
    '1' => array('showitem' => ''),
  )
);
  // tx_route_path_category



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
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.customerEmail',
      'config' => array (
        'type' => 'input',  
        'size' => '40',  
        'eval' => '',
      )
    ),
    'fileDeliveryorder' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.fileDeliveryorder',
      'config' => array (
        'type' => 'group',
        'internal_type' => 'file',
        'allowed' => 'pdf',  
        'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],  
        'uploadfolder' => 'uploads/tx_caddy',
        'show_thumbs' => 1,  
        'size' => 1,  
        'minitems' => 0,
        'maxitems' => 1,
      )
    ),
    'fileInvoice' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.fileInvoice',
      'config' => array (
        'type' => 'group',
        'internal_type' => 'file',
        'allowed' => 'pdf',  
        'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],  
        'uploadfolder' => 'uploads/tx_caddy',
        'show_thumbs' => 1,  
        'size' => 1,  
        'minitems' => 0,
        'maxitems' => 1,
      )
    ),
    'fileRevocation' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.fileRevocation',
      'config' => array (
        'type' => 'group',
        'internal_type' => 'file',
        'allowed' => 'pdf',  
        'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],  
        'uploadfolder' => 'uploads/tx_caddy',
        'show_thumbs' => 1,  
        'size' => 1,  
        'minitems' => 0,
        'maxitems' => 1,
      )
    ),
    'fileTerms' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.fileTerms',
      'config' => array (
        'type' => 'group',
        'internal_type' => 'file',
        'allowed' => 'pdf',  
        'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],  
        'uploadfolder' => 'uploads/tx_caddy',
        'show_thumbs' => 1,  
        'size' => 1,  
        'minitems' => 0,
        'maxitems' => 1,
      )
    ),
    'numberDeliveryorder' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.numberDeliveryorder',
      'config' => array (
        'type' => 'input',  
        'size' => '10',  
        'eval' => 'int',
      )
    ),
    'numberInvoice' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.numberInvoice',
      'config' => array (
        'type' => 'input',  
        'size' => '10',  
        'eval' => 'int',
      )
    ),
    'numberOrder' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.numberOrder',
      'config' => array (
        'type' => 'input',  
        'size' => '10',  
        'eval' => 'int',
      )
    ),
    'pdfDeliveryorderToCustomer' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.pdfDeliveryorderToCustomer',
      'config' => array (
        'type' => 'check',
        'default' => 1,
      )
    ),
    'pdfDeliveryorderToVendor' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.pdfDeliveryorderToVendor',
      'config' => array (
        'type' => 'check',
        'default' => 1,
      )
    ),
    'pdfInvoiceToCustomer' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.pdfInvoiceToCustomer',
      'config' => array (
        'type' => 'check',
        'default' => 1,
      )
    ),
    'pdfInvoiceToVendor' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.pdfInvoiceToVendor',
      'config' => array (
        'type' => 'check',
        'default' => 1,
      )
    ),
    'pdfRevocationToCustomer' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.pdfRevocationToCustomer',
      'config' => array (
        'type' => 'check',
        'default' => 1,
      )
    ),
    'pdfRevocationToVendor' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.pdfRevocationToVendor',
      'config' => array (
        'type' => 'check',
        'default' => 1,
      )
    ),
    'pdfTermsToCustomer' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.pdfTermsToCustomer',
      'config' => array (
        'type' => 'check',
        'default' => 1,
      )
    ),
    'pdfTermsToVendor' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.pdfTermsToVendor',
      'config' => array (
        'type' => 'check',
        'default' => 1,
      )
    ),
    'sumGross' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.sumGross',
      'config' => array (
        'type' => 'input',  
        'size' => '10',  
        'eval' => 'double2,nospace',
      )
    ),
    'sumNet' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.sumNet',
      'config' => array (
        'type' => 'input',  
        'size' => '10',  
        'eval' => 'double2,nospace',
      )
    ),
    'sumTaxNormal' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.sumTaxNormal',
      'config' => array (
        'type' => 'input',  
        'size' => '10',  
        'eval' => 'double2,nospace',
      )
    ),
    'sumTaxReduced' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.sumTaxReduced',
      'config' => array (
        'type' => 'input',  
        'size' => '10',  
        'eval' => 'double2,nospace',
      )
    ),
    'quantity' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.quantity',
      'config' => array (
        'type' => 'input',
        'size' => '10',
        'eval' => 'int',
      )
    ),
    'items' => array (
      'l10n_mode' => 'exclude',
      'exclude' => 0,
      'label' => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.items',
      'config' => array (
        'type' => 'select',  
        'foreign_table' => 'tx_route_path_category',  
        'foreign_table_where' => 'AND tx_route_path_category.pid=###CURRENT_PID### ORDER BY tx_route_path_category.uid',  
        'size' => 10,  
        'minitems' => 0,
        'maxitems' => 10,  
        "MM" => "tx_route_path_mm_tx_route_path_category",  
        'wizards' => array(
          '_PADDING'  => 2,
          '_VERTICAL' => 1,
          'add' => array(
            'type'   => 'script',
            'title'  => 'Create new record',
            'icon'   => 'add.gif',
            'params' => array(
              'table'    => 'tx_route_path_category',
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
              'table' => 'tx_route_path_category',
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
      'label'     => 'LLL:EXT:caddy/locallang_db.xml:tx_route_path.tstamp',
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
        '--div--;LLL:EXT:caddy/locallang_db.xml:tx_route_path.div.email,' .
          '--palette--;LLL:EXT:caddy/locallang_db.xml:tx_route_path.palette.emailDate;emailDate,' .
          '--palette--;LLL:EXT:caddy/locallang_db.xml:tx_route_path.palette.isSentToCustomer;isSentToCustomer,' .
          '--palette--;LLL:EXT:caddy/locallang_db.xml:tx_route_path.palette.isSentToVendor;isSentToVendor,' .
          '--palette--;LLL:EXT:caddy/locallang_db.xml:tx_route_path.palette.files;files,' .
        '--div--;LLL:EXT:caddy/locallang_db.xml:tx_route_path.div.numbers,' .
          '--palette--;LLL:EXT:caddy/locallang_db.xml:tx_route_path.palette.numbers;numbers,' .
        '--div--;LLL:EXT:caddy/locallang_db.xml:tx_route_path.div.sum,' .
          '--palette--;LLL:EXT:caddy/locallang_db.xml:tx_route_path.palette.sum;sum,' .
        '',
      ),
  ),
  'palettes' => array (
    'emailDate' => array (
      'showitem' => 
        'customerEmail;LLL:EXT:caddy/locallang_db.xml:tx_route_path.customerEmail,' .
        'tstamp;LLL:EXT:caddy/locallang_db.xml:tx_route_path.tstamp,' .
        '',
      'canNotCollapse' => 1,
    ),
    'files' => array (
      'showitem' => 
        'fileDeliveryorder;LLL:EXT:caddy/locallang_db.xml:tx_route_path.fileDeliveryorder,' .
        'fileInvoice;LLL:EXT:caddy/locallang_db.xml:tx_route_path.fileInvoice,' .
        '--linebreak--,' . 
        'fileRevocation;LLL:EXT:caddy/locallang_db.xml:tx_route_path.fileRevocation,' .
        'fileTerms;LLL:EXT:caddy/locallang_db.xml:tx_route_path.fileTerms,' .
        '',
      'canNotCollapse' => 1,
    ),
    'isSentToCustomer' => array (
      'showitem' => 
        'pdfDeliveryorderToCustomer;LLL:EXT:caddy/locallang_db.xml:tx_route_path.pdfDeliveryorderToCustomer,' .
        'pdfInvoiceToCustomer;LLL:EXT:caddy/locallang_db.xml:tx_route_path.pdfInvoiceToCustomer,' .
        'pdfRevocationToCustomer;LLL:EXT:caddy/locallang_db.xml:tx_route_path.pdfRevocationToCustomer,' .
        'pdfTermsToCustomer;LLL:EXT:caddy/locallang_db.xml:tx_route_path.pdfTermsToCustomer,' .
        '',
      'canNotCollapse' => 1,
    ),
    'isSentToVendor' => array (
      'showitem' => 
        'pdfDeliveryorderToVendor;LLL:EXT:caddy/locallang_db.xml:tx_route_path.pdfDeliveryorderToVendor,' .
        'pdfInvoiceToVendor;LLL:EXT:caddy/locallang_db.xml:tx_route_path.pdfInvoiceToVendor,' .
        'pdfRevocationToVendor;LLL:EXT:caddy/locallang_db.xml:tx_route_path.pdfRevocationToVendor,' .
        'pdfTermsToVendor;LLL:EXT:caddy/locallang_db.xml:tx_route_path.pdfTermsToVendor,' .
        '',
      'canNotCollapse' => 1,
    ),
    'numbers' => array (
      'showitem' => 
        'numberOrder;LLL:EXT:caddy/locallang_db.xml:tx_route_path.numberOrder,' .
        'numberDeliveryorder;LLL:EXT:caddy/locallang_db.xml:tx_route_path.numberDeliveryorder,' .
        'numberInvoice;LLL:EXT:caddy/locallang_db.xml:tx_route_path.numberInvoice,' .
        '',
      'canNotCollapse' => 1,
    ),
    'sum' => array (
      'showitem' => 
        'sumNet;LLL:EXT:caddy/locallang_db.xml:tx_route_path.sumNet,' .
        '--linebreak--,' . 
        'sumTaxReduced;LLL:EXT:caddy/locallang_db.xml:tx_route_path.sumTaxReduced,' .
        '--linebreak--,' . 
        'sumTaxNormal;LLL:EXT:caddy/locallang_db.xml:tx_route_path.sumTaxNormal,' .
        '--linebreak--,' . 
        'sumGross;LLL:EXT:caddy/locallang_db.xml:tx_route_path.sumGross,' .
        '',
      'canNotCollapse' => 1,
    ),
  )
);
  // tx_route_path

?>