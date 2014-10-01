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
    my_singleviewbackbutton = COA
    my_singleviewbackbutton {
        // History Back
      10 = TEXT
      10 {
        value = Back
        lang {
          de = Zur&uuml;ck
          en = Back
        }
        noTrimWrap  = |<a href="javascript:history.back()">&laquo; |</a>|
      }
        // Devider
      20 = TEXT
      20 {
        value = |
        noTrimWrap  = | | |
      }
        // List
      30 = TEXT
      30 {
        value = All routes
        lang {
          de = Alle Routen
          en = All routes
        }
        stdWrap {
          noTrimWrap  = | | &raquo;|
        }
        typolink {
          parameter.data = TSFE:id
        }
      }
    }
  }
}

<INCLUDE_TYPOSCRIPT: source="FILE:EXT:route/Configuration/TypoScript/Setup/Plugins/TxBrowserPi1/Seo/setup.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:route/Configuration/TypoScript/Setup/Plugins/TxBrowserPi1/Views/_setup.ts">