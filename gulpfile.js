var gulp = require('gulp'),
      stylus = require('gulp-stylus'),
      autoprefixer = require('autoprefixer-stylus'),
      gutil = require('gulp-util');


gulp.task('stylus', function() {
    gulp.src('css/*.styl')
    .pipe(stylus({
        use: [autoprefixer()]
    }))
    .pipe(gulp.dest('css/'));
});

gulp.task('watch', function() {
    gulp.watch('**/*.styl', ['stylus']);
});

gulp.task('default', ['stylus', 'watch']);
