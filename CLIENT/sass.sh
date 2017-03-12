#!/usr/bin/env bash
sass --watch resources/assets/sass/modules/:public/css/modules/ --style=compressed &
sass --watch resources/assets/sass/pages/:public/pages/ --style=compressed &
sass --watch resources/assets/sass/layouts/:public/layouts/ --style=compressed &
sass --watch resources/assets/sass/app.scss:public/css/app.css --style=compressed