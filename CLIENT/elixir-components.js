/**
 * Created by dar5_ on 09/12/2016.
 */
var Elixir = require('laravel-elixir');
var shell = require('gulp-shell');
var Task = Elixir.Task;

Elixir.extend('speak', function(message) {
    new Task('speak', function() {
        return gulp.src('').pipe(shell("echo " + message));
    });
});

Elixir.extend('generate', function () {
    new Task('generate', function () {
        Elixir(function (mix) {
            mix
                .sass('layouts/layout2/custom.scss', 'public/layouts/layout2/css')
                .sass('layouts/layout2/layout.scss', 'public/layouts/layout2/css')
                .sass('layouts/layout2/themes/blue.scss', 'public/layouts/layout2/css/themes')
                .sass('layouts/layout2/themes/dark.scss', 'public/layouts/layout2/css/themes')
                .sass('layouts/layout2/themes/default.scss', 'public/layouts/layout2/css/themes')
                .sass('layouts/layout2/themes/grey.scss', 'public/layouts/layout2/css/themes')
                .sass('layouts/layout2/themes/light.scss', 'public/layouts/layout2/css/themes')
        });
    });
});