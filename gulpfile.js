var gulp = require('gulp'),
      stylus = require('gulp-stylus'),
      autoprefixer = require('autoprefixer-stylus'),
      gutil = require('gulp-util');
      uncss = require('gulp-uncss');
      shell = require('gulp-shell');
      fs = require('fs');


gulp.task('stylus', function() {
    gulp.src('css/*.styl')
    .pipe(stylus({
        use: [autoprefixer()]
    }))
    .pipe(gulp.dest('css/'));
});

gulp.task('sitemap', shell.task(
    'curl --silent --output sitemap.json http://localhost:8888/prosody/?show_sitemap'
));

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
