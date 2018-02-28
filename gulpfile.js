var gulp = require('gulp');
var sass = require('gulp-ruby-sass');
var sourcemaps = require('gulp-sourcemaps');
//var concat = require('gulp-concat');
var cssmin = require('gulp-cssmin');
var jsmin = require('gulp-jsmin');
var rename = require('gulp-rename');
var browserSync = require('browser-sync').create();

gulp.task('serve', ['styles-pac'], function() {
    
    browserSync.init({
        server: "./resources/views/**/index.blade.php"
    });

    gulp.watch('resources/assets/sass/**/*.scss', ['styles-pac']);
    gulp.watch('resources/assets/js/**/*.js', ['js-pac']);
    gulp.watch("resources/views/**/index.blade.php").on('change', browserSync.reload);
});

gulp.task('js-pac', () => {	
	gulp.src('resources/assets/js/**/*.js', {sourcemap: true})
    // for inline sourcemaps 
    .pipe(sourcemaps.write())
    //.pipe(autoprefixer())
    .pipe(jsmin())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('public/js/'))
    .pipe(browserSync.stream())
});

gulp.task('styles-pac', () => 
    sass('resources/assets/sass/**/*.scss', {sourcemap: true})
    .on('error', sass.logError)
    // for inline sourcemaps 
    .pipe(sourcemaps.write())
    //.pipe(autoprefixer())
    .pipe(cssmin())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('public/css/'))
    .pipe(browserSync.stream())
);
 
gulp.task('default', ['serve']);