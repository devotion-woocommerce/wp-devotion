/* File: gulpfile.js */

// grab our gulp packages
var gulp  = require('gulp'),
    gutil = require('gulp-util'),
    sass = require('gulp-sass'),
    ftp = require( 'vinyl-ftp' ),
    secrets = require('./secrets.json');

gulp.task( 'deploy', function () {

  gulp.src('./sass/style.scss')
  .pipe(sass().on('error', sass.logError))
  .pipe(gulp.dest('./'));

    var conn = ftp.create( {
        host:     secrets.servers.development.serverhost,
        user:     secrets.servers.development.username,
        password: secrets.servers.development.password,
        parallel: 10,
        log:      gutil.log
    } );

    var globs = [
        './inc/**',
        './js/**',
        './languages/**',
        './layouts/**',
        './sass/**',
        './images/**',
        './template-parts/**',
        '*.php',
        '*.css',
        '*.png'
    ];

    // using base = '.' will transfer everything to /public_html correctly
    // turn off buffering in gulp.src for best performance

    return gulp.src( globs, { base: '.', buffer: false } )
        .pipe( conn.newer( secrets.servers.development.remotepath ) ) // only upload newer files
        .pipe( conn.dest( secrets.servers.development.remotepath ) );

} );

gulp.task('default', function() {
  gulp.watch('./**', ['deploy']);
});
