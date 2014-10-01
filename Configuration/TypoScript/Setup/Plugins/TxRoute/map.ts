plugin.tx_route {
  map < plugin.tx_browser_pi1.navigation.map
  map {
    marker {
      snippets {
        jss {
          dynamic {
            oxMapConfigModules {
              10 {
                value = {$plugin.tx_browser_pi1.map.openlayers.modules.routes.default}
              }
              20 {
                value = {$plugin.tx_browser_pi1.map.openlayers.modules.routes.debugging}
              }
            }
          }
        }
      }
      variables {
        system {
          description >
            // type == route, type != route
          description = COA
          description {
              // type == route
              // popup: close icon, image, header, text
            10 = COA
            10 {
                // if type == route
              if =
              if {
                value = route
                equals {
                  field = type
                }
              }
                // close icon
              10 = TEXT
              10 {
                value = <div class="olPopupCloseBox" style="width: 17px; height: 17px; position: absolute; right: 13px; top: 45px; z-index: 1;" id="featurePopup_close"></div>
              }
              10 >
              // image linked to record (default), notype, page, url
              20 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.0
              20 {
                default {
                  file {
                    import {
                      listNum = {$plugin.tx_browser_pi1.map.popup.image.listNum}
                    }
                    height = {$plugin.tx_browser_pi1.map.popup.image.height}
                    width = {$plugin.tx_browser_pi1.map.popup.image.width}
                  }
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
                // header
              30 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.0
              30 {
                default {
                  wrap = <div class="mapPopupHeader mapPopupHeaderDefault">|</div>
                }
                notype {
                  wrap = <div class="mapPopupHeader mapPopupHeaderNotype">|</div>
                }
                page {
                  wrap = <div class="mapPopupHeader mapPopupHeaderPage">|</div>
                }
                url {
                  wrap = <div class="mapPopupHeader mapPopupHeaderUrl">|</div>
                }
              }
                // text
              40 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.0
              40 {
                default {
                  10.stdWrap.crop = {$plugin.tx_browser_pi1.map.popup.text.crop}
                  20 {
                    if {
                      value   = '{$plugin.tx_browser_pi1.map.openlayers.popup.behaviour}'
                      equals  = 'click'
                    }
                  }
                  wrap = <div class="mapPopupText mapPopupTextDefault">|</div>
                }
                notype {
                  10.stdWrap.crop = {$plugin.tx_browser_pi1.map.popup.text.crop}
                  20 {
                    if {
                      value   = '{$plugin.tx_browser_pi1.map.openlayers.popup.behaviour}'
                      equals  = 'click'
                    }
                  }
                  wrap = <div class="mapPopupText mapPopupTextNotype">|</div>
                }
                page {
                  10.stdWrap.crop = {$plugin.tx_browser_pi1.map.popup.text.crop}
                  20 {
                    if {
                      value   = '{$plugin.tx_browser_pi1.map.openlayers.popup.behaviour}'
                      equals  = 'click'
                    }
                  }
                  wrap = <div class="mapPopupText mapPopupTextPage">|</div>
                }
                url {
                  10.stdWrap.crop = {$plugin.tx_browser_pi1.map.popup.text.crop}
                  20 {
                    if {
                      value   = '{$plugin.tx_browser_pi1.map.openlayers.popup.behaviour}'
                      equals  = 'click'
                    }
                  }
                  wrap = <div class="mapPopupText mapPopupTextUrl">|</div>
                }
              }
            }
              // type != route
              // popup: close icon, image, header, text
            20 = COA
            20 {
                // if type != route
              if =
              if {
                value = route
                equals {
                  field = type
                }
                negate = 1
              }
                // close icon
              10 = TEXT
              10 {
                value = <div class="olPopupCloseBox" style="width: 17px; height: 17px; position: absolute; right: 13px; top: 45px; z-index: 1;" id="featurePopup_close"></div>
              }
              10 >
              // image linked to record (default), notype, page, url
              20 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.1
              20 {
                default {
                  file {
                    import {
                      listNum = {$plugin.tx_browser_pi1.map.popup.image.listNum}
                    }
                    height = {$plugin.tx_browser_pi1.map.popup.image.height}
                    width = {$plugin.tx_browser_pi1.map.popup.image.width}
                  }
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
                // header
              30 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.1
              30 {
                default {
                  wrap = <div class="mapPopupHeader mapPopupHeaderDefault">|</div>
                }
                notype {
                  wrap = <div class="mapPopupHeader mapPopupHeaderNotype">|</div>
                }
                page {
                  wrap = <div class="mapPopupHeader mapPopupHeaderPage">|</div>
                }
                url {
                  wrap = <div class="mapPopupHeader mapPopupHeaderUrl">|</div>
                }
              }
                // text
              40 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.1
              40 {
                default {
                  10.stdWrap.crop = {$plugin.tx_browser_pi1.map.popup.text.crop}
                  20 {
                    if {
                      value   = '{$plugin.tx_browser_pi1.map.openlayers.popup.behaviour}'
                      equals  = 'click'
                    }
                  }
                  wrap = <div class="mapPopupText mapPopupTextDefault">|</div>
                }
                notype {
                  10.stdWrap.crop = {$plugin.tx_browser_pi1.map.popup.text.crop}
                  20 {
                    if {
                      value   = '{$plugin.tx_browser_pi1.map.openlayers.popup.behaviour}'
                      equals  = 'click'
                    }
                  }
                  wrap = <div class="mapPopupText mapPopupTextNotype">|</div>
                }
                page {
                  10.stdWrap.crop = {$plugin.tx_browser_pi1.map.popup.text.crop}
                  20 {
                    if {
                      value   = '{$plugin.tx_browser_pi1.map.openlayers.popup.behaviour}'
                      equals  = 'click'
                    }
                  }
                  wrap = <div class="mapPopupText mapPopupTextPage">|</div>
                }
                url {
                  10.stdWrap.crop = {$plugin.tx_browser_pi1.map.popup.text.crop}
                  20 {
                    if {
                      value   = '{$plugin.tx_browser_pi1.map.openlayers.popup.behaviour}'
                      equals  = 'click'
                    }
                  }
                  wrap = <div class="mapPopupText mapPopupTextUrl">|</div>
                }
              }
            }
          }
          url >
            // type == route, type != route
          url = COA
          url {
              // type == route
            10 = COA
            10 {
                // if type == route
              if =
              if {
                value = route
                equals {
                  field = type
                }
              }
                // [STRING] URL of the point (has an effect in hoover mode only!)
                // key, default (single view), page, url
              10 = CASE
              10 {
                key {
                  field = {$plugin.tx_browser_pi1.templates.listview.url.0.key}
                }
                  // single view
                default = TEXT
                default {
                  typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.default
                  typolink {
                    returnLast = url
                  }
                }
                page = TEXT
                page {
                  typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.page
                  typolink {
                    returnLast = url
                  }
                }
                url = TEXT
                url {
                  typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.url
                  typolink {
                    returnLast = url
                  }
                }
              }
            }
              // type != route
              // popup: close icon, image, header, text
            20 = COA
            20 {
                // if type != route
              if =
              if {
                value = route
                equals {
                  field = type
                }
                negate = 1
              }
                // [STRING] URL of the point (has an effect in hoover mode only!)
                // key, default (single view), page, url
              10 = CASE
              10 {
                key {
                  field = {$plugin.tx_browser_pi1.templates.listview.url.1.key}
                }
                  // single view
                default = TEXT
                default {
                  typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.1.default
                  typolink {
                    returnLast = url
                  }
                }
                page = TEXT
                page {
                  typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.1.page
                  typolink {
                    returnLast = url
                  }
                }
                url = TEXT
                url {
                  typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.1.url
                  typolink {
                    returnLast = url
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}