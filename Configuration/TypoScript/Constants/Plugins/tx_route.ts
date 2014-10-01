plugin.tx_route {

  # cat=Route - Images//100;          type=options[17,18,25,26];  label= Position in list view: 17: In text right. 18: In text left. 25: Right beside the text. 26: Left beside the text.
  images.list.position = 18
  # cat=Route - Images//101;          type=string;      label= Max height in list view: Max height of images in list views
  images.list.maxHeight = 60c
  # cat=Route - Images//102;          type=string;      label= Max width in list view: Max width of images in list views
  images.list.maxWidth  = 100
  # cat=Route - Images//200;          type=options[default,1,2,8,9,10,17,18,25,26];  label= Position in pop ups: default: above center. 1: above right. 2: above left. 8: below center. 9: below right. 10: below left. 17: In text right. 18: In text left. 25: Right beside the text. 26: Left beside the text.
  images.map.position = 26
  # cat=Route - Images//201;          type=string;      label= Max height in pop ups: Max height of images in the pop up of the map
  images.map.maxHeight = 60c
  # cat=Route - Images//202;          type=string;      label= Max width in pop ups: Max width of images in the pop up of the map
  images.map.maxWidth  = 60

  # cat=Route - Path//100;            type=string;    label= CSS: Path to the css file
  path.css          = EXT:route/files/html/css/route.css
  # cat=Route - Path//101;            type=string;    label= upload folder: Path to the upload folder with an ending slash
  path.uploadfolder = uploads/tx_route/

}