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
    .pipe(gulp.dest('css/out/'));
});

gulp.task('sitemap', shell.task(
    'curl --silent --output sitemap.json http://localhost:8888/prosody/?show_sitemap'
));

gulp.task('uncss', ['sitemap'], function() {

    var sitemap = JSON.parse(fs.readFileSync('./sitemap.json'));

    gulp.src('css/*.css')
    .pipe(uncss({
        html: sitemap
    }))
    .pipe(gulp.dest('./css/out'));
});

gulp.task('watch', function() {
    gulp.watch('**/*.styl', ['stylus']);
});

gulp.task('default', ['stylus', 'watch']);
