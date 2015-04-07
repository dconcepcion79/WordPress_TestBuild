Neighborly WordPress Theme
========================
This theme is aimed at those folks who enjoy tweaking their own themes to achieve exactly that which 
they are looking for as well as those who want at least the basics of website accessibiity included 
in their theme.

*	Customization was kept in mind when creating and naming the different files included in the theme. 
*	It should be simple to find the file you need to customize to meet your needs. 
*	The code has been kept clean and simple which will also assist with customization.

It is strongly recommended that you make use of a child theme before attempting any customization. 
Doing things this way means that you will not lose your changes as and when new versions of the 
theme see the light of day.

Copyright
---------
This theme, in its entirety is licensed under the GNU General Public License v2 or later.

License URI	http://www.gnu.org/licenses/gpl-2.0.html

Design Constraints
------------------
*	The main menu will show all levels of the applicable menu as a single flat menu.
*	In articles with the video or audio post formats normal use of the post excerpt is not possible as 
	this feature is reserved for use for the text transcripts for video or audio respectively.
*	Videos inserted into posts or pages do not re-size properly on small screens. There are numerous plugins available that rectify this situation. I have tested FitVids for WordPress and it works well.

Credits and acknowledgements
----------------------------
Neighborly is based on Underscores - (C) 2012-2014 Automattic, Inc.
http://underscores.me/

Resetting and rebuilding styles have been helped along thanks to the fine work of Eric Meyer 
along with Nicolas Gallagher and Jonathan Neal and Blueprint.
http://meyerweb.com/eric/tools/css/reset/index.html
http://necolas.github.com/normalize.css/
http://www.blueprintcss.org/

Neighborly makes use of Genericons. (licensed under the GPLv2 License)
http://genericons.com/

Use is also made of the original Hybrid Media Grabber script graciously made available by Justin Tadlock.
https://github.com/justintadlock/hybrid-core/blob/master/classes/hybrid-media-grabber.php

Author
------
Author - Arnold Goodway
Author URI - http://arnoldgoodway.co.za/
Theme URI - http://arnoldgoodway.co.za/free-wordpress-theme/

Features
--------
*	Collapsed menu on screen resolutions smaller than 782px.
*	Other responsive features due to the built-in grid system.
*	Basic theme options via the Theme Customizer.
*	Incorporation of Genericons.
*	2 Widget areas.
*	Support for 4 post formats, (audio, gallery, image and video.)
*	Flexible header that re-sizes with screen resolution.
*	Translation ready.
*	Support for featured images.
*	Custom background.
*	Custom menu.
* 	Added EXIF data to image post formats on the single page.
*	Sticky posts.
*	Valid HTML and CSS (apart from errors resulting from the embedding of audio and video in WordPress).

Accessibilty Features
---------------------
*	All images used in theme have been given an appropriate alt attribute.
*	Media resources (video and audio) do not autostart.
* 	A compliant HTML heading structure has been implemented.
*	Repetitive and non-contextual text strings in links have been removed. Post titles have been added to the
	read-more links.
*	Navigation by keyboard is possible on all the pages within the theme.
*	All background/foreground colour contrasts fall within the Web Content Accessibiity guidelines
	(Level AAA)
	
	*	#ffffff - #474747 ratio 9.29 : 1
	*	#a60000 - #ffffff ratio 8.01 : 1
	*	#000000 - #ffffff ratio 21.1 : 1
	* 	#a60000 - #ffffff ratio 7.35 : 1
	* 	#f8f8f8 - #a60000 ratio 7.54 : 1
	*	#474747 - #e1e1e1 ratio 7.11 : 1

*	Skip link on all the pages to move a user directly to the main content.
*	Labels have been associated with all form controls.
*	Tabindex and accesskey attributes have not been used in the theme.
*	No new windows or tabs are opened by the theme itself.
* 	A visual clue has been added to external links.
*	For both audio and video posts the user need only add text transcripts to the 
	excerpt of the relevant post. The theme itself will link to the transcript 
	in the blog pages and show the transcript in the single pages.
*	Relative instead of absolute values have been used for all font sizes. This means 
	that all text can be re-sized within the different browsers.
*	A page template for a HTML sitemap has been included.
*	The necessary code to force WordPress to recognize the error on a blank search has been added.

Accessibilty Issues to be dealt with by the User
------------------------------------------------
*	All images in posts and/or pages need to have an appropriate alt attribute.
*	The correct heading structure must be maintained when content is added to posts or pages.
*	All colour changes to background/foreground colours have to have a colour contrast of at least 
	7.1 to 1 ratio.
*	If forms are added (e.g. a contact form) labels have to be coupled to every form control.
*	When adding links no new windows or tabs should be opened without the user being notified 
	of this fact.
*	When adding external links the class="external" should be added to the link.
*	In audio and video posts the excerpt should not be used as this is reserved for 
	the text tanscripts for video and/or audio.
*	Do not change any of the font sizes to absolute values.

Important files
---------------
Apart from the standard WordPress templates the theme also makes use of the following files:

*	css/grid - grid system used.
*	css/reset - the CSS reset used.
*	inc/template-tags.php - various additional functions including the page navigation functions.
*	inc/media.php - the Hybrid Media Grabber used to fetch first video or audio from post.
*	inc/footer-widgets.php - setup footer widget areas.
*	inc/extras.php - as the name suggests, a number of extra functions used by the theme.
*	inc/customize.php - functions for options included in the theme customizer.
*	inc/custom-header.php - functions to setup the custom header.

More information on these files and other information is available at:
http://arnoldgoodway.co.za/free-wordpress-theme/

Changelog
---------
Version 1.4

Version 1.3
Removed title attributes added manually to links on the theme.
Removed the function to remove title attributes from images in content.
Removed the function to remove title attributes from the tag cloud.
Improved the way search results are shown.
Removed FitVids JQuery script.
Moved image on external links to after the link.
Corrected faulty link pages in content.php.
Author and Theme URI changed to show new site.
Version 1.2 
Initial release.

Getting started
---------------
If you have used WordPress before this theme will pose no problems. Everything is pretty straightforward,
users should be up and running in no time.

A page with full details of the theme (features, faq, setup etc.) has been setup at: 

http://arnoldgoodway.co.za/free-wordpress-theme/

You are welcome to visit these pages should you require anymore information.
All support queries to the relevant WordPress forum please.

Please remember that any WordPress theme can only be as accessible as the content and plugins
the user adds to it. Enjoy your theme!

