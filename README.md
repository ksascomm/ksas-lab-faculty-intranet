For Kreiger-based faculty members, labs, or intranets. Has vertical navigation. Doesn't require majority of KSAS-specific plugins. Based off [JointsWP]( http://jointswp.com/), built with Foundation 6.

### Getting Started With Gulp
- Install [node.js](https://nodejs.org).
- Using the command line, navigate to your theme directory
- Run npm install
- Run gulp to confirm everything is working

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