var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var rename = require('gulp-rename');
var ngAnnotate = require('gulp-ng-annotate');
var bundle = require('gulp-bundle-assets');
var sequence = require('gulp-sequence');
var notify = require('gulp-notify');
var babel = require("gulp-babel");
var concat = require("gulp-concat");

/**
* Paths
*/
var src =  {
    dist: 'dist/',
    scripts: {
      all: ['assets/js/**/*.js'],
      in: 'assets/js/app.js',
      out: 'app.min.js',
    },
    styles: {
      all: 'assets/**/*.scss',
      in: 'assets/style/base.scss',
      out: 'app.min.css'
    },
};

var errorHandler = function() {
  var args = Array.prototype.slice.call(arguments);

  // Send error to notification center with gulp-notify
  notify.onError({
    title: 'Compile Error',
    message: '<%= error %>'
  }).apply(this, args);

  // Keep gulp from hanging on this task
  this.emit('end');
};


// SASS
gulp.task('sass', function() {
  gulp.src(src.styles.in)
    .pipe(sourcemaps.init())
    .pipe(sass.sync({outputStyle: 'compressed'}).on('error', sass.logError))
    .on('error', errorHandler)
    .pipe(autoprefixer({ browsers: ['last 2 versions'] }))
    .on('error', errorHandler)
    .pipe(sourcemaps.write())
    .on('error', errorHandler)
    .pipe(rename(src.styles.out))
    .pipe(gulp.dest(src.dist))
});

// JS
gulp.task('scripts', function() {

  return gulp.src(src.scripts.all)
    .pipe(sourcemaps.init())
    .pipe(babel())
    .pipe(ngAnnotate()).on('error', errorHandler)
    .pipe(concat(src.scripts.out))
    .pipe(sourcemaps.write('./', {
      includeContent: true
    })).on('error', errorHandler)
    .pipe(gulp.dest(src.dist))
});

gulp.task('bundle', function() {
  return gulp.src('./bundle.config.js')
    .pipe(bundle())
    .on('error', errorHandler)
    .pipe(gulp.dest(src.dist))
});

// WATCH
gulp.task('watch', function() {
  gulp.watch(src.scripts.all, ['scripts']);
  gulp.watch(src.styles.all, ['sass']);
});

gulp.task('build', function(cb) {
  sequence('bundle', 'sass', 'scripts', cb);
});

gulp.task('default', ['build', 'watch']);
