
  ///////////////////////////////////////
  //
  // plugin.tx_browser_pi1
  // globalVar
  //    tx_browser_pi1|markerUid  > 0
  //    tx_browser_pi1|routeUid   > 0



  ///////////////////////////////////////
  //
  // plugin.tx_browser_pi1

plugin.tx_browser_pi1 {
  map {
    aliases {
      showUid {
        marker  = markerUid
        path    = routeUid
      }
    }
    controlling {
      enabled = Map +Routes
    }
    design {
      path {
        categoryIcon = uploads/tx_route/
      }
      width = 970
    }
    html {
      form {
        label {
          class {
            marker  = tx_route_marker_cat.formlabelcss
            path    = tx_route_path_cat.formlabelcss
          }
        }
      }
    }
    icon {
      listNum {
        categoryIconLegend    = 0
        categoryIconMap       = 1
        categoryIconMapSingle = 2
        categoryIconText      = 2
      }
    }
    marker {
      field {
        linktoSingle          = tx_route_marker.uid
        latitude              = tx_route_marker.lat
        longitude             = tx_route_marker.lon
        description           = tx_route_marker.title
        category              = tx_route_marker_cat.title
        categoryIcon          = tx_route_marker_cat.icons
        categoryOffsetX       = tx_route_marker_cat.icon_offset_x
        categoryOffsetY       = tx_route_marker_cat.icon_offset_y
      }
      position {
        categoryIconLegend  = 0
        categoryIconMap     = 0
      }
    }
    openlayers {
      popup {
        behaviour = click
      }
    }
    path {
      mapper {
        tables {
          local {
            path    = tx_route_path
            marker  = tx_route_marker
          }
          cat {
            path    = tx_route_path_cat
            marker  = tx_route_marker_cat
          }
        }
        fields {
          local {
            title {
              path    = title
              marker  = title
            }
            lat {
              path    = icon_lat
              marker  = lat
            }
            lon {
              path    = icon_lon
              marker  = lon
            }
          }
          cat {
            title {
              path    = title
              marker  = title
            }
            icons {
              path    = icons
              marker  = icons
            }
            iconOffsetX {
              path    = icon_offset_x
              marker  = icon_offset_x
            }
            iconOffsetY {
              path    = icon_offset_y
              marker  = icon_offset_y
            }
          }
        }
      }
      table {
        path {
          title         = tx_route_path.title
          geodata       = tx_route_path.geodata
          color         = tx_route_path.color
          lineWidth     = tx_route_path.line_width
        }
        pathCategory {
          title = tx_route_path_cat.title
        }
        marker {
          title = tx_route_marker.title
        }
        markerCategory {
          title = tx_route_marker_cat.title
        }
      }
    }
  }
  templates {
    listview {
      image {
        // 0: Path
        0 {
          default = EXT:route/Ressources/Public/Images/route_default_300x200.gif
          file    = tx_route_path.image
          height  = 100c
          path    = uploads/tx_route/
          seo     = tx_route_path.imageseo // tx_route_path.imagecaption // tx_route_path.title
          width   = 70c
        }
        // 1: Marker
        1 {
          default = EXT:route/Ressources/Public/Images/marker_default_300x200.gif
          file    = tx_route_marker.image
          path    = uploads/tx_route/
          seo     = tx_route_marker.imageseo // tx_route_marker.imagecaption // tx_route_marker.title
        }
        // 2: Route Category
        2 {
          file    = tx_route_path_cat.icons
          height  = 48c
          listNum = 2
          path    = uploads/tx_route/
          seo     =
          width   = 48c
        }
      }
      header {
        // 0: Path
        0 {
          field = tx_route_path.map_title // tx_route_path.list_title // tx_route_path.title
        }
        // 1: Marker
        1 {
          field = tx_route_marker.map_title // tx_route_marker.list_title // tx_route_marker.title
        }
      }
      text {
        // 0: Path
        0 {
          field = tx_route_path.map_short // tx_route_path.list_short // tx_route_path.short // tx_route_path.bodytext
        }
        // 1: Marker
        1 {
          field = tx_route_marker.map_short // tx_route_marker.list_short // tx_route_marker.short // tx_route_marker.bodytext
        }
      }
      url {
        // 0: Path
        0 {
          record  = tx_route_path.uid
          showUid = routeUid
        }
        // 1: Marker
        1 {
          record  = tx_route_marker.uid
          showUid = markerUid
        }
        // 2: Path (category icon)
        2 {
          record  = tx_route_path.uid
          showUid = routeUid
        }
      }
    }
    singleview {
      image {
        // 0: Path
        0 {
          caption = tx_route_path.imagecaption
          file    = tx_route_path.image
          height  = tx_route_path.imageheight
          path    = uploads/tx_route/
          seo     = tx_route_path.imageseo // tx_route_path.imagecaption // tx_route_path.title
          width   = tx_route_path.imagewidth
        }
        // 1: Marker
        1 {
          caption = tx_route_marker.imagecaption
          file    = tx_route_marker.image
          height  = tx_route_marker.imageheight
          path    = uploads/tx_route/
          seo     = tx_route_marker.imageseo // tx_route_marker.imagecaption // tx_route_marker.title
          width   = tx_route_marker.imagewidth
        }
      }
    }
  }
}
  // plugin.tx_browser_pi1



  ///////////////////////////////////////
  //
  // globalVar tx_browser_pi1|markerUid > 0

[globalVar = GP:tx_browser_pi1|markerUid > 0]
  plugin.tx_browser_pi1 {
    map {
      controlling {
        enabled = Map
      }
      marker {
        field {
          linktoSingle    = tx_route_marker.uid
          latitude        = tx_route_marker.lat
          longitude       = tx_route_marker.lon
          description     = tx_route_marker.title
          category        = tx_route_category.title
          categoryIcon    = tx_route_category.icons
          categoryOffsetX = tx_route_category.icon_offset_x
          categoryOffsetY = tx_route_category.icon_offset_y
        }
      }
    }
  }
[global]
  // globalVar tx_browser_pi1|markerUid > 0