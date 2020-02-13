For Kreiger-based faculty members, labs, or intranets. Has vertical navigation. Doesn't require majority of KSAS-specific plugins. Based off [JointsWP]( http://jointswp.com/), built with Foundation 6.3.1.

### Getting Started With Gulp
- Install [node.js](https://nodejs.org).
- Using the command line, navigate to your theme directory
- Run npm install
- Run gulp to confirm everything is working

### Watching for Changes
```bash
$ npm run watch
```
* Watches for changes in the `assets/styles/scss` directory. When a change is made the SCSS files are compiled, concatenated with Foundation files and saved to the `/styles` directory. Sourcemaps will be created.
* Watches for changes in the `assets/scripts/js` directory. When a change is made the JS files are compiled, concatenated with Foundation JS files and saved to the `/scripts` directory. Sourcemaps will be created.
* Watches for changes in the `assets/images` directory. When a change is made the image files are optimized and saved over the original image.

### Watching for Changes with Browsersync
```bash
$ npm run browsersync
```
This will watch the same files as `npm run watch`, but utilizes browsersync for live reloading and style injection. Be sure to update the `URL` variable in the `gulpfile.js` to your local install URL. 

## Compile and Minify All Theme Assets
```bash
$ npm run build
```
Compiles and minifies all scripts and styles.

### Compile Specific Assets
* `$ npm run styles` - to compile all SCSS files in the `assets/styles/scss` directory.
* `$ npm run scripts` - to compile all JS files in the `assets/scripts/js` directory.
* `$ npm run images` - to optimize all image files in the `assets/images` directory.

## File Structure - "Where to Put Stuff"

### Custom Styles
* `style.css` - this file is never actually loaded, however, this is where you set your theme name and is required by WordPress
* `assets/styles/scss/style.scss` - import all of your styles here. If you create an additional SCSS file, be sure to import it here.
* `assets/styles/scss/_main.scss` - place all of your custom styles here.
* `assets/styles/scss/_settings.scss` - adjust Foundation style settings here.
* `assets/styles/scss/login.scss` - place custom login styles here. This will generate it's own stylesheet.
### Custom Scripts
* `assets/scripts/js/` - place your custom scripts here. Each .JS file will be compiled and concatenated when the build process is ran.

### Images
* `assets/images/` - place your theme images here. Each image will be optimized when the build process is ran.



#### Using WPCS
This theme comes with tools to check for WordPress Coding Standards. To enable this feature you'll first need to make sure  [Composer](https://getcomposer.org/) is installed. Then to install PHP Codesniffer and the WordPress Coding Standards set of "Sniffs", simply run:
```bash
$ composer create-project wp-coding-standards/wpcs:dev-master --no-dev
```
When prompted to remove existing VCS, answer Yes by typing `Y` if you are forking this project.

Once you have installed the packages, check the theme by running:
```bash
$ gulp phpcs
```

Code Sniffer can fix errors automatically! Simply run the following command to fix them:
```bash
$ gulp phpcbf
```