plugin.tx_browser_pi1 {
  views {
    list {
      47677 = Route (text only)
      47677 {
        navigation {
          map < plugin.tx_browser_pi1.navigation.map
          map {
            enabled = disabled
          }
        }
        showUid   = {$plugin.tx_browser_pi1.map.aliases.showUid.path}
        name      = Route (text only)
        select    < plugin.tx_route.sql.select
        from      < plugin.tx_route.sql.from
        andWhere  < plugin.tx_route.sql.andWhere
        joins     < plugin.tx_route.sql.joins
        aliases   < plugin.tx_route.sql.aliases
        orderBy   = tx_route_path.list_title, tx_route_path.title, tx_route_path_mm_marker.sorting, tx_route_marker_cat.title
        csvLinkToSingleView = tx_route_path.title
        tx_route_path {
            // image, text
          title = COA
          title {
              // image
            10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.0
            10 {
              default {
                wrap = <div style="float:left;padding:0 1em 1em 0;">|</div>
              }
              notype {
                wrap = <div style="float:left;padding:0 1em 1em 0;">|</div>
              }
              page {
                wrap = <div style="float:left;padding:0 1em 1em 0;">|</div>
              }
              url {
                wrap = <div style="float:left;padding:0 1em 1em 0;">|</div>
              }
            }
              // text: title; cat image, short
            20 = COA
            20 {
                // title
              10 = TEXT
              10 {
                field = tx_route_path.title
                override {
                  field = tx_route_path.list_title // tx_route_path.title
                }
                wrap = <h2>|</h2>
              }
                // cat image, short
              20 = COA
              20 {
                  // route cat image
                10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.2
                10 {
                  default {
                    xxfile {
                      import {
                        stdWrap {
                          cObject {
                            10 {
                              20 {
                                field = tx_route_path_cat.icons
                                listNum = 2
                              }
                            }
                          }
                        }
                      }
                      height =
                      width =
                    }
                    wrap = <div style="float:left;padding:0 1em 1em 0;">|</div>
                  }
                  notype {
                    file {
                      import {
                        stdWrap {
                          cObject {
                            10 {
                              20 {
                                field = tx_route_path_cat.icons
                                listNum = 2
                              }
                            }
                          }
                        }
                      }
                      height =
                      width =
                    }
                    wrap = <div style="float:left;padding:0 1em 1em 0;">|</div>
                  }
                  page {
                    file {
                      import {
                        stdWrap {
                          cObject {
                            10 {
                              20 {
                                field = tx_route_path_cat.icons
                                listNum = 2
                              }
                            }
                          }
                        }
                      }
                      height =
                      width =
                    }
                    wrap = <div style="float:left;padding:0 1em 1em 0;">|</div>
                  }
                  url {
                    file {
                      import {
                        stdWrap {
                          cObject {
                            10 {
                              20 {
                                field = tx_route_path_cat.icons
                                listNum = 2
                              }
                            }
                          }
                        }
                      }
                      height =
                      width =
                    }
                    wrap = <div style="float:left;padding:0 1em 1em 0;">|</div>
                  }
                }
                  // short: short, link to single view
                20 = COA
                20 {
                    // route list_short or short, if list_short is empty
                  10 = TEXT
                  10 {
                    field     = tx_route_path.list_short // tx_route_path.short
                    noTrimWrap = || |
                  }
                    // link to single view
                  20 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.details.0
                  wrap = <p>|</p>
                }
                wrap = <div class="tx_route-cat-icon">|</div>
              }
            }
          }
        }
        htmlSnippets =
        htmlSnippets {
          subparts {
            listview = TEXT
            listview {
              value (
                <div id="c###TT_CONTENT.UID###-listview-###MODE###" class="###VIEW###view ###VIEW###view-content ###VIEW###view-###MODE### ###VIEW###view-content-###MODE###">
                  <!-- ###LISTBODY### begin --><!-- ###LISTBODYITEM### begin -->
                  <div class="sbmFloatRight">
                    ###SOCIALMEDIA_BOOKMARKS###
                  </div>
                  ###TX_ROUTE_PATH.TITLE###
                  <!-- ###LISTBODYITEM### end --><!-- ###LISTBODY### end -->
                </div> <!-- /listview -->
)
            }
          }
        }
      }
    }
  }
}