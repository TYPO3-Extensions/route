#
# INDEX
#
# tx_route_category
# tx_route_path
# tx_route_path_mm_tx_route_category
# tx_route_path_mm_tx_route_poi
# tx_route_poi
# tx_route_poi_mm_tx_route_category



#
# Table structure for table 'tx_route_category'
#
CREATE TABLE tx_route_category (
  uid int(11) NOT NULL auto_increment,
  pid int(11) DEFAULT '0' NOT NULL,
  tstamp int(11) DEFAULT '0' NOT NULL,
  crdate int(11) DEFAULT '0' NOT NULL,
  cruser_id int(11) DEFAULT '0' NOT NULL,
  sorting int(10) DEFAULT '0' NOT NULL,
  deleted tinyint(4) DEFAULT '0' NOT NULL,
  hidden tinyint(4) DEFAULT '0' NOT NULL,

  title tinytext NOT NULL,
  title_lang_ol tinytext,

  icons text,
  icon_offset_x int(11) DEFAULT '0' NOT NULL,
  icon_offset_y int(11) DEFAULT '0' NOT NULL

  PRIMARY KEY (uid),
  KEY parent (pid)
);



#
# Table structure for table 'tx_route_path'
#
CREATE TABLE tx_route_path (
  uid int(11) NOT NULL auto_increment,
  pid int(11) DEFAULT '0' NOT NULL,
  tstamp int(11) DEFAULT '0' NOT NULL,
  crdate int(11) DEFAULT '0' NOT NULL,
  cruser_id int(11) DEFAULT '0' NOT NULL,
  deleted tinyint(4) DEFAULT '0' NOT NULL,

  sys_language_uid int(11) DEFAULT '0' NOT NULL,
  l10n_parent int(11) DEFAULT '0' NOT NULL,
  l10n_diffsource mediumtext,

  title tinytext,
  tx_route_category tinytext,
  short tinytext,
  bodytext mediumtext NOT NULL,

  gpxfile text,
  gpxdata text,

  icon text,
  iconheight tinytext,
  iconwidth tinytext,
  icon_lat text NOT NULL,
  icon_lon text NOT NULL,
  color tinytext NOT NULL,
  line_width int(3) DEFAULT '2' NOT NULL,

  tx_route_poi tinytext,

  list_title tinytext,
  list_short mediumtext,
  map_title tinytext,
  map_short mediumtext,

  address_start text NOT NULL,
  address_end text NOT NULL,
  url text NOT NULL,

  image text,
  imagecaption text,
  imageseo text,
  imageheight tinytext,
  imagewidth tinytext,
  imageorient tinyint(4) unsigned NOT NULL default '0',
  imagecaption text,
  imagecols tinyint(4) unsigned NOT NULL default '0',
  imageborder tinyint(4) unsigned NOT NULL default '0',
  imagecaption_position varchar(12) default '',
  image_link text,
  image_zoom tinyint(3) unsigned NOT NULL default '0',
  image_noRows tinyint(3) unsigned NOT NULL default '0',
  image_effects tinyint(3) unsigned NOT NULL default '0',
  image_compression tinyint(3) unsigned NOT NULL default '0',
  image_frames tinyint(3) unsigned NOT NULL default '0',

  hidden tinyint(4) DEFAULT '0' NOT NULL,
  starttime int(11) DEFAULT '0' NOT NULL,
  endtime int(11) DEFAULT '0' NOT NULL,
  fe_group varchar(100) DEFAULT '0' NOT NULL,
  
  seo_keywords text,
  seo_description text,

  PRIMARY KEY (uid),
  KEY parent (pid)
);



#
# Table structure for table 'tx_route_path_mm_tx_route_category'
# 
CREATE TABLE tx_route_path_mm_tx_route_path_category (
  uid_local int(11) DEFAULT '0' NOT NULL,
  uid_foreign int(11) DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting int(11) DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_route_path_mm_tx_route_poi'
# 
CREATE TABLE tx_route_path_mm_tx_route_poi (
  uid_local int(11) DEFAULT '0' NOT NULL,
  uid_foreign int(11) DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting int(11) DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_route_poi'
#
CREATE TABLE tx_route_poi (
  uid int(11) NOT NULL auto_increment,
  pid int(11) DEFAULT '0' NOT NULL,
  tstamp int(11) DEFAULT '0' NOT NULL,
  crdate int(11) DEFAULT '0' NOT NULL,
  cruser_id int(11) DEFAULT '0' NOT NULL,
  deleted tinyint(4) DEFAULT '0' NOT NULL,

  sys_language_uid int(11) DEFAULT '0' NOT NULL,
  l10n_parent int(11) DEFAULT '0' NOT NULL,
  l10n_diffsource mediumtext,

  title tinytext,
  tx_route_category tinytext,
  short tinytext,
  bodytext mediumtext NOT NULL,

  lat text NOT NULL,
  lon text NOT NULL,
  address text NOT NULL,
  url text NOT NULL,

  tx_route_path tinytext,

  list_title tinytext,
  list_short mediumtext,
  map_title tinytext,
  map_short mediumtext,

  image text,
  imagecaption text,
  imageseo text,
  imageheight tinytext,
  imagewidth tinytext,
  imageorient tinyint(4) unsigned NOT NULL default '0',
  imagecaption text,
  imagecols tinyint(4) unsigned NOT NULL default '0',
  imageborder tinyint(4) unsigned NOT NULL default '0',
  imagecaption_position varchar(12) default '',
  image_link text,
  image_zoom tinyint(3) unsigned NOT NULL default '0',
  image_noRows tinyint(3) unsigned NOT NULL default '0',
  image_effects tinyint(3) unsigned NOT NULL default '0',
  image_compression tinyint(3) unsigned NOT NULL default '0',
  image_frames tinyint(3) unsigned NOT NULL default '0',

  hidden tinyint(4) DEFAULT '0' NOT NULL,
  starttime int(11) DEFAULT '0' NOT NULL,
  endtime int(11) DEFAULT '0' NOT NULL,
  fe_group varchar(100) DEFAULT '0' NOT NULL,
  
  seo_keywords text,
  seo_description text,

  PRIMARY KEY (uid),
  KEY parent (pid)
);



#
# Table structure for table 'tx_route_poi_mm_tx_route_category'
# 
CREATE TABLE tx_route_poi_mm_tx_route_category (
  uid_local int(11) DEFAULT '0' NOT NULL,
  uid_foreign int(11) DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting int(11) DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);
