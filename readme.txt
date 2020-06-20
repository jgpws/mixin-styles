=== Mixin' Styles ===

Contributors: jgpws
Tags: two-columns, left-sidebar, right-sidebar, custom-colors, custom-background, custom-header, custom-menu, featured-images, sticky-post, theme-options, threaded-comments
Requires at least: 4.5
Tested up to: 5.4.1
Stable tag: 1.2
License: GPL-3.0-or-later
License URI: https://www.gnu.org/licenses/gpl-3.0-standalone.html

== Description ==
Mixin' Styles is a free premium level theme. This theme makes use of rounded corners, text shadow and font embedding. Also supported are custom header, custom logo, custom menus and image thumbnails. You can change several color schemes and backgrounds from the Customizer.

== Credits ==
* WAI-ARIA-Walker_Nav_Menu, GPLv2, https://github.com/proteusthemes/WAI-ARIA-Walker_Nav_Menu

== Changelog ==

= 1.2 June 17 2020 =
Gutenberg compatibility and block styling. Responsive video embed block.

= 1.1.1 June 12 2020 =
New screenshot. Accesibility fixes for the header menu.

= 1.1 June 10 2020 =
Version 1.1 with major updates. New features include new Customizer options: three header menu styles; three featured image sizes; left, right bottom sidebars.

= 1.0 June 3 2020 =
New version 1.0 with several changes to the underlying theme code; Responsive, CSS Grid layout. Removed Internet Explorer compatibility.

= 0.2.6 April 14 2016 =
Ran Theme Check on this theme. Got rid of old backward compatible code for WP 2.9; added support for title_tag; properly registered the sidebar using a function; cleaned up wp_nav_menu, adding a callback and adding tabmenu class to its auto-generated code.

= 0.2.5 December 21 2011 =
Important update for WP 2.9- users. Added a legacy comments file to replace the existing one that works with WP 3.0 because if WP 2.9 or below does not recognize the comment_form tag, the reply section disappears. Now, the alternate comments template is loaded via a filter that looks for the comment_form function; if it doesn't exist, the filter loads legacy.comments.php. legacy.comments.php is still compatible with the wp_list_comments function.

= 0.2.4 December 16 2011 =
Adjusted underlying code so the content is read by the browser before the sidebar. Adjusted the accompanying CSS accordingly. Placed bold and italic Walkway embedded font into ie7fixes.css with different font family names, so bold and italic fonts render correctly in IE. Styled the blockquote tag.

= 0.2.3 December 14 2011 =
Fixed feed links to be backward compatible for WP 2.9 only. Correctly implemented automatic feed links for WP 3.0 by removing hard coded rss links in the header. Changed the capabilities for the options page in the add_theme_page function to 'edit_theme_options' instead of 'manage_options'.

= 0.2.2 December 13 2011 =
Important update! I made the comment form backward compatible for WordPress versions below 3.0. With the comment form using 3.0 only code, the theme will break in versions below 3.0! In addition, I added styling to the comment form.

= 0.2.1 December 11 2011 =
Installed and used the Theme Check plugin to bring this theme up to current theme development best practices. Changes include support for paginated posts, post tags display, automatic feed links and inclusion of a comments.php file using newer standards. Changes have been made to the underlying code so the theme doesn't use template tags that may be deprecated in the future.

= 0.2 December 7 2011 =
Made Mixin' Styles backward compatible for WordPress versions below 3.0, where Image thumbnail and custom menu support do not appear in versions below 3.0, but the theme still works below 3.0.

Added support for WP 2.9 image thumbnails

Added three new styles to the theme options page: "Khaki", "Tan" and "Sandstone".

= 0.1.1 December 5 2011 =
Corrected inconsistent h3 and h2 tags in the sidebar. All have been converted to h3 tags. Changed class title "widget-title" to "widgettitle".

Added white-space: nowrap css rule in stylesheet so text doesn't wrap to to a new line inside the dropdown. For example, in the test environment the word "Employment Opportunities" wrapped into two lines, where the backgorund color did not cover behind.

== Installation/Theme Requirements ==

A browser may download files to a Documents folder, My Documents or in a Download folder within My Documents. Check these areas for the theme file.

For a remote location (web server on the Internet):

1. Download the file mixin-styles.zip from Jason G. Designs

2a. Extract the zip file in Windows (right-click, select Extract All... or File menu, Extract All...)

2b. In Mac OS X (version 10.3 and up), locate the zip file and double-click it

2c. For Linux, see the eHow article titled "How to Open Zip Files in Linux", located at http://www.ehow.com/how_5004466_open-zip-files-linux.html

3. Use an FTP client to upload the inside folder (mixin-styles) from your computer to your remote WordPress installation. Filezilla works well for this purpose. For information on how to connect to an ftp server using Filezilla, see http://wiki.filezilla-project.org/Using#Connecting_to_an_FTP_server. The username and password are usually the ones used from your web host

4. Upload the mixin-styles folder to yourwebsitetitle.com/wp-content/themes, where yourwebsitetitle is your site's domain title

5. If you are using WordPress 3.0 or above you can install a new theme from your computer to your WordPress blog from the remote site's Admistration panel.

* In WordPress's Admin panel, select Themes
* Choose the Install Themes tab
* From the list of links at the top, choose Upload
* Choose "Browse" or "Choose File" (this is different depending on the browser) *From here, locate the zip file and then select Install Now

6. Activate the theme by selecting the Activate link

For a local computer:

1. Download the file mixin-styles.zip from Jason G. Designs

2a. Extract file in Windows (right-click, select Extract All... or File menu, Extract All...)

2b. In Mac OS X (version 10.3 and up). Locate the zip file and double-click it

3. Move the inner mixin-styles folder (by drag-and-drop or cut-and-paste) to your local site.
If you are using Apache and have WordPress installed in the htdocs folder, this would be at htdocs > wordpress > wp-content > themes

4. Activate the theme by selecting the Activate link
