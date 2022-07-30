var webpack = require("webpack");
var ExtractTextPlugin = require("extract-text-webpack-plugin");
var AssetsPlugin = require("assets-webpack-plugin");

var __DEV__ = JSON.parse(process.env.BUILD_DEV || "false");

module.exports = {

    entry: {
        main: ["./assets/src/main.js"],
    },

    output: {
        path: "./assets/js",
        publicPath: "/assets/",
        filename: '[name].js',
    },

    module: {
        loaders: [
            {
                test: /\.js$/,
                loader: 'babel-loader',
                query: {
                    presets: ['es2015']
                }
            }
        ]
    },

    resolve: {
        extensions: ["", ".js", ".jsx", ".json"]
    },

    plugins: [
        new webpack.DefinePlugin({
            __DEV__: JSON.stringify(__DEV__),
            'process.env.NODE_ENV': __DEV__ ? '"development"' : '"production"'
        }),
        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery",
            'window.jQuery': 'jquery'
        }),
        new webpack.ContextReplacementPlugin(/moment[\/\\]locale$/, /cs/),
        new ExtractTextPlugin(__DEV__ ? "[name].css" : "[name]-[hash].css"),
        new AssetsPlugin({path: __dirname + "/assets"})
    ]
};
