const mix = require('laravel-mix');


mix.styles([
    'resources/admin/plugins/fontawesome-free/css/all.min.css',
    'resources/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
    'resources/admin/dist/css/adminlte.min.css',
    'resources/admin/plugins/select2/css/select2.min.css'
], 'public/css/admin.css');

mix.scripts([
    'resources/admin/plugins/jquery/jquery.min.js',
    'resources/admin/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'resources/admin/plugins/select2/js/select2.full.min.js',
    'resources/admin/dist/js/adminlte.js'
], 'public/js/admin.js');

mix.copy('resources/admin/dist/img', 'public/images');
mix.copy('resources/admin/plugins/fontawesome-free/webfonts', 'public/webfonts');

mix.styles([
    'resources/admin/plugins/fontawesome-free/css/all.min.css',
    'resources/admin/dist/css/adminlte.css',
], 'public/css/front.css');

mix.scripts([
    'resources/admin/plugins/jquery/jquery.min.js',
    'resources/admin/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'resources/admin/dist/js/adminlte.js'
], 'public/js/front.js');
