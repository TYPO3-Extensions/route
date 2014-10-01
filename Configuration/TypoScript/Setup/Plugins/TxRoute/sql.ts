plugin.tx_route {
  sql {
    select (
      tx_route_path.title               AS 'tx_route_path.title',
      tx_route_path.short               AS 'tx_route_path.short',
      tx_route_path.address_start       AS 'tx_route_path.address_start',
      tx_route_path.address_end         AS 'tx_route_path.address_end',
      tx_route_path.bodytext            AS 'tx_route_path.bodytext',
      tx_route_path.color               AS 'tx_route_path.color',
      tx_route_path.geodata             AS 'tx_route_path.geodata',
      tx_route_path.icon_lat            AS 'tx_route_path.icon_lat',
      tx_route_path.icon_lon            AS 'tx_route_path.icon_lon',
      tx_route_path.image               AS 'tx_route_path.image',
      tx_route_path.imagecaption        AS 'tx_route_path.imagecaption',
      tx_route_path.imageseo            AS 'tx_route_path.imageseo',
      tx_route_path.imageheight         AS 'tx_route_path.imageheight',
      tx_route_path.imagewidth          AS 'tx_route_path.imagewidth',
      tx_route_path.imageorient         AS 'tx_route_path.imageorient',
      tx_route_path.imagecaption        AS 'tx_route_path.imagecaption',
      tx_route_path.imagecols           AS 'tx_route_path.imagecols',
      tx_route_path.imageborder         AS 'tx_route_path.imageborder',
      tx_route_path.imagecaption_position AS 'tx_route_path.imagecaption_position',
      tx_route_path.image_link          AS 'tx_route_path.image_link',
      tx_route_path.image_zoom          AS 'tx_route_path.image_zoom',
      tx_route_path.image_noRows        AS 'tx_route_path.image_noRows',
      tx_route_path.image_effects       AS 'tx_route_path.image_effects',
      tx_route_path.image_compression   AS 'tx_route_path.image_compression',
      tx_route_path.image_frames        AS 'tx_route_path.image_frames',
      tx_route_path.line_width          AS 'tx_route_path.line_width',
      tx_route_path.list_title          AS 'tx_route_path.list_title',
      tx_route_path.list_short          AS 'tx_route_path.list_short',
      tx_route_path.map_title           AS 'tx_route_path.map_title',
      tx_route_path.map_short           AS 'tx_route_path.map_short',
      tx_route_path.url                 AS 'tx_route_path.url',
      tx_route_path.uid                 AS 'tx_route_path.uid',
      tx_route_path_cat.title           AS 'tx_route_path_cat.title',
      tx_route_path_cat.formlabelcss    AS 'tx_route_path_cat.formlabelcss',
      tx_route_path_cat.icons           AS 'tx_route_path_cat.icons',
      tx_route_path_cat.icon_offset_x   AS 'tx_route_path_cat.icon_offset_x',
      tx_route_path_cat.icon_offset_y   AS 'tx_route_path_cat.icon_offset_y',
      tx_route_path_cat.uid             AS 'tx_route_path_cat.uid',
      tx_route_marker.title             AS 'tx_route_marker.title',
      tx_route_marker.short             AS 'tx_route_marker.short',
      tx_route_marker.bodytext          AS 'tx_route_marker.bodytext',
      tx_route_marker.lat               AS 'tx_route_marker.lat',
      tx_route_marker.lon               AS 'tx_route_marker.lon',
      tx_route_marker.image             AS 'tx_route_marker.image',
      tx_route_marker.list_title        AS 'tx_route_marker.list_title',
      tx_route_marker.list_short        AS 'tx_route_marker.list_short',
      tx_route_marker.map_title         AS 'tx_route_marker.map_title',
      tx_route_marker.map_short         AS 'tx_route_marker.map_short',
      tx_route_marker.url               AS 'tx_route_marker.url',
      tx_route_marker.uid               AS 'tx_route_marker.uid',
      tx_route_marker_cat.title         AS 'tx_route_marker_cat.title',
      tx_route_marker_cat.formlabelcss  AS 'tx_route_marker_cat.formlabelcss',
      tx_route_marker_cat.icons         AS 'tx_route_marker_cat.icons',
      tx_route_marker_cat.icon_offset_x AS 'tx_route_marker_cat.icon_offset_x',
      tx_route_marker_cat.icon_offset_y AS 'tx_route_marker_cat.icon_offset_y',
      tx_route_marker_cat.uid           AS 'tx_route_marker_cat.uid',
      CONCAT( tx_route_path.uid, '.', tx_route_path_cat.uid ) AS 'PATH:tx_route_path->tx_route_path_cat->listOf.uid',
      CONCAT( tx_route_path.uid, '.', tx_route_marker.uid, '.', tx_route_marker_cat.uid ) AS 'MARKER:tx_route_path->tx_route_marker->tx_route_marker_cat->listOf.uid'
    )
    select {
      deal_as_table {
        0 {
          statement = CONCAT( tx_route_path.uid, '.', tx_route_path_cat.uid )
          alias     = PATH:tx_route_path->tx_route_path_cat->listOf.uid
        }
        1 {
          statement = CONCAT( tx_route_path.uid, '.', tx_route_marker.uid, '.', tx_route_marker_cat.uid )
          alias     = MARKER:tx_route_path->tx_route_marker->tx_route_marker_cat->listOf.uid
        }
      }
    }
    from {
      table = tx_route_path
      alias = tx_route_path
    }
      // ###PID_LIST###, tx_route_path.uid if tx_route_path.uid is set
    andWhere = COA
    andWhere {
      10 = TEXT
      10 {
        value = tx_route_path.pid IN (###PID_LIST###)
      }
      20 = TEXT
      20 {
        if {
          isTrue {
            data = GP:tx_browser_pi1|{$plugin.tx_browser_pi1.map.aliases.showUid.path}
          }
        }
        value       = AND tx_route_path.uid = {GP:tx_browser_pi1|{$plugin.tx_browser_pi1.map.aliases.showUid.path}}
        insertData  = 1
        noTrimWrap  = | | |
      }
    }
    joins {
      0 {
        type  = LEFT JOIN
        table = tx_route_path_mm_tx_route_category
        alias = tx_route_path_mm_cat
        on    = tx_route_path.uid = tx_route_path_mm_cat.uid_local
      }
      1 {
        type  = LEFT JOIN
        table = tx_route_category
        alias = tx_route_path_cat
        on    = tx_route_path_cat.uid = tx_route_path_mm_cat.uid_foreign
      }
      2 {
        type  = LEFT JOIN
        table = tx_route_path_mm_tx_route_marker
        alias = tx_route_path_mm_marker
        on    = tx_route_path.uid = tx_route_path_mm_marker.uid_local
      }
      3 {
        type  = LEFT JOIN
        table = tx_route_marker
        alias = tx_route_marker
        on    = tx_route_marker.uid = tx_route_path_mm_marker.uid_foreign
      }
      4 {
        type  = LEFT JOIN
        table = tx_route_marker_mm_tx_route_category
        alias = tx_route_marker_mm_cat
        on    = tx_route_marker.uid = tx_route_marker_mm_cat.uid_local
      }
      5 {
        type  = LEFT JOIN
        table = tx_route_category
        alias = tx_route_marker_cat
        on    = tx_route_marker_cat.uid = tx_route_marker_mm_cat.uid_foreign
      }
    }
    aliases {
      tables {
        tx_route_path           = tx_route_path
        tx_route_path_cat       = tx_route_path_cat
        tx_route_path_mm_cat    = tx_route_path_mm_tx_route_category
        tx_route_path_mm_marker = tx_route_path_mm_tx_route_marker
        tx_route_marker         = tx_route_marker
        tx_route_marker_cat     = tx_route_marker_cat
        tx_route_marker_mm_cat  = tx_route_marker_mm_tx_route_category
      }
      fields {
        uid = tx_route_path.uid
        pid = tx_route_path.pid
      }
    }
    orderBy = tx_route_path.title, tx_route_path_mm_marker.sorting, tx_route_marker_cat.title
  }
}