
  ////////////////////////////////////////
  //
  // INDEX

  // temp.route: route linkToSingle
  // temp.route: route_image_47
  // temp.route: route_image_simple_47
  // temp.route: route_cat_image_47
  // temp.route: marker_image_47
  // temp.route: marker_image_simple_47
  // temp.route: marker_cat_image_47



  ////////////////////////////////////////
  //
  // temp.route: route linkToSingle

temp.route {
    // link to the single view of a route
  route_linkToSingle = COA
  route_linkToSingle {
      // URL: page id, page type, parameters
    10 = COA
    10 {
        // Page uid
      10 = TEXT
      10 {
        data = page:uid
      }
        // Page type
      20 = TEXT
      20 {
        value = 0
        wrap  = ,|
      }
        // Parameter
      30 = COA
      30 {
          // ,&tx_browser_pi1[showuid]=
        10 = TEXT
        10 {
          if {
            isTrue {
              field = {$plugin.tx_browser_pi1.map.path.mapper.tables.local.path}.uid
            }
          }
          field = {$plugin.tx_browser_pi1.map.path.mapper.tables.local.path}.uid
          wrap  = ,&tx_browser_pi1[{$plugin.tx_browser_pi1.map.aliases.showUid.path}]=|
        }
      }
    }
      // target
    20 = TEXT
    20 {
        // [STRING] - (default). Examples: -, _self, _blank, _top
      value = -
      noTrimWrap = | | |
    }
      // class
    30 = TEXT
    30 {
        // [STRING] - (default)
      value = -
      noTrimWrap = | | |
    }
      // title
    40 = TEXT
    40 {
      if {
        isTrue {
          field =
        }
      }
        // [STRING]
      field =
      wrap  = "|"
    }
  }
}
  // temp.route: route linkToSingle



  ////////////////////////////////////////
  //
  // temp.route: route_image_47

temp.route {
    // tt_content.image.20 version TYPO3 4.7
  route_image_47 < tt_content.image.20
  route_image_47 {
    imgList {
      field = tx_route_path.image
    }
    imgPath = {$plugin.tx_route.path.uploadfolder}
    1 {
      file {
        width {
          field = tx_route_path.imagewidth
        }
        height {
          field = tx_route_path.imageheight
        }
      }
      altText {
        field             = tx_route_path.imageseo
        htmlSpecialChars  = 1
      }
      titleText {
        field             = tx_route_path.imageseo
        htmlSpecialChars  = 1
      }
      imageLinkWrap {
        ifEmpty {
          typolink.parameter.field = tx_route_path.image_link
        }
        typolink {
          parameter {
            field = tx_route_path.image_link
          }
          additionalParams  = &tx_browser_pi1[{$plugin.tx_browser_pi1.map.aliases.showUid.path}]=###TX_ROUTE_PATH.UID###
          useCacheHash      = 1
          title             = TEXT
          title {
            field = tx_route_path.title
          }
        }
        enable = 1
        enable {
          field = tx_route_path.image_zoom
          ifEmpty {
            typolink {
              parameter {
                field = tx_route_path.image_link
              }
            }
          }
        }
      }
    }
    textPos.field           = tx_route_path.imageorient
    equalH.field            = tx_route_path.imageheight
    image_compression.field = tx_route_path.image_compression
    image_effects.field     = tx_route_path.image_effects
    noRows.field            = tx_route_path.image_norows
    cols.field              = tx_route_path.imagecols
    border.field            = tx_route_path.image_frames
    caption.1.1.field       = tx_route_path.imagecaption
    captionAlign.field      = tx_route_path.imagecaption_position
    layout {
      1 {
        value = <div class="csc-textpic csc-textpic-right csc-textpic-above###CLASSES###">###IMAGES###<div class="csc-textpic-clear"><!-- --></div>###TEXT###</div><div class="csc-textpic-clear"><!-- --></div>
      }
      2 {
        value = <div class="csc-textpic csc-textpic-left csc-textpic-above###CLASSES###">###IMAGES###<div class="csc-textpic-clear"><!-- --></div>###TEXT###</div><div class="csc-textpic-clear"><!-- --></div>
      }
      key {
        field = tx_route_path.imageorient
      }
    }
    stdWrap {
      //prefixComment >
    }
      // #43936
    rendering {
      singleNoCaption {
        allStdWrap {
          innerWrap {
            cObject {
              key {
                field = tx_route_path.imageorient
              }
            }
          }
        }
        fallbackRendering {
          10 {
            if {
              isTrue {
                field = tx_route_path.imagecaption
              }
            }
          }
          20 {
            if {
              isTrue {
                field = tx_route_path.imagecaption
              }
            }
          }
          30 {
            if {
              isTrue {
                field = tx_route_path.imagecaption
              }
            }
          }
          40 {
            if {
              isFalse {
                field = tx_route_path.imagecaption
              }
            }
          }
        }
      }
      noCaption {
        fallbackRendering {
          if {
            isTrue {
              field = tx_route_path.imagecaption
            }
          }
        }
      }
      singleCaption {
        fallbackRendering {
          if {
            isTrue {
              field = tx_route_path.imagecaption
            }
          }
        }
      }
      splitCaption {
        fallbackRendering {
          if {
            isTrue {
              field = tx_route_path.imagecaption
            }
          }
        }
      }
      globalCaption {
        fallbackRendering {
          if {
            isTrue {
              field = tx_route_path.imagecaption
            }
          }
        }
      }
    }
  }
}
  // temp.route: route_image_47



  ////////////////////////////////////////
  //
  // temp.route: route_image_simple_47

temp.route {
    // tt_content.image.20 version TYPO3 4.7
  route_image_simple_47 < temp.route.route_image_47
  route_image_simple_47 {
    1 {
      file {
        width   >
        height  >
        width   = {$plugin.tx_route.images.map.maxWidth}
        height  = {$plugin.tx_route.images.map.maxHeight}
      }
      imageLinkWrap >
    }
    equalH >
    caption >
    textPos = {$plugin.tx_route.images.map.position}
    layout {
      key >
      key = {$plugin.tx_route.images.map.position}
    }
    maxWInText  = {$plugin.tx_route.images.map.maxWidth}
    imgMax      = 1
    imgStart    = 0
  }
}
  // temp.route: route_image_simple_47



  ////////////////////////////////////////
  //
  // temp.route: route_cat_image_47

temp.route {
    // tt_content.image.20 version TYPO3 4.7
  route_cat_image_47 < tt_content.image.20
  route_cat_image_47 {
      // Display one image only
    imgMax    = 1
    imgStart  = {$plugin.tx_browser_pi1.map.icon.listNum.categoryIconText}
    layout {
      key >
      key = default
      default {
        value = ###IMAGES###
      }
    }
    imgList {
      field = tx_route_path_cat.icons
    }
    imgPath = {$plugin.tx_route.path.uploadfolder}
    1 {
      file {
        width   >
        width   = {$plugin.tx_route.images.list.maxWidth}
        height  >
        height  = {$plugin.tx_route.images.list.maxHeight}
        width   >
        height  >
      }
      altText {
        field             = tx_route_path.title
        htmlSpecialChars  = 1
      }
      titleText {
        field             = tx_route_path.title
        htmlSpecialChars  = 1
      }
      imageLinkWrap >
      imageLinkWrap = 1
      imageLinkWrap {
        enable = 1
        typolink {
          parameter {
              // URL: page id, page type, parameters
            cObject < temp.route.route_linkToSingle
          }
          useCacheHash  = 1
        }
      }
    }
  }
}
  // temp.route: route_cat_image_47



  ////////////////////////////////////////
  //
  // temp.route: marker_image_47

temp.route {
    // tt_content.image.20 version TYPO3 4.7
  marker_image_47 < tt_content.image.20
  marker_image_47 {
    imgList {
      field = tx_route_marker.image
    }
    imgPath = {$plugin.tx_route.path.uploadfolder}
    1 {
      file {
        width {
          field = tx_route_marker.imagewidth
        }
        height {
          field = tx_route_marker.imageheight
        }
      }
      altText {
        field             = tx_route_marker.imageseo
        htmlSpecialChars  = 1
      }
      titleText {
        field             = tx_route_marker.imageseo
        htmlSpecialChars  = 1
      }
      imageLinkWrap {
        ifEmpty {
          typolink.parameter.field = tx_route_marker.image_link
        }
        typolink {
          parameter {
            field = tx_route_marker.image_link
          }
          additionalParams  = &tx_browser_pi1[{$plugin.tx_browser_pi1.map.aliases.showUid.marker}]=###TX_ROUTE_PATH.UID###
          useCacheHash      = 1
          title             = TEXT
          title {
            field = tx_route_marker.title
          }
        }
        enable = 1
        enable {
          field = tx_route_marker.image_zoom
          ifEmpty {
            typolink {
              parameter {
                field = tx_route_marker.image_link
              }
            }
          }
        }
      }
    }
    textPos.field           = tx_route_marker.imageorient
    equalH.field            = tx_route_marker.imageheight
    image_compression.field = tx_route_marker.image_compression
    image_effects.field     = tx_route_marker.image_effects
    noRows.field            = tx_route_marker.image_norows
    cols.field              = tx_route_marker.imagecols
    border.field            = tx_route_marker.image_frames
    caption.1.1.field       = tx_route_marker.imagecaption
    captionAlign.field      = tx_route_marker.imagecaption_position
    layout {
      1 {
        value = <div class="csc-textpic csc-textpic-right csc-textpic-above###CLASSES###">###IMAGES###<div class="csc-textpic-clear"><!-- --></div>###TEXT###</div><div class="csc-textpic-clear"><!-- --></div>
      }
      2 {
        value = <div class="csc-textpic csc-textpic-left csc-textpic-above###CLASSES###">###IMAGES###<div class="csc-textpic-clear"><!-- --></div>###TEXT###</div><div class="csc-textpic-clear"><!-- --></div>
      }
      key {
        field = tx_route_marker.imageorient
      }
    }
    stdWrap {
      //prefixComment >
    }
      // #43936
    rendering {
      singleNoCaption {
        allStdWrap {
          innerWrap {
            cObject {
              key {
                field = tx_route_marker.imageorient
              }
            }
          }
        }
        fallbackRendering {
          10 {
            if {
              isTrue {
                field = tx_route_marker.imagecaption
              }
            }
          }
          20 {
            if {
              isTrue {
                field = tx_route_marker.imagecaption
              }
            }
          }
          30 {
            if {
              isTrue {
                field = tx_route_marker.imagecaption
              }
            }
          }
          40 {
            if {
              isFalse {
                field = tx_route_marker.imagecaption
              }
            }
          }
        }
      }
      noCaption {
        fallbackRendering {
          if {
            isTrue {
              field = tx_route_marker.imagecaption
            }
          }
        }
      }
      singleCaption {
        fallbackRendering {
          if {
            isTrue {
              field = tx_route_marker.imagecaption
            }
          }
        }
      }
      splitCaption {
        fallbackRendering {
          if {
            isTrue {
              field = tx_route_marker.imagecaption
            }
          }
        }
      }
      globalCaption {
        fallbackRendering {
          if {
            isTrue {
              field = tx_route_marker.imagecaption
            }
          }
        }
      }
    }
  }
}
  // temp.route: marker_image_47



  ////////////////////////////////////////
  //
  // temp.route: marker_image_simple_47

temp.route {
    // tt_content.image.20 version TYPO3 4.7
  marker_image_simple_47 < temp.route.marker_image_47
  marker_image_simple_47 {
    1 {
      file {
        width   >
        height  >
        width   = {$plugin.tx_route.images.map.maxWidth}
        height  = {$plugin.tx_route.images.map.maxHeight}
      }
      imageLinkWrap >
    }
    equalH >
    caption >
    textPos = {$plugin.tx_route.images.map.position}
    layout {
      key >
      key = {$plugin.tx_route.images.map.position}
    }
    maxWInText  = {$plugin.tx_route.images.map.maxWidth}
    imgMax      = 1
    imgStart    = 0
  }
}
  // temp.route: marker_cat_image_47



  ////////////////////////////////////////
  //
  // temp.route: marker_cat_image_47

temp.route {
    // tt_content.image.20 version TYPO3 4.7
  marker_cat_image_47 < tt_content.image.20
  marker_cat_image_47 {
      // Display one image only
    imgMax    = 1
    imgStart  = {$plugin.tx_browser_pi1.map.icon.listNum.categoryIconText}
    layout {
      key >
      key = default
      default {
        value = ###IMAGES###
      }
    }
    imgList {
      field = tx_route_marker_cat.icons
    }
    imgPath = {$plugin.tx_route.path.uploadfolder}
    1 {
      file {
        width   >
        width   = {$plugin.tx_route.images.list.maxWidth}
        height  >
        height  = {$plugin.tx_route.images.list.maxHeight}
        width   >
        height  >
      }
      altText {
        field             = tx_route_marker.title
        htmlSpecialChars  = 1
      }
      titleText {
        field             = tx_route_marker.title
        htmlSpecialChars  = 1
      }
      imageLinkWrap >
      imageLinkWrap = 1
      imageLinkWrap {
        enable = 1
        typolink {
          parameter {
              // URL: page id, page type, parameters
            cObject < temp.route.route_linkToSingle
          }
          useCacheHash  = 1
        }
      }
    }
  }
}
  // temp.route: marker_cat_image_47
