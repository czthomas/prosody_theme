var gulp = require('gulp'),
      stylus = require('gulp-stylus'),
      jeet = require('jeet'),
      autoprefixer = require('autoprefixer-stylus'),
      rupture = require('rupture'),
      gutil = require('gulp-util');


gulp.task('stylus', function() {
    gulp.src('css/*.styl')
    .pipe(stylus({
        use: [jeet(), rupture(), autoprefixer()]
    }))
    .pipe(gulp.dest('css/'));
});

gulp.task('watch', function() {
    gulp.watch('css/*.styl', ['stylus']);
});

gulp.task('default', ['watch']);
