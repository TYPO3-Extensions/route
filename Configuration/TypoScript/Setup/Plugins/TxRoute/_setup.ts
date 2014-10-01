<INCLUDE_TYPOSCRIPT: source="FILE:EXT:route/Configuration/TypoScript/Setup/Plugins/TxRoute/map.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:route/Configuration/TypoScript/Setup/Plugins/TxRoute/sql.ts">

plugin.tx_browser_pi1 {

  general_stdWrap >

  _CSS_DEFAULT_STYLE (
    .tx-browser-pi1 div.azSelector,
    .tx-browser-pi1 div.indexBrowser,
    .tx-browser-pi1 div.modeSelector {
      padding:.4em 0;
      /* 111218, 3.9.6, dwildt-*/
      /*height:1.4em;*/
    }
)
  marker {
    my_backbutton = TEXT
    my_backbutton {
      value = &laquo; Back
      lang {
        de = &laquo; Zur&uuml;ck
        en = &laquo; Back
      }
      wrap = <a class="tx_route-backbutton" href="javascript:history.back()">|</a>
    }
  }
}