# Step child

## Description

TL;DR: WordPress plugin working (almost) like a child theme.

Sometimes the project you're thrown into doesn't have a child theme, or the customer doesn't want a child theme, or it is just not possbible for one reason or another. But you still want to add css, javascript, hooks, filters, ACF json, and so on. This happened to me, so I made Step child. 

This is used on [babaà](https://babaa.es/).

## Installation

1. Upload `step-child` to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Edit the scss file in step-child/scss/, and build, see below. And edit the js file in step-child/js/.

## Build css

If you don't have sass on your computer simly open a terminal and run: gem install sass.

1. Open terminal and run: sh watch-compressed.sh from `/your-install/wp-content/plugins/step-child/scss/`
2. This will watch style.scss and all included scss files for changes and build `../css/style.css` and `../css/wp-admin.css`

## Add php functions

In the directory `functions` there are three sub directories to keep this nice and tidy:

1. `plugins`
2. `themes`
3. `wordpress`

Add your custom code to a file in one of these three directories, where you see fit. If you have added a new file, add a require_once for your new file in index.php for that directory.

## ACF

If you are using ACF all field groups are saved in the Step child plugin folder `acf`
 
## Changelog

### 1.0.0

* Initial release
