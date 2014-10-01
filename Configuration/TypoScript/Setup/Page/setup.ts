  // page
  // page - seo



  ////////////////////////////////////////
  //
  // page

page {
  includeCSS {
    route = {$plugin.tx_route.path.css}
  }
}
  // page



  ////////////////////////////////////////
  //
  // page - seo

[globalVar = GP:tx_browser_pi1|showUid > 0] || [globalVar = GP:tx_browser_pi1|markerUid > 0] || [globalVar = GP:tx_browser_pi1|routeUid > 0]
  page {
    config {
      noPageTitle = 2
    }
    headerData {
      20 = TEXT
      20 {
        data = register:browser_htmlTitleTag
        ifEmpty {
          field = title
          noTrimWrap  = |TYPO3 Route: ||
        }
        wrap = <title>|</title>
      }
    }
    meta {
      description {
        field >
        data = register:browser_description
      }
      keywords {
        field >
        data = register:browser_keywords
      }
    }
  }
[global]
  // globals: page / SEO