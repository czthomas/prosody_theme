var gulp = require('gulp'),
      stylus = require('gulp-stylus'),
      autoprefixer = require('autoprefixer-stylus'),
      gutil = require('gulp-util');
      uncss = require('gulp-uncss');


gulp.task('stylus', function() {
    gulp.src('css/*.styl')
    .pipe(stylus({
        use: [autoprefixer()]
    }))
    .pipe(gulp.dest('css/'));
});

gulp.task('uncss', function() {
    gulp.src('css/screen.css')
    .pipe(uncss({
        html: ['*.html']
    }))
    .pipe(gulp.dest('./out'));
});

gulp.task('watch', function() {
    gulp.watch('**/*.styl', ['stylus']);
});

gulp.task('default', ['stylus', 'watch']);
