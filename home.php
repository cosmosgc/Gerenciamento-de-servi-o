<?php
include("conectar.php");
include("var.php");

	//	----------- CONFIGURATION START ------------
	
	$color_body_back = '#000000';
	$color_body_text = '#aaaaaa';
	$color_body_link = '#ffffff';
	$color_body_hover = '#aaaaaa';

	$color_thumb_border = '#606060';
	$color_fullimg_border = '#ffffff';

	$color_marked_back = '#ff0000';
	$color_marked_text = '#000000';
	
	$color_dir_box_border = '#505050';
	$color_dir_box_back = '#000000';
	$color_dir_box_text = '#aaaaaa';
	$color_dir_hover = '#ffffff';
	$color_dir_hover_text = '#000000';

	$color_img_box_border = '#505050';
	$color_img_box_back = '#202020';
	$color_img_box_text = '#aaaaaa';
	$color_img_hover = '#ffffff';
	$color_img_hover_text = '#000000';

	$color_file_box_border = '#404040';
	$color_file_box_back = '#101010';
	$color_file_box_text = '#aaaaaa';
	$color_file_hover = '#ffffff';
	$color_file_hover_text = '#000000';

	$color_desc_box_border = '#404040';
	$color_desc_box_back = '#202020';
	$color_desc_box_text = '#aaaaaa';

	$color_menu_back = '#000000';
	$color_menu_top = '#303030';

	$color_navbar_back = '#202020';
	$color_navbar_top = '#303030';

	$color_button_nav_border = '#404040';
	$color_button_nav_back = '#101010';
	$color_button_nav_text ='#808080';

	$color_info_back = '#000000';
	$color_info_border = '#606060';
	$color_info_text = '#aaaaaa';

	$color_infobox_border = '#404040';
	$color_infobox_back ='#101010';

	$color_button_border = '#808080';
	$color_button_back = '#000000';
	$color_button_text = '#aaaaaa';
	$color_button_border_off = '#505050';
	$color_button_back_off = '#000000';
	$color_button_text_off = '#505050';
	$color_button_hover = '#ffffff';
	$color_button_hover_text = '#000000';
	$color_button_on = '#aaaaaa';
	$color_button_text_on = '#000000';

	$color_overlay = '#000000';

	//	----------- CONFIGURATION END ------------

	
	echo '<!DOCTYPE html><html><head><meta name="viewport" content="width=device-width, initial-scale=1"><meta charset="'.CHARSET.'"><title>'.TEXT_GALLERY_NAME.'</title><style>'.
	"
	img
	{
		-ms-interpolation-mode : bicubic;
	}

	body.sfpg
	{
		background : $color_body_back;
		color: $color_body_text;
		font-family: Arial, Helvetica, sans-serif;
		font-size: ".FONT_SIZE."px;
		font-weight: normal;
		margin:0px;
		padding:0px;
		overflow:hidden;
	}

	body.sfpg a:active, body.sfpg a:link, body.sfpg a:visited, body.sfpg a:focus
	{
		color : $color_body_link;
		text-decoration : none;
	}

	body.sfpg a:hover
	{
		color : $color_body_hover;
		text-decoration : none;
	}

	table
	{
		border-spacing: 0px;
		border-collapse: separate;
		font-size: ".FONT_SIZE."px;
		height:100%;
		width:100%;
	}

	table.info td
	{
		padding : 10px;
		vertical-align : top;
	}

	table.sfpg_disp
	{
		text-align : center;
		padding : 0px;
		cellspacing : 0px;
	}

	table.sfpg_disp td.menu
	{
		background : $color_menu_back;
		border-top : 1px solid $color_menu_top;
		vertical-align : middle;
		white-space: nowrap;
	}

	table.sfpg_disp td.navi
	{
		height: ".NAV_BAR_HEIGHT."px;
		background : $color_navbar_back;
		border-top : 1px solid $color_navbar_top;
		vertical-align : middle;
		white-space: nowrap;
	}

	table.sfpg_disp td.mid
	{
		vertical-align : middle;
	}

	.sfpg_info_text, .loading
	{
		".(ROUND_CORNERS?'border-radius: '.ROUND_CORNERS.'px;':'')."
		background : $color_info_back;
		border : 1px solid $color_info_border;
		color : $color_info_text;
		padding : 1px 4px 1px 4px;
		width : 200px;
	}
	
	.loading
	{
		padding : 20px 20px 20px 20px;
		margin-right: auto;
		margin-left: auto;
	}
	
	.sfpg_button, .sfpg_button_hover, .sfpg_button_on, .sfpg_button_nav, .sfpg_button_disabled
	{
		".(ROUND_CORNERS?'border-radius: '.ROUND_CORNERS.'px;':'')."
		cursor : pointer;
		background : $color_button_back;
		border : 1px solid $color_button_border;
		color : $color_button_text;
		padding : 0px 5px 0px 5px;
		margin : 0px 5px 0px 5px;
		white-space: nowrap;
	}

	.sfpg_button_hover
	{
		background : $color_button_hover;
		color : $color_button_hover_text;
	}

	.sfpg_button_on
	{
		background : $color_button_on;
		color : $color_button_text_on;
	}

	.sfpg_button_disabled
	{
		cursor : default;
		border : 1px solid $color_button_border_off;
		background : $color_button_back_off;
		color : $color_button_text_off;
	}

	.sfpg_button_nav
	{
		border: 1px solid $color_button_nav_border;
		background: $color_button_nav_back;
		color: $color_button_nav_text;
	}

	.thumbbox, .descbox
	{
		vertical-align : top;
		display:-moz-inline-stack;
		display:inline-block;
		zoom:1;
		*display:inline;
		width: ".((2 * (THUMB_BORDER_WIDTH + THUMB_MARGIN + THUMB_BOX_MARGIN)) + THUMB_MAX_WIDTH + 2)."px;
		height: ".((2 * (THUMB_BORDER_WIDTH + THUMB_MARGIN + THUMB_BOX_MARGIN)) + THUMB_MAX_HEIGHT + 2 + THUMB_BOX_EXTRA_HEIGHT)."px;
		margin: 0px;
		padding: 0px;
	}

	.descbox
	{
		width: ".(((2 * (THUMB_BORDER_WIDTH + THUMB_MARGIN + THUMB_BOX_MARGIN)) + THUMB_MAX_WIDTH + 2)*2)."px;
	}

	.thumbimgbox
	{
		width: ".((2 * (THUMB_BORDER_WIDTH + THUMB_MARGIN)) + THUMB_MAX_WIDTH)."px;
		height: ".((THUMB_BORDER_WIDTH * 2) + THUMB_MARGIN + THUMB_MAX_HEIGHT + 6)."px;
		margin: 0px; 
		padding: 0px;
	}

	.innerboxdir, .innerboximg, .innerboxfile, .innerboxdir_hover, .innerboximg_hover, .innerboxfile_hover, .innerbox_marked
	{
		".(ROUND_CORNERS?'border-radius: '.(ROUND_CORNERS*2).'px;':'')."
		cursor:pointer;
		margin: ".THUMB_BOX_MARGIN."px;
		padding: 0px;
		width: ".((2 * (THUMB_BORDER_WIDTH + THUMB_MARGIN)) + THUMB_MAX_WIDTH + 2)."px;
		height: ".((2 * (THUMB_BORDER_WIDTH + THUMB_MARGIN)) + THUMB_MAX_HEIGHT + 2 + THUMB_BOX_EXTRA_HEIGHT)."px;
	}

	.innerboxdesc
	{
		text-align : left;
		overflow:auto;
		".(ROUND_CORNERS?'border-radius: '.(ROUND_CORNERS*2).'px;':'')."
		margin: ".THUMB_BOX_MARGIN."px;
		padding: 5px;
		width: ".(2*(THUMB_BOX_MARGIN+(2 * (THUMB_BORDER_WIDTH + THUMB_MARGIN)) + THUMB_MAX_WIDTH + 2 - 5))."px;
		height: ".((2 * (THUMB_BORDER_WIDTH + THUMB_MARGIN)) + THUMB_MAX_HEIGHT + 2 + THUMB_BOX_EXTRA_HEIGHT - 10)."px;
		border: 1px solid $color_desc_box_border;
		background : $color_desc_box_back;
		color : $color_desc_box_text;
	}

	.innerboxdir, .innerboxdir_hover, .innerbox_marked
	{
		border: 1px solid $color_dir_box_border;
		background : $color_dir_box_back;
		color : $color_dir_box_text;
	}

	.innerboximg, .innerboximg_hover
	{
		border: 1px solid $color_img_box_border;
		background : $color_img_box_back;
		color : $color_img_box_text;
	}

	.innerboxfile, .innerboxfile_hover
	{
		border: 1px solid $color_file_box_border;
		background : $color_file_box_back;
		color : $color_file_box_text;
	}

	.innerboxdir_hover
	{
		background : $color_dir_hover;
		color : $color_dir_hover_text;
	}

	.innerboximg_hover
	{
		background : $color_img_hover;
		color : $color_img_hover_text;
	}

	.innerboxfile_hover
	{
		background : $color_file_hover;
		color : $color_file_hover_text;
	}

	.innerbox_marked
	{
		background : $color_marked_back;
		color : $color_marked_text;
	}

	.full_image
	{
		cursor:pointer;
		border : ".FULLIMG_BORDER_WIDTH."px solid $color_fullimg_border;
	}

	.banner
	{
		width:100%;
	}

	.thumb
	{
		".(ROUND_CORNERS?'border-radius: '.ROUND_CORNERS.'px;':'')."
		margin: ".THUMB_MARGIN."px ".THUMB_MARGIN."px 5px ".THUMB_MARGIN."px;
		border : ".THUMB_BORDER_WIDTH."px solid $color_thumb_border;
	}

	.box_image
	{
		position:absolute;
		bottom:".MENU_BOX_HEIGHT."px;
		right:0;
		z-index:1020;
		overflow:auto;
		visibility:hidden;
		text-align : center;
	}

	.box_wait
	{
		position:absolute;
		bottom:".MENU_BOX_HEIGHT."px;
		right:0;
		z-index:1015;
		overflow:auto;
		visibility:hidden;
		text-align : center;
	}

	.box_hud
	{
		position:absolute;
		bottom:".(MENU_BOX_HEIGHT+20)."px;
		right:0;
		z-index:1200;
		visibility:hidden;
		cursor:pointer;
	}

	.box_navi
	{
		position:absolute;
		bottom:0;
		left:0;
		height:".MENU_BOX_HEIGHT."px;
		width:100%;
		z-index:1120;
		overflow:hidden;
		text-align : center;
	}

	.box_info
	{
		".(ROUND_CORNERS?'border-radius: '.(ROUND_CORNERS*2).'px;':'')."
		position:absolute;
		top:10px;
		left:10px;
		width:".INFO_BOX_WIDTH."px;
		z-index:1040;
		visibility:hidden;
		overflow:auto;
		border : 1px solid $color_infobox_border;
		background: $color_infobox_back;
	}

	.box_overlay
	{
		position:absolute;
		bottom:".MENU_BOX_HEIGHT."px;
		left:0;
		height:100%;
		width:100%;
		z-index:1010;
		overflow:hidden;
		visibility:hidden;
		background:$color_overlay;
	}

	.box_gallery
	{
		text-align:center;
		position:absolute;
		top:0;
		right:0;
		z-index:1000;
		overflow:auto;
	}
	".
	'</style>';
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            <style>
            </style>
	</head>
<body>
<nav class="navbar">
      <ul class="nav navbar-nav">
        <li><a href="cadastrarApp.php">Informações dos funcionarios</a></li>
        <li><a href="demo.html">Informações dos serviços</a></li>
      </ul>
</nav>

