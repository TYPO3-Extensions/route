  ////////////////////////////////////////////////////////////////////////////////
  //
  // plugin.tx_browser_pi1

plugin.tx_browser_pi1 {
  views {
    list {
      47678 = Marker (single only)
      47678 {
        navigation {
          map < plugin.tx_browser_pi1.navigation.map
        }
        name    = Marker (single only)
        showUid = {$plugin.tx_browser_pi1.map.aliases.showUid.marker}
        select (
          tx_route_marker.title
        )
        htmlSnippets =
        htmlSnippets {
          subparts {
            listview = TEXT
            listview {
              value (
            <div id="c###TT_CONTENT.UID###-listview-###MODE###" class="###VIEW###view ###VIEW###view-content ###VIEW###view-###MODE### ###VIEW###view-content-###MODE###">
              <p>
                Marker don't have any list view.<br />
                Please use view.list.47676 for routes (map only).<br />
                Please use view.list.47677 for routes (text only).
              </p>
              <p>
                Markierungen haben keine Listen-Ansicht.<br />
                Bitte benutze view.list.47676 f&uuml;r Routen (nur Karte).<br />
                Bitte benutze view.list.47678 f&uuml;r Routen (nur Text).
              </p>
              <!-- ###LISTBODY### begin --><!-- ###LISTBODYITEM### begin -->
              <div class="cleaner">&nbsp;</div><!-- ###LISTBODYITEM### end --><!-- ###LISTBODY### end -->
            </div> <!-- /listview -->
)
            }
          }
        }
      }
    }
    single {
      47678 = Marker (single only)
      47678 {
        navigation {
          map < plugin.tx_route.map
          map {
            enabled = Map
            marker {
              snippets {
                jss {
                  dynamic {
                    oxMapConfigModules {
                      10 {
                        value = {$plugin.tx_browser_pi1.map.openlayers.modules.default}
                      }
                      20 {
                        value = {$plugin.tx_browser_pi1.map.openlayers.modules.debugging}
                      }
                    }
                  }
                }
              }
            }
          }
        }
        name    = Marker (single only)
        select (
          tx_route_marker.title,
          tx_route_marker.short,
          tx_route_marker.bodytext,
          tx_route_marker.lat,
          tx_route_marker.lon,
          tx_route_marker.addressname,
          tx_route_marker.street,
          tx_route_marker.zip,
          tx_route_marker.city,
          tx_route_marker.country,
          tx_route_marker.phone,
          tx_route_marker.fax,
          tx_route_marker.email,
          tx_route_marker.url,
          tx_route_marker.image,
          tx_route_marker.imagecaption,
          tx_route_marker.imageseo,
          tx_route_marker.imageheight,
          tx_route_marker.imagewidth,
          tx_route_marker.imageorient,
          tx_route_marker.imagecaption,
          tx_route_marker.imagecols,
          tx_route_marker.imageborder,
          tx_route_marker.imagecaption_position,
          tx_route_marker.image_link,
          tx_route_marker.image_zoom,
          tx_route_marker.image_noRows,
          tx_route_marker.image_effects,
          tx_route_marker.image_compression,
          tx_route_marker.image_frames,
          tx_route_marker.uid,
          tx_route_category.title,
          tx_route_category.icons,
          tx_route_category.icon_offset_x,
          tx_route_category.icon_offset_y,
          tx_route_category.uid,
          tx_route_path.title,
          tx_route_path.uid,
        )
        XXXtx_route_marker {
            // image, title, cat image, short, bodytext, address, url
          title = COA
          title {
              // image, title, cat image, short, bodytext, address, url
            20 < temp.route.marker_image_47
            20 {
                // title, cat image, short, bodytext, address, url
              text = COA
              text {
                  // title
                30 = TEXT
                30 {
                  field = tx_route_marker.title
                  wrap = <h1>|</h1>
                }
                  // cat image, short, bodytext, address, url
                40 = COA
                40 {
                    // route cat image
                  10 < temp.route.route_cat_image_47
                  10 {
                    1 {
                      imageLinkWrap >
                    }
                  }
                    // short, bodytext
                  20 = COA
                  20 {
                      // short
                    10 = TEXT
                    10 {
                      field     = tx_route_marker.short
                      required  = 1
                      stdWrap {
                        parseFunc < lib.parseFunc_RTE
                      }
                    }
                      // bodytext
                    20 = TEXT
                    20 {
                      field     = tx_route_marker.bodytext
                      required  = 1
                      stdWrap {
                        parseFunc < lib.parseFunc_RTE
                      }
                    }
                  }
                    // address
                  30 = COA
                  30 {
                    if {
                      isTrue {
                          // address
                        cObject = COA
                        cObject {
                            // addressname
                          10 = TEXT
                          10 {
                            field = tx_route_marker.addressname
                          }
                            // street
                          20 = TEXT
                          20 {
                            field = tx_route_marker.street
                          }
                            // zip
                          30 = TEXT
                          30 {
                            field = tx_route_marker.zip
                          }
                            // city
                          40 = TEXT
                          40 {
                            field = tx_route_marker.city
                          }
                            // country
                          50 = TEXT
                          50 {
                            field = tx_route_marker.country
                          }
                        }
                      }
                    }
                      // header
                    10 = TEXT
                    10 {
                      value = Address
                      lang {
                        de = Adresse
                        en = Address
                      }
                      wrap = <h2>|</h2>
                    }
                      // content
                    20 = COA
                    20 {
                        // addressname
                      10 = TEXT
                      10 {
                        required  = 1
                        field     = tx_route_marker.addressname
                        wrap      = <span class="addressname">|</span><br />
                      }
                        // street
                      20 = TEXT
                      20 {
                        required  = 1
                        field     = tx_route_marker.street
                        wrap      = <span class="street">|</span><br />
                      }
                        // zip
                      30 = TEXT
                      30 {
                        required    = 1
                        field       = tx_route_marker.zip
                        noTrimWrap  = |<span class="zip">|</span> |
                      }
                        // city
                      40 = TEXT
                      40 {
                        required  = 1
                        field     = tx_route_marker.city
                        wrap      = <span class="city">|</span><br />
                      }
                        // country
                      50 = TEXT
                      50 {
                        required  = 1
                        field     = tx_route_marker.country
                        wrap      = <span class="country">|</span><br />
                      }
                      wrap = <p class="address">|</span>
                    }
                  }
                    // contact
                  40 = COA
                  40 {
                    if {
                      isTrue {
                          // contact
                        cObject = COA
                        cObject {
                            // phone
                          10 = TEXT
                          10 {
                            field = tx_route_marker.phone
                          }
                            // fax
                          20 = TEXT
                          20 {
                            field = tx_route_marker.fax
                          }
                            // email
                          30 = TEXT
                          30 {
                            field = tx_route_marker.email
                          }
                            // url
                          40 = TEXT
                          40 {
                            field = tx_route_marker.url
                          }
                        }
                      }
                    }
                      // header
                    10 = TEXT
                    10 {
                      value = Contact details
                      lang {
                        de = Kontakt
                        en = Contact details
                      }
                      wrap = <h2>|</h2>
                    }
                      // content
                    20 = COA
                    20 {
                        // phone
                      10 = TEXT
                      10 {
                        if {
                          isTrue {
                            field = tx_route_marker.phone
                          }
                        }
                        value       = <span class="label">phone</span>: <span class="content">{field:tx_route_marker.phone}</span>
                        lang {
                          de = <span class="label">Tel.</span>: <span class="content">{field:tx_route_marker.phone}</span>
                          en = <span class="label">phone</span>: <span class="content">{field:tx_route_marker.phone}</span>
                        }
                        insertData  = 1
                        wrap        = <span class="phone">|</span><br />
                      }
                        // fax
                      20 = TEXT
                      20 {
                        if {
                          isTrue {
                            field = tx_route_marker.fax
                          }
                        }
                        value       = <span class="label">fax</span>: <span class="content">{field:tx_route_marker.fax}</span>
                        lang {
                          de = <span class="label">Fax</span>: <span class="content">{field:tx_route_marker.fax}</span>
                          en = <span class="label">fax</span>: <span class="content">{field:tx_route_marker.fax}</span>
                        }
                        insertData  = 1
                        wrap        = <span class="fax">|</span><br />
                      }
                        // email
                      30 = TEXT
                      30 {
                        field     = tx_route_marker.email
                        required  = 1
                        typolink {
                          parameter {
                            field = tx_route_marker.email
                          }
                        }
                        noTrimWrap  = |<span class="email">|</span><br />
                      }
                        // url
                      40 = TEXT
                      40 {
                        required  = 1
                        //field     = tx_route_marker.url
                        value     = Website &raquo;
                        typolink {
                          parameter {
                            field = tx_route_marker.url
                          }
                        }
                        wrap = <span class="url">|</span>
                      }
                      wrap = <p class="contact">|</span>
                    }
                  }
                  wrap = <div class="tx_route-cat-icon">|</div>
                }
              }
            }
          }
        }
        tx_route_marker {
            // image (above ..., beside ...), text, image (below ...)
          title = COA
          title {
              // image in case of: above ... and beside ...
            10 = CASE
            10 {
              key {
                field = tx_route_marker.imageorient
              }
              // don't handle
              default = TEXT
              default {
                value =
              }
              // above-center: div.column ul.block-grid image /ul /div
              0 = COA
              0 {
                10 = TEXT
                10 {
                  field = tx_route_marker.imagecols
                  wrap = <div class="columns large-12 above-center"><ul class="clearing-thumbs small-block-grid-|" data-clearing>
                }
                  // image
                20 < plugin.tx_browser_pi1.displaySingle.master_templates.tableFields.image.1
                20 {
                  wrap >
                }
                // above-right: /ul /div
                30 = TEXT
                30 {
                  value = </ul></div>
                }
              }
              // above-right: div.column ul.block-grid image /ul /div
              1 < .0
              1 {
                10 {
                  wrap = <div class="columns large-6 large-offset-6 above-right"><ul class="clearing-thumbs small-block-grid-|" data-clearing>
                }
              }
              // above-left: div.column ul.block-grid
              2 < .0
              2 {
                10 {
                  wrap = <div class="columns large-6 above-left"><ul class="clearing-thumbs small-block-grid-|" data-clearing>
                }
              }
              // intext-right: div.columns ul.block-grid
              17 < .0
              17 {
                10 {
                  wrap = <div class="columns large-4 large-push-8 intext-right"><ul class="clearing-thumbs small-block-grid-|" data-clearing>
                }
              }
              // intext-left: div.columns ul.block-grid
              18 < .0
              18 {
                10 {
                  wrap = <div class="columns large-4 intext-left"><ul class="clearing-thumbs small-block-grid-|" data-clearing>
                }
              }
              // intext-right-nowrap: div.columns ul.block-grid
              25 < .0
              25 {
                10 {
                  wrap = <div class="columns large-4 large-push-8 intext-right-nowrap"><ul class="clearing-thumbs small-block-grid-|" data-clearing>
                }
              }
              // intext-left-nowrap: div.columns ul.block-grid
              26 < .0
              26 {
                10 {
                  wrap = <div class="columns large-4 intext-left-nowrap"><ul class="clearing-thumbs small-block-grid-|" data-clearing>
                }
              }
            }
              // text
            20 = CASE
            20 {
              key {
                field = tx_route_marker.imageorient
              }
              // don't handle
              default = TEXT
              default {
                value =
              }
              // above-center: div.columns
              0 = COA
              0 {
                wrap = <div class="columns large-12">|</div>
                  // social bookmarks
                10 = TEXT
                10 {
                  value (
                    <div class="sbmFloatRight">
                      ###SOCIALMEDIA_BOOKMARKS###
                    </div>
)
                }
                  // title
                20 = TEXT
                20 {
                  field = tx_route_marker.title
                  wrap = <h1>|</h1>
                }
                  // short, bodytext, address start, address end, url
                30 = COA
                30 {
                    // route short, route bodytext
                  20 = COA
                  20 {
                      // route short
                    10 = TEXT
                    10 {
                      field     = tx_route_marker.short
                      required  = 1
                      stdWrap {
                        parseFunc < lib.parseFunc_RTE
                      }
                    }
                      // route bodytext
                    20 = TEXT
                    20 {
                      field     = tx_route_marker.bodytext
                      required  = 1
                      stdWrap {
                        parseFunc < lib.parseFunc_RTE
                      }
                    }
                  }
                    // address start, address end
                  30 = COA
                  30 {
                      // address start
                    10 = COA
                    10 {
                      if {
                        isTrue {
                          field = tx_route_marker.address_start
                        }
                      }
                        // header
                      10 = TEXT
                      10 {
                        value = Starting point
                        lang {
                          de = Startpunkt
                          en = Starting point
                        }
                        wrap = <h2>|</h2>
                      }
                        // content
                      20 = TEXT
                      20 {
                        field     = tx_route_marker.address_start
                        stdWrap {
                          parseFunc < lib.parseFunc_RTE
                        }
                      }
                    }
                      // address end
                    20 = COA
                    20 {
                      if {
                        isTrue {
                          field = tx_route_marker.address_end
                        }
                      }
                        // header
                      10 = TEXT
                      10 {
                        value = Destination
                        lang {
                          de = Ziel
                          en = Destination
                        }
                        wrap = <h2>|</h2>
                      }
                        // content
                      20 = TEXT
                      20 {
                        field = tx_route_marker.address_end
                        stdWrap {
                          parseFunc < lib.parseFunc_RTE
                        }
                      }
                    }
                  }
                    // url
                  40 = COA
                  40 {
                    if {
                      isTrue {
                        field = tx_route_marker.url
                      }
                    }
                      // header
                    10 = TEXT
                    10 {
                      value = Details
                      lang {
                        de = Weitere Informationen
                        en = Details
                      }
                      wrap = <h2>|</h2>
                    }
                      // content
                    20 = TEXT
                    20 {
                      typolink {
                        parameter {
                          data = field:tx_route_marker.url
                        }
                      }
                    }
                  }
                }
              }
              // above-right: div.columns
              1 < .0
              1 {
                wrap = <div class="columns large-12">|</div>
              }
              // above-left: div.columns
              2 < .0
              2 {
                wrap = <div class="columns large-12">|</div>
              }
              // below-center: div.columns
              8 < .0
              8 {
                wrap = <div class="columns large-12">|</div>
              }
              // below-right: div.columns
              9 < .0
              9 {
                wrap = <div class="columns large-12">|</div>
              }
              // below-left: div.columns
              10 < .0
              10 {
                wrap = <div class="columns large-12">|</div>
              }
              // intext-right: div.columns
              17 < .0
              17 {
                wrap = <div class="columns large-8 large-pull-4">|</div>
              }
              // intext-left: div.columns
              18 < .0
              18 {
                wrap = <div class="columns large-8">|</div>
              }
              // intext-right-nowrap: div.columns
              25 < .0
              25 {
                wrap = <div class="columns large-8 large-pull-4">|</div>
              }
              // intext-left-nowrap: div.columns
              26 < .0
              26 {
                wrap = <div class="columns large-8">|</div>
              }
            }
              // image in case of: below ...
            30 = CASE
            30 {
              key {
                field = tx_route_marker.imageorient
              }
              // don't handle
              default = TEXT
              default {
                value =
              }
              // below-center: div.column ul.block-grid
              8 = COA
              8 {
                10 = TEXT
                10 {
                  field = tx_route_marker.imagecols
                  wrap = <div class="columns large-12 below-center"><ul class="clearing-thumbs small-block-grid-|" data-clearing>
                }
                  // image
                20 < plugin.tx_browser_pi1.displaySingle.master_templates.tableFields.image.0
                20 {
                  wrap >
                }
                // above-right: /ul /div
                30 = TEXT
                30 {
                  value = </ul></div>
                }
              }
              // below-right: div.column ul.block-grid
              9 < .8
              9 {
                10 {
                  wrap = <div class="columns large-6 large-offset-6 below-right"><ul class="clearing-thumbs small-block-grid-|" data-clearing>
                }
              }
              // below-left: div.column ul.block-grid
              10 < .8
              10 {
                10 {
                  wrap = <div class="columns large-6 below-left"><ul class="clearing-thumbs small-block-grid-|" data-clearing>
                }
              }
            }
          }
        }
        htmlSnippets =
        htmlSnippets {
          subparts {
            singleview = TEXT
            singleview {
              value (
<!-- ###AREA_FOR_AJAX_LIST_01### begin -->
        <div id="c###TT_CONTENT.UID###-singleview-###MODE###" class="singleview singleview-###MODE###">
          ###RECORD_BROWSER###
          <div class="ui-widget ui-corner-all">
            <!-- ###SINGLEBODY### begin -->
            <div class="ui-widget-content ui-corner-bottom">
              <!-- ###SINGLEBODYROW### begin -->
                ###MAP###
                <div class="sbmFloatRight">
                  ###SOCIALMEDIA_BOOKMARKS###
                </div>
                ###TX_ROUTE_MARKER.TITLE###
              <!-- ###SINGLEBODYROW### end -->
            </div>
  <!-- ###AREA_FOR_AJAX_LIST_01### end -->
            <!-- ###BACKBUTTON### begin -->
            <p class="tx_route-backbutton">
              ###MY_BACKBUTTON###
            </p>
            <!-- ###BACKBUTTON### end -->
  <!-- ###AREA_FOR_AJAX_LIST_02### begin -->
            <!-- ###SINGLEBODY### end -->
          </div>
        </div>
<!-- ###AREA_FOR_AJAX_LIST_02### end -->
)
            }
            singleview >
            singleview = TEXT
            singleview {
              value (
                <!-- ###SINGLEVIEW### begin --><!-- ###SINGLEBODY### begin --><!-- ###SINGLEBODYROW### begin -->
                <!-- ###AREA_FOR_AJAX_LIST_01### begin -->
                <div class="row">
                  ###RECORD_BROWSER###
                  <div class="columns">
                    ###MAP###
                  </div>
                  ###TX_ROUTE_MARKER.TITLE###
                </div>
                <!-- ###AREA_FOR_AJAX_LIST_01### end -->
                <div class="row">
                  <!-- ###BACKBUTTON### begin -->
                  <p class="columns backbutton">
                    ###MY_SINGLEVIEWBACKBUTTON###
                  </p>
                  <!-- ###BACKBUTTON### end -->
                </div>
                <!-- ###AREA_FOR_AJAX_LIST_02### begin -->
                <!-- ###AREA_FOR_AJAX_LIST_02### end -->
                <!-- ###SINGLEBODYROW### end --><!-- ###SINGLEBODY### end --><!-- ###SINGLEVIEW### end -->
)
            }
          }
        }
      }
    }
  }
}
  // plugin.tx_browser_pi1