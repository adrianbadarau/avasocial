var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.less([
    'bootstrap.less',
    '../../../node_modules/font-awesome/less/font-awesome.less',
    'core.less',
    'components.less',
    'colors.less'
    ], 'resources/assets/css');

    mix.styles('*.css', 'public/css/app.css');

    mix.scripts(
      [
          '../../../node_modules/jquery/dist/jquery.min.js',
          '../../../node_modules/bootstrap-less/js/bootstrap.min.js',
          'plugins/ui/drilldown.js',
          'plugins/forms/styling/switchery.min.js',
          'plugins/forms/inputs/autosize.min.js',
          'plugins/forms/tags/tagsinput.min.js',
          'core/app.js',
          'custom.js'
      ],
      'public/js/app.js');
});