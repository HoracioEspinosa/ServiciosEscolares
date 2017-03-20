'use strict';

// sass compile
var gulp = require('gulp');
var sass = require('gulp-sass');
var prettify = require('gulp-prettify');
var minifyCss = require("gulp-minify-css");
var rename = require("gulp-rename");
var uglify = require("gulp-uglify");
var rtlcss = require("gulp-rtlcss");
var connect = require('gulp-connect');
//*** Localhost server tast
gulp.task('localhost', function() {
    connect.server();
});

gulp.task('localhost-live', function() {
    connect.server({
        livereload: true
    });
});

//*** SASS compiler task
gulp.task('sass', function () {
    //Modules compilation
    gulp.src('./resources/assets/sass/*.scss').pipe(sass()).pipe(gulp.dest('./public/css/'));
    gulp.src('./resources/assets/sass/modules/**/*.scss').pipe(sass()).pipe(gulp.dest('./public/css/modules/'));

    // bootstrap compilation
    gulp.src('./resources/assets/sass/bootstrap.scss').pipe(sass()).pipe(gulp.dest('./resources/assets/sass/global/plugins/bootstrap/css/'));

    // select2 compilation using bootstrap variables
    gulp.src('./resources/assets/sass/global/plugins/select2/sass/select2-bootstrap.min.scss').pipe(sass({outputStyle: 'compressed'})).pipe(gulp.dest('./resources/assets/sass/global/plugins/select2/css/'));

    // global theme stylesheet compilation
    gulp.src('./resources/assets/sass/global/*.scss').pipe(sass()).pipe(gulp.dest('./public/global/css'));
    gulp.src('./resources/assets/sass/apps/*.scss').pipe(sass()).pipe(gulp.dest('./public/apps/css'));
    gulp.src('./resources/assets/sass/pages/*.scss').pipe(sass()).pipe(gulp.dest('./public/pages/css'));

    // theme layouts compilation
    gulp.src('./resources/assets/sass/layouts/layout/*.scss').pipe(sass()).pipe(gulp.dest('./public/layouts/layout/css'));
    gulp.src('./resources/assets/sass/layouts/layout/themes/*.scss').pipe(sass()).pipe(gulp.dest('./public/layouts/layout/css/themes'));

    gulp.src('./resources/assets/sass/layouts/layout2/*.scss').pipe(sass()).pipe(gulp.dest('./public/layouts/layout2/css'));
    gulp.src('./resources/assets/sass/layouts/layout2/themes/*.scss').pipe(sass()).pipe(gulp.dest('./public/layouts/layout2/css/themes'));

    gulp.src('./resources/assets/sass/layouts/layout3/*.scss').pipe(sass()).pipe(gulp.dest('./public/layouts/layout3/css'));
    gulp.src('./resources/assets/sass/layouts/layout3/themes/*.scss').pipe(sass()).pipe(gulp.dest('./public/layouts/layout3/css/themes'));

    gulp.src('./resources/assets/sass/layouts/layout4/*.scss').pipe(sass()).pipe(gulp.dest('./public/layouts/layout4/css'));
    gulp.src('./resources/assets/sass/layouts/layout4/themes/*.scss').pipe(sass()).pipe(gulp.dest('./public/layouts/layout4/css/themes'));

    gulp.src('./resources/assets/sass/layouts/layout5/*.scss').pipe(sass()).pipe(gulp.dest('./public/layouts/layout5/css'));

    gulp.src('./resources/assets/sass/layouts/layout6/*.scss').pipe(sass()).pipe(gulp.dest('./public/layouts/layout6/css'));

    gulp.src('./resources/assets/sass/layouts/layout7/*.scss').pipe(sass()).pipe(gulp.dest('./public/layouts/layout7/css'));
});

//*** CSS & JS minify task
gulp.task('minify', function () {
    //Modules compilation
    gulp.src(['./public/css/*.css', '!./public/css/*.min.css']).pipe(minifyCss()).pipe(rename({suffix: '.min'})).pipe(gulp.dest('./public/css/'));
    gulp.src(['./public/css/modules/*.css', '!./public/css/modules/*.min.css']).pipe(minifyCss()).pipe(rename({suffix: '.min'})).pipe(gulp.dest('./public/css/modules/'));
    gulp.src(['./public/css/modules/users/*.css', '!./public/css/modules/users/*.min.css']).pipe(minifyCss()).pipe(rename({suffix: '.min'})).pipe(gulp.dest('./public/css/modules/users/'));
    gulp.src(['./public/css/modules/calificaciones/*.css', '!./public/css/modules/calificaciones/*.min.css']).pipe(minifyCss()).pipe(rename({suffix: '.min'})).pipe(gulp.dest('./public/css/modules/calificaciones/'));
    gulp.src(['./public/global/css/*.css', '!./public/global/css/**/*.min.css']).pipe(minifyCss()).pipe(rename({suffix: '.min'})).pipe(gulp.dest('./public/global/css/'));

    // css minify
    gulp.src(['./public/apps/css/*.css', '!./public/apps/css/*.min.css']).pipe(minifyCss()).pipe(rename({suffix: '.min'})).pipe(gulp.dest('./public/apps/css/'));

    gulp.src(['./resources/assets/sass/global/css/*.css','!./resources/assets/sass/global/css/*.min.css']).pipe(minifyCss()).pipe(rename({suffix: '.min'})).pipe(gulp.dest('./resources/assets/sass/global/css/'));
    gulp.src(['./resources/assets/sass/pages/css/*.css','!./resources/assets/sass/pages/css/*.min.css']).pipe(minifyCss()).pipe(rename({suffix: '.min'})).pipe(gulp.dest('./resources/assets/sass/pages/css/'));

    gulp.src(['./public/layouts/**/css/*.css','!./public/layouts/**/css/*.min.css']).pipe(rename({suffix: '.min'})).pipe(minifyCss()).pipe(gulp.dest('./public/layouts/'));
    gulp.src(['./public/layouts/**/css/**/*.css','!./public/layouts/**/css/**/*.min.css']).pipe(rename({suffix: '.min'})).pipe(minifyCss()).pipe(gulp.dest('./public/layouts/'));

    gulp.src(['./resources/assets/sass/global/plugins/bootstrap/css/*.css','!./resources/assets/sass/global/plugins/bootstrap/css/*.min.css']).pipe(minifyCss()).pipe(rename({suffix: '.min'})).pipe(gulp.dest('./resources/assets/sass/global/plugins/bootstrap/css/'));

    //js minify
    gulp.src(['./resources/assets/sass/apps/scripts/*.js','!./resources/assets/sass/apps/scripts/*.min.js']).pipe(uglify()).pipe(rename({suffix: '.min'})).pipe(gulp.dest('./resources/assets/sass/apps/scripts/'));
    gulp.src(['./resources/assets/sass/global/scripts/*.js','!./resources/assets/sass/global/scripts/*.min.js']).pipe(uglify()).pipe(rename({suffix: '.min'})).pipe(gulp.dest('./resources/assets/sass/global/scripts'));
    gulp.src(['./resources/assets/sass/pages/scripts/*.js','!./resources/assets/sass/pages/scripts/*.min.js']).pipe(uglify()).pipe(rename({suffix: '.min'})).pipe(gulp.dest('./resources/assets/sass/pages/scripts'));
    gulp.src(['./public/layouts/**/scripts/*.js','!./public/layouts/**/scripts/*.min.js']).pipe(uglify()).pipe(rename({suffix: '.min'})).pipe(gulp.dest('./public/layouts/'));
});

//*** SASS watch(realtime) compiler task
gulp.task('sass:watch', function () {
    gulp.watch('./resources/assets/sass/**/*.scss', ['sass', 'minify']);
});


//*** RTL convertor task
gulp.task('rtlcss', function () {

    gulp
        .src(['./resources/assets/sass/apps/css/*.css', '!./resources/assets/sass/apps/css/*-rtl.min.css', '!./resources/assets/sass/apps/css/*-rtl.css', '!./resources/assets/sass/apps/css/*.min.css'])
        .pipe(rtlcss())
        .pipe(rename({suffix: '-rtl'}))
        .pipe(gulp.dest('./resources/assets/sass/apps/css'));

    gulp
        .src(['./resources/assets/sass/pages/css/*.css', '!./resources/assets/sass/pages/css/*-rtl.min.css', '!./resources/assets/sass/pages/css/*-rtl.css', '!./resources/assets/sass/pages/css/*.min.css'])
        .pipe(rtlcss())
        .pipe(rename({suffix: '-rtl'}))
        .pipe(gulp.dest('./resources/assets/sass/pages/css'));

    gulp
        .src(['./resources/assets/sass/global/css/*.css', '!./resources/assets/sass/global/css/*-rtl.min.css', '!./resources/assets/sass/global/css/*-rtl.css', '!./resources/assets/sass/global/css/*.min.css'])
        .pipe(rtlcss())
        .pipe(rename({suffix: '-rtl'}))
        .pipe(gulp.dest('./resources/assets/sass/global/css'));

    gulp
        .src(['./public/layouts/**/css/*.css', '!./public/layouts/**/css/*-rtl.css', '!./public/layouts/**/css/*-rtl.min.css', '!./public/layouts/**/css/*.min.css'])
        .pipe(rtlcss())
        .pipe(rename({suffix: '-rtl'}))
        .pipe(gulp.dest('./resources/assets/sass/layouts'));

    gulp
        .src(['./public/layouts/**/css/**/*.css', '!./public/layouts/**/css/**/*-rtl.css', '!./public/layouts/**/css/**/*-rtl.min.css', '!./public/layouts/**/css/**/*.min.css'])
        .pipe(rtlcss())
        .pipe(rename({suffix: '-rtl'}))
        .pipe(gulp.dest('./resources/assets/sass/layouts'));

    gulp
        .src(['./resources/assets/sass/global/plugins/bootstrap/css/*.css', '!./resources/assets/sass/global/plugins/bootstrap/css/*-rtl.css', '!./resources/assets/sass/global/plugins/bootstrap/css/*.min.css'])
        .pipe(rtlcss())
        .pipe(rename({suffix: '-rtl'}))
        .pipe(gulp.dest('./resources/assets/sass/global/plugins/bootstrap/css'));
});

//*** HTML formatter task
gulp.task('prettify', function() {

    gulp.src('./**/*.html').
    pipe(prettify({
        indent_size: 4,
        indent_inner_html: true,
        unformatted: ['pre', 'code']
    })).
    pipe(gulp.dest('./'));
});