plugin.tx_browser_pi1 {
  views {
    single {
      47677 = Route (text only)
      47677 {
        navigation {
          map < plugin.tx_browser_pi1.views.list.47676.navigation.map
          map {
            enabled = disabled
          }
        }
        name      = Route (text only)
        select    < plugin.tx_route.sql.select
        from      < plugin.tx_route.sql.from
        andWhere  < plugin.tx_route.sql.andWhere
        joins     < plugin.tx_route.sql.joins
        aliases   < plugin.tx_route.sql.aliases
        orderBy   = tx_route_path.list_title, tx_route_path.title, tx_route_path_mm_marker.sorting, tx_route_marker_cat.title
        tx_route_path {
            // image (if it is above or beside), text, image (if it is below)
          title = COA
          title {
              // image (if it is above or beside)
            10 = CASE
            10 {
              key {
                field = tx_route_path.imageorient
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
                  field = tx_route_path.imagecols
                  wrap = <div class="columns large-12 above-center"><ul class="clearing-thumbs small-block-grid-|" data-clearing>
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
                field = tx_route_path.imageorient
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
                  field = tx_route_path.title
                  wrap = <h1>|</h1>
                }
                  // cat image, text
                30 = COA
                30 {
                    // cat image
                  10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.2.notype
                  10 {
                    wrap = <div style="float:left;padding:0 1em 1em 0;">|</div>
                  }
                    // text: short, bodytext, address start, address end, url
                  20 = COA
                  20 {
                      // short
                    10 = TEXT
                    10 {
                      field     = tx_route_path.short
                      required  = 1
                      stdWrap {
                        parseFunc < lib.parseFunc_RTE
                      }
                    }
                      // route bodytext
                    20 = TEXT
                    20 {
                      field     = tx_route_path.bodytext
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
                          field = tx_route_path.address_start
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
                        field     = tx_route_path.address_start
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
                          field = tx_route_path.address_end
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
                        field = tx_route_path.address_end
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
                        field = tx_route_path.url
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
                          data = field:tx_route_path.url
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
              // image (if it is below)
            30 = CASE
            30 {
              key {
                field = tx_route_path.imageorient
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
                  field = tx_route_path.imagecols
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
                <!-- ###SINGLEVIEW### begin --><!-- ###SINGLEBODY### begin --><!-- ###SINGLEBODYROW### begin -->
                <!-- ###AREA_FOR_AJAX_LIST_01### begin -->
                <div class="row">
                  ###RECORD_BROWSER###
                  ###TX_ROUTE_PATH.TITLE###
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