var Encore = require('@symfony/webpack-encore');
var BrowserSyncPlugin = require('browser-sync-webpack-plugin');
var path = require('path');

Encore
    .disableSingleRuntimeChunk()
    // directory where all compiled assets will be stored
    .setOutputPath('../../../public/layout/')

    // what's the public path to this directory (relative to your project's document root dir)
    .setPublicPath('../../../layout')

    // removes the /layout prefix from assets paths
    .setManifestKeyPrefix('')

    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // will output as web/layout/app.js
    .addEntry('app', './../../../layout/scripts/app.js')

    // will output as web/layout/global.css
    //.addStyleEntry('global', './layout/styles/global.scss')

    // will require minified scripts without packing them
    .addLoader({
        test: /\.min\.js$/,
        use: [ 'script-loader' ]
    })

    // optimize and minify images
    .addLoader({
        test: /\.(gif|png|jpe?g|svg)$/i,
        use: [ 'image-webpack-loader' ]
    })

    // allow sass/scss files to be processed
    .enableSassLoader()

    // optimize css files
    .enablePostCssLoader()

    // allow legacy applications to use $/jQuery as a global variable
    //.autoProvidejQuery()

    .enableSourceMaps(!Encore.isProduction())

    // create hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    .addPlugin(new BrowserSyncPlugin({
        host: 'https://'+path.basename(path.normalize(path.dirname(__filename)+'./../../../'))+'.test',
        proxy: 'https://'+path.basename(path.normalize(path.dirname(__filename)+'./../../../'))+'.test',
        files:[
            {
                match: ['../../../public/layout/**/*.js', '../../..public/layout/**/*.css'],
                    fn: function (event, file) {
                    if (event === 'change') {
                        const bs = require('browser-sync').get('bs-webpack-plugin');
                        bs.reload();
                    }
                }
            }
        ]
    }))
;

// export the final configuration
module.exports = Encore.getWebpackConfig();