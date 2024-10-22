let mix = require('laravel-mix');
let glob = require('glob');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

mix.options({
    processCssUrls: false,
    clearConsole: true,
    terser: {
        extractComments: false,
    }
});

mix.disableNotifications();

// تنظیمات devServer
mix.webpackConfig({
    devServer: {
        port: 8081, // پورت جدید خود را اینجا تنظیم کنید
        host: 'localhost', // می‌توانید '0.0.0.0' نیز استفاده کنید
    },
    plugins: [
        new CleanWebpackPlugin({
            cleanOnceBeforeBuildPatterns: ['!js-validation.js'], // جلوگیری از حذف این فایل
        }),
    ]
});

// Run all webpack.mix.js in app
glob.sync('./platform/**/**/webpack.mix.js').forEach(item => require(item));

// Run only for a package, replace [package] by the name of package you want to compile assets
// require('./platform/packages/[package]/webpack.mix.js');

// Run only for a plugin, replace [plugin] by the name of plugin you want to compile assets
// require('./platform/plugins/[plugin]/webpack.mix.js');

// Run only for themes, you shouldn't modify below config, just uncomment if you want to compile only theme's assets
// glob.sync('./platform/themes/**/webpack.mix.js').forEach(item => require(item));
