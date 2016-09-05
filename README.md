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

### TODOs ###

* Stylesheet tags

### Queries ###

* Check for consistent post navigation labels (#312-wpcom-themes). #312 has no content?
* Use comment_form() instead of hard-coded comment form (#306-wpcom-themes). #306 has no content?
* (#171-wpcom-themes and #376-wpcom-themes), r6202-wpcom-themes empty?
* How to test wordpress.com widget styles?
* Jetpack social icons have no classes to change the styling