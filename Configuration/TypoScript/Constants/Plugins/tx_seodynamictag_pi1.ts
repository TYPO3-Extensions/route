
  ///////////////////////////////////////
  //
  // plugin.tx_seodynamictag
  // globalVar tx_browser_pi1|markerUid > 0
  //   plugin.tx_seodynamictag



  ///////////////////////////////////////
  //
  // plugin.tx_seodynamictag

plugin.tx_seodynamictag {
  canonical {
    single {
        // Only this parameter are allowed:
      additionalParams = &tx_browser_pi1[routeUid]={GP:tx_browser_pi1|routeUid}
    }
  }
  condition {
    single {
        // Please replace xxx with the uid of the page with the route plugin for the single view
        // Please use the Constant Editor
      begin = globalVar = GP:tx_browser_pi1|routeUid > 0] && [globalVar = TSFE:id = xxx
    }
  }
  database {
    table = tx_route_path
    var.1 = tx_browser_pi1[routeUid]
    field {
      //author        =
      description   = seo_description
      keywords      = seo_keywords
      title         = title
      short         = short
    }
  }
  default {
    description = Description is empty! Please maintain the current record of Route. See tab [Search Engine] field [Description]
  }
  keywords {
    default         = Keywords are empty! Please maintain the current record of Route. See tab [Search Engine] field [Keywords]
    moveToKeywords  = 0
  }
}
  // plugin.tx_seodynamictag



  ///////////////////////////////////////
  //
  // globalVar tx_browser_pi1|markerUid > 0

[globalVar = GP:tx_browser_pi1|markerUid > 0]

  plugin.tx_seodynamictag {
    canonical {
      single {
          // Only this parameter are allowed:
        additionalParams = &tx_browser_pi1[markerUid]={GP:tx_browser_pi1|markerUid}
      }
    }
    condition {
      single {
          // Please replace xxx with the uid of the page with the marker plugin for the single view
          // Please use the Constant Editor
        begin = globalVar = GP:tx_browser_pi1|markerUid > 0] && [globalVar = TSFE:id = xxx
      }
    }
    database {
      table = tx_marker_path
      var.1 = tx_browser_pi1[markerUid]
      field {
        //author        =
        description   = seo_description
        keywords      = seo_keywords
        title         = title
        short         = short
      }
    }
    default {
      description = Description is empty! Please maintain the current record of Marker. See tab [Search Engine] field [Description]
    }
    keywords {
      default         = Keywords are empty! Please maintain the current record of Marker. See tab [Search Engine] field [Keywords]
      moveToKeywords  = 0
    }
  }
[global]
  // globalVar tx_browser_pi1|markerUid > 0