var Encore = require('@symfony/webpack-encore');

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It's useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    // directory where compiled assets will be stored
    .setOutputPath('../assets/')
    // public path used by the web server to access the output path
    .setPublicPath('/')

    .configureLoaderRule('fonts', loaderRule => {
        loaderRule.options.publicPath = '../';
    })
    .configureLoaderRule('images', loaderRule => {
        loaderRule.options.publicPath = './';
    })

    .addEntry('js/app', './app.js')
    .addStyleEntry('css/app', './scss/app.scss')
    .addStyleEntry('css/admin-common', './scss/admin.scss')

    .disableSingleRuntimeChunk()

    /*
     * FEATURE CONFIG
     *
     * Enable & configure other features below. For a full
     * list of features, see:
     * https://symfony.com/doc/current/frontend.html#adding-more-features
     */
    // .cleanupOutputBeforeBuild()

    // enables @babel/preset-env polyfills
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = 3;
    })

    .enableSassLoader()
    .autoProvideVariables({
        $: 'jquery',
        jQuery: 'jquery',
        'window.jQuery': 'jquery',
    })
;

module.exports = Encore.getWebpackConfig();
