// Grab our gulp packages
var gulp  = require('gulp'),
    gutil = require('gulp-util'),
    sass = require('gulp-sass'),
    cssnano = require('gulp-cssnano'),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps = require('gulp-sourcemaps'),
    jshint = require('gulp-jshint'),
    stylish = require('jshint-stylish'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    plumber = require('gulp-plumber'),
    bower = require('gulp-bower'),
    babel = require('gulp-babel'),
    browserSync = require('browser-sync').create();
    imageop = require('gulp-image-optimization');
    argv = require('yargs').argv;

var config = {
     sassPath: './resources/sass',
     bowerDir: './bower_components' 
}

var URL = 'pineapple.dev/';

// IF YOU UPDATE FOUNDATION VIA BOWER, RUN THIS TO SAVE UPDATED FILES TO /VENDOR
gulp.task('bower', function() {
  return bower({ cmd: 'update'})
    .pipe(gulp.dest('vendor/'))
});    

// Browser-Sync watch files and inject changes
gulp.task('browsersync', function() {
    // Watch files
    var files = [
      './assets/css/*.css', 
      './assets/js/*.js',
      '**/*.php',
      'assets/images/**/*.{png,jpg,gif,svg,webp}',
    ];

    browserSync.init(files, {
      // Replace with URL of your local site
      proxy: URL,
    });
    
    gulp.watch('./assets/scss/**/*.scss', ['styles']);
    gulp.watch('./assets/js/scripts/*.js', ['site-js']).on('change', browserSync.reload);

});

// Compile Sass, Autoprefix and minify
gulp.task('styles', function() {
    return gulp.src('./assets/scss/**/*.scss')
        .pipe(plumber(function(error) {
            gutil.log(gutil.colors.red(error.message));
            this.emit('end');
        }))
        .pipe(sourcemaps.init()) // Start Sourcemaps
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('./assets/css/'))
        .pipe(rename({suffix: '.min'}))
        .pipe(cssnano())
        .pipe(sourcemaps.write('.')) // Creates sourcemaps for minified styles
        .pipe(gulp.dest('./assets/css/'))
});

// Compile Fontawesome fonts, place in /fonts directory
gulp.task('icons', function() { 
    return gulp.src(config.bowerDir + '/font-awesome/fonts/**.*') 
        .pipe(gulp.dest('./assets/fonts')); 
});
    
// JSHint, concat, and minify JavaScript
gulp.task('site-js', function() {
  return gulp.src([ 
    
           // Grab your custom scripts
        './assets/js/scripts/*.js'
        
  ])
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'))
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest('./assets/js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(sourcemaps.write('.')) // Creates sourcemap for minified JS
    .pipe(gulp.dest('./assets/js'))
});   

// JSHint, concat, and minify Foundation JavaScript
gulp.task('foundation-js', function() {
  return gulp.src([	
  		  
  		  // Foundation core - needed if you want to use any of the components below
          './vendor/foundation-sites/js/foundation.core.js',
          './vendor/foundation-sites/js/foundation.util.*.js',
          
          // Pick the components you need in your project
          //'./vendor/foundation-sites/js/foundation.abide.js',
          './vendor/foundation-sites/js/foundation.accordion.js',
          './vendor/foundation-sites/js/foundation.accordionMenu.js',
          './vendor/foundation-sites/js/foundation.drilldown.js',
          './vendor/foundation-sites/js/foundation.dropdown.js',
          './vendor/foundation-sites/js/foundation.dropdownMenu.js',
          './vendor/foundation-sites/js/foundation.equalizer.js',
          './vendor/foundation-sites/js/foundation.interchange.js',
          //'./vendor/foundation-sites/js/foundation.magellan.js',
          './vendor/foundation-sites/js/foundation.offcanvas.js',
          './vendor/foundation-sites/js/foundation.orbit.js',
          './vendor/foundation-sites/js/foundation.responsiveMenu.js',
          //'./vendor/foundation-sites/js/foundation.responsiveToggle.js',
          //'./vendor/foundation-sites/js/foundation.reveal.js',
          //'./vendor/foundation-sites/js/foundation.slider.js',
          //'./vendor/foundation-sites/js/foundation.sticky.js',
          './vendor/foundation-sites/js/foundation.tabs.js',
          //'./vendor/foundation-sites/js/foundation.toggler.js',
          //'./vendor/foundation-sites/js/foundation.tooltip.js',
  ])
  .pipe(babel({
    presets: ['es2015'],
      compact: true
  }))
    .pipe(sourcemaps.init())
    .pipe(concat('foundation.js'))
    .pipe(gulp.dest('./assets/js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(sourcemaps.write('.')) // Creates sourcemap for minified Foundation JS
    .pipe(gulp.dest('./assets/js'))
});

gulp.task('images', function(cb) {
    gulp.src(['assets/images/**/*.png','assets/images/**/*.jpg','assets/images/**/*.gif','assets/images/**/*.jpeg']).pipe(imageop({
        optimizationLevel: 5,
        progressive: true,
        interlaced: true
    })).pipe(gulp.dest('assets/images')).on('end', cb).on('error', cb);
});

// Create a default task 
gulp.task('default', function() {
  gulp.start('styles', 'site-js', 'foundation-js', 'images', 'icons');
});

// Watch files for changes
gulp.task('watch', ['styles', 'browsersync', 'images', 'icons'], function() {

  function logFileChange(event) {
    var fileName = require('path').relative(__dirname, event.path);
    console.log('[' + 'WATCH'.green + '] ' + fileName.magenta + ' was ' + event.type + ', running tasks...');
  }

  // Watch .scss files
  gulp.watch('./assets/scss/**/*.scss', ['styles']) 
    .on('change', function(event) {
      logFileChange(event);
    });

  // Watch site-js files
  gulp.watch('./assets/js/scripts/*.js', ['site-js'])
    .on('change', function(event) {
      logFileChange(event);
    });
  
  // Watch foundation-js files
  gulp.watch('./vendor/foundation-sites/js/*.js', ['foundation-js']);

});