# README #

Conversion of Glowline theme from WordPress.org to WordPress.com theme.

### Some General Notes to Remember ###

* Only the theme files and plugins installed are tracked in this repo. Not the base install of WordPress
* Uses vanilla CSS, maybe change that to SASS later?
* Test data installed from: https://wpcom-themes.svn.automattic.com/demo/theme-unit-test-data.xml

### Theme Settings (controlled in Admin) ###

* Site Title: "This is a test for the Glowline theme, which is a rubbish name for a website".
* Site Tagline: "This tagline is too long for a normal website but lets see what happens if I keep rambling like this because we want this to be longer than the site title...."
* Blog posts show 5 per page
* Enabled threaded comments 5 levels deep
* Break comments into pages after 5 comments
* Permalinks set to Post Name
* Homepage now has a template called Home. All other settings are in customizer

### Images Used in Screenshot ###
* https://unsplash.com/?photo=jOS6t2qZFHQ
* https://commons.wikimedia.org/wiki/File:IPC_logo_white_(2004).png
* https://commons.wikimedia.org/wiki/Category:Paralympic_Games#/media/File:140930-D-DB155-016_(15232257889).jpg


### Queries ###

* Most #***-wpcom-themes have no content?
* How to test wordpress.com widget styles?
* Jetpack social icons have no classes to change the styling
* Theme Tuxlist?

### i2 Queries ###

* Check whether `echo esc_html_e($glowline_grid_layout, 'glowline');` is better than echo `esc_attr_e($glowline_grid_layout, 'glowline');` as technically its a class
* Check if this function is needed in content.php? `glowline_get_related_single_post()`
* Double check removing constants from default image in functions.php (line 86) is correct syntax
* Need to check custom excerpt still echos in content grid and main slider