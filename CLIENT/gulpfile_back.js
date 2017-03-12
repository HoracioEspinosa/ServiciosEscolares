process.setMaxListeners(0);
const elixir = require('laravel-elixir');
require('laravel-elixir-vue-2');

var gulp = require('gulp');
var sass = require('gulp-sass');
var prettify = require('gulp-prettify');
var minifyCss = require("gulp-minify-css");
var rename = require("gulp-rename");
var uglify = require("gulp-uglify");
var rtlcss = require("gulp-rtlcss");
var connect = require('gulp-connect');

var EventEmitter = require('events');
require('./elixir-components');

const emitter = new EventEmitter()
emitter.setMaxListeners(100)
// or 0 to turn off the limit
//emitter.setMaxListeners(0)

elixir( function(mix)  {
    mix
        .sass('app.scss','public/css')
        .sass('cosa.scss', 'public/css')
        .sass('bootstrap.scss', 'public/css')

        .sass('global/plugins/select2/sass/select2-bootstrap.min.scss', 'public/global/plugins/select2/css')

        .sass('global/components.scss', 'public/global/css')
        .sass('global/components-md.scss', 'public/global/css')
        .sass('global/components-rounded.scss', 'public/global/css')
        .sass('global/plugins.scss', 'public/global/css')
        .sass('global/plugins-md.scss', 'public/global/css')

        .sass('apps/inbox.scss', 'public/apps/css')
        .sass('apps/ticket.scss', 'public/apps/css')
        .sass('apps/todo.scss', 'public/apps/css')
        .sass('apps/todo-2.scss', 'public/apps/css')

        .sass('pages/about.scss', 'public/pages/css')
        .sass('pages/blog.scss', 'public/pages/css')
        .sass('pages/coming-soon.scss', 'public/pages/css')
        .sass('pages/contact.scss', 'public/pages/css')
        .sass('pages/error.scss', 'public/pages/css')
        .sass('pages/faq.scss', 'public/pages/css')
        .sass('pages/image-crop.scss', 'public/pages/css')
        .sass('pages/invoice.scss', 'public/pages/css')
        .sass('pages/invoice-2.scss', 'public/pages/css')
        .sass('pages/lock.scss', 'public/pages/css')
        .sass('pages/login.scss', 'public/pages/css')
        .sass('pages/login-2.scss', 'public/pages/css')
        .sass('pages/login-3.scss', 'public/pages/css')
        .sass('pages/login-4.scss', 'public/pages/css')
        .sass('pages/login-5.scss', 'public/pages/css')
        .sass('pages/portfolio.scss', 'public/pages/css')
        .sass('pages/pricing.scss', 'public/pages/css')
        .sass('pages/profile.scss', 'public/pages/css')
        .sass('pages/profile-2.scss', 'public/pages/css')
        .sass('pages/search.scss', 'public/pages/css')
        .sass('pages/tasks.scss', 'public/pages/css')

        .sass('layouts/layout/custom.scss', 'public/layouts/layout/css')
        .sass('layouts/layout/layout.scss', 'public/layouts/layout/css')
        .sass('layouts/layout/themes/blue.scss', 'public/layouts/layout/css/themes')
        .sass('layouts/layout/themes/darkblue.scss', 'public/layouts/layout/css/themes')
        .sass('layouts/layout/themes/default.scss', 'public/layouts/layout/css/themes')
        .sass('layouts/layout/themes/grey.scss', 'public/layouts/layout/css/themes')
        .sass('layouts/layout/themes/light.scss', 'public/layouts/layout/css/themes')
        .sass('layouts/layout/themes/light-2.scss', 'public/layouts/layout/css/themes')

        .sass('layouts/layout2/custom.scss', 'public/layouts/layout2/css')
        .sass('layouts/layout2/layout.scss', 'public/layouts/layout2/css')
        .sass('layouts/layout2/themes/blue.scss', 'public/layouts/layout2/css/themes')
        .sass('layouts/layout2/themes/dark.scss', 'public/layouts/layout2/css/themes')
        .sass('layouts/layout2/themes/default.scss', 'public/layouts/layout2/css/themes')
        .sass('layouts/layout2/themes/grey.scss', 'public/layouts/layout2/css/themes')
        .sass('layouts/layout2/themes/light.scss', 'public/layouts/layout2/css/themes')

        .sass('layouts/layout3/custom.scss', 'public/layouts/layout3/css')
        .sass('layouts/layout3/layout.scss', 'public/layouts/layout3/css')
        .sass('layouts/layout3/themes/blue-hoki.scss', 'public/layouts/layout3/css/themes')
        .sass('layouts/layout3/themes/blue-steel.scss', 'public/layouts/layout3/css/themes')
        .sass('layouts/layout3/themes/default.scss', 'public/layouts/layout3/css/themes')
        .sass('layouts/layout3/themes/green-haze.scss', 'public/layouts/layout3/css/themes')
        .sass('layouts/layout3/themes/purple-plum.scss', 'public/layouts/layout3/css/themes')
        .sass('layouts/layout3/themes/purple-studio.scss', 'public/layouts/layout3/css/themes')
        .sass('layouts/layout3/themes/red-intense.scss', 'public/layouts/layout3/css/themes')
        .sass('layouts/layout3/themes/red-sunglo.scss', 'public/layouts/layout3/css/themes')
        .sass('layouts/layout3/themes/yellow-crusuta.scss', 'public/layouts/layout3/css/themes')
        .sass('layouts/layout3/themes/yellow-orange.scss', 'public/layouts/layout3/css/themes')

        .sass('layouts/layout4/custom.scss', 'public/layouts/layout4/css')
        .sass('layouts/layout4/layout.scss', 'public/layouts/layout4/css')
        .sass('layouts/layout4/themes/base.scss', 'public/layouts/layout4/css/themes')
        .sass('layouts/layout4/themes/default.scss', 'public/layouts/layout4/css/themes')
        .sass('layouts/layout4/themes/light.scss', 'public/layouts/layout4/css/themes')

        .sass('layouts/layout5/custom.scss', 'public/layouts/layout5/css')
        .sass('layouts/layout5/layout.scss', 'public/layouts/layout5/css')

        .sass('layouts/layout6/custom.scss', 'public/layouts/layout6/css')
        .sass('layouts/layout6/layout.scss', 'public/layouts/layout6/css')

        .sass('layouts/layout7/custom.scss', 'public/layouts/layout7/css')
        .sass('layouts/layout7/layout.scss', 'public/layouts/layout7/css')

        .webpack('app.js');
});

gulp.task('localhost', function() {
    connect.server();
});

gulp.task('localhost-live', function() {
    connect.server({
        livereload: true
    });
});

gulp.task('layouts', function () {
    elixir.generate;
});