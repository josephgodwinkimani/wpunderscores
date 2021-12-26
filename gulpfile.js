var gulp        = require('gulp');
var plumber = require('gulp-plumber');
var browserSync = require('browser-sync').create();
var sass        = require('gulp-sass');
var reload      = browserSync.reload;
var watch = require('gulp-watch');
var notify = require('gulp-notify');
var logger = require('gulplog');

var sassPaths = [
  'node_modules/materialize-css/sass/',
  'sass'
];

var browserSyncWatchFiles = [
    './css/*.css',
    './js/*.js',
    './**/*.php',
    './style.css'
];

var browserSyncOptions = {
    proxy: "localhost/wpfoundation/", // add your site url here to see css changes
    notify: false,
    port: 80, // quote this out to use default port 3000
    // logPrefix: "werko" // change to show own project name
    logFileChanges: true,
    injectChanges: true
};


gulp.task('main_sass', function() {
   var stream = gulp.src('sass/style.scss')
        .pipe(plumber({
            errorHandler: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(sass())
        .pipe(gulp.dest('./css'))
        .pipe(notify("style.scss complied to css folder!"))
      return stream;
});

gulp.task('custom_sass', function() {
   var stream = gulp.src('sass/theme.scss')
        .pipe(plumber({
            errorHandler: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(sass())
        .pipe(gulp.dest('./css'))
        .pipe(notify("theme.scss complied to css folder!"));
      return stream;
});

gulp.task('copy', function() {
  gulp.src('node_modules/materialize-css/dist/css/*.min.css')
    .pipe(gulp.dest('./css/'))
    .pipe(notify("copy materialize CSS"));
   gulp.src('node_modules/material-design-icons/iconfont/material-icons.css')
    .pipe(gulp.dest('./css/'))
    .pipe(notify("copy materialize-icons CSS"));
  gulp.src('node_modules/material-design-icons/iconfont/MaterialIcons-Regular.eot')
    .pipe(gulp.dest('./font/'));
  gulp.src('node_modules/material-design-icons/iconfont/MaterialIcons-Regular.woff')
    .pipe(gulp.dest('./font/'));
  gulp.src('node_modules/material-design-icons/iconfont/MaterialIcons-Regular.ttf')
    .pipe(gulp.dest('./font/'));
  gulp.src('node_modules/material-design-icons/iconfont/MaterialIcons-Regular.woff2')
    .pipe(gulp.dest('./font/'))
    .pipe(notify("copy material-icons FONTS"));
  gulp.src('node_modules/materialize-css/dist/js/*.js')
    .pipe(gulp.dest('./js/'))
    .pipe(notify("copy materialize JS"));
  gulp.src('node_modules/materialize-css/dist/fonts/roboto/*.woff')
    .pipe(gulp.dest('./font/vendor/'));
  gulp.src('node_modules/materialize-css/dist/fonts/roboto/*.woff2')
    .pipe(gulp.dest('./font/vendor/'))
    .pipe(notify("copy roboto FONT"));
});

gulp.task('watch', function() {
    browserSync.init(browserSyncWatchFiles, browserSyncOptions);
    notify("SASS & PHP file changed.").write('');
    logger.info('browser reloaded successfully.');
});


gulp.task('default', ['main_sass', 'custom_sass', 'copy', 'watch'], function() { // add 'zurb-sass' if you are using custom foundation css
  gulp.watch('scss/**/*.scss', ['main_sass'], ['custom_sass']);
});
