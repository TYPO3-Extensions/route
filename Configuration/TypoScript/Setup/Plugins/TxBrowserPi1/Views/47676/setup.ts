  ////////////////////////////////////////////////////////////////////////////////
  //
  // plugin.tx_browser_pi1

plugin.tx_browser_pi1 {
  views {
    list {
      47676 = Route (map only)
      47676 {
      }
    }
  }
}

<INCLUDE_TYPOSCRIPT: source="FILE:EXT:route/Configuration/TypoScript/Setup/Plugins/TxBrowserPi1/Views/47676/Navigation/_setup.ts">

plugin.tx_browser_pi1 {
  views {
    list {
      47676 {
        showUid   = {$plugin.tx_browser_pi1.map.aliases.showUid.path}
        name      = Route (map only)
        select    < plugin.tx_route.sql.select
        from      < plugin.tx_route.sql.from
        andWhere  < plugin.tx_route.sql.andWhere
        joins     < plugin.tx_route.sql.joins
        aliases   < plugin.tx_route.sql.aliases
        orderBy   < plugin.tx_route.sql.orderBy
        htmlSnippets =
        htmlSnippets {
          subparts {
            listview = TEXT
            listview {
              value (
                <div id="c###TT_CONTENT.UID###-listview-###MODE###" class="###VIEW###view ###VIEW###view-content ###VIEW###view-###MODE### ###VIEW###view-content-###MODE###">
                  ###MAP###
                  <!-- ###LISTBODY### begin -->
                    <!-- ###LISTBODYITEM### begin -->
                    <!-- ###LISTBODYITEM### end -->
                  <!-- ###LISTBODY### end -->
                </div> <!-- /listview -->
)
            }
          }
        }
      }
    }
    single {
      47676 = Route (map only)
      47676 {
        navigation {
          map < plugin.tx_browser_pi1.views.list.47676.navigation.map
          map {
            enabled = disabled
          }
        }
        select = tx_route_path.title
        tx_route_path {
            // table.field.uid: title
          title = TEXT
          title {
            value = Please don't use the view 47676 in the single view. 47676 is for the list view only!
            lang {
              de = Bitte verwende die Ansicht 47676 nicht in der Detailansicht. 47676 ist nur f&uuml;r die Listenansicht konfiguriert.
              en = Please don't use the view 47676 in the single view. 47676 is for the list view only!
            }
            wrap = <p>|</p>
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
          <div class="ui-widget ui-corner-all">
            <!-- ###SINGLEBODY### begin -->
            <!-- ###SINGLEBODYROW### begin -->
              ###TX_ROUTE_PATH.TITLE###
            <!-- ###SINGLEBODYROW### end -->
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
          }
        }
      }
    }
  }
}
  // plugin.tx_browser_pi1