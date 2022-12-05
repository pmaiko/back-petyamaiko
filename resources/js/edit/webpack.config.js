const { VueLoaderPlugin } = require("vue-loader");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const path = require("path");

const isProduction = process.argv[process.argv.indexOf('--mode') + 1] === 'production';

module.exports = {
  watch: true,
  entry: {
    main: "./index.js",
  },
  output: {
    filename: isProduction ? "[name].[contenthash:8].js" : 'index.js',
    path: path.resolve('../../../public/js', "edit")
  },
  module: {
    rules: [
      {
        test: /\.vue$/,
        loader: "vue-loader",
      }
    ],
  },
  plugins: [
    new VueLoaderPlugin(),
    new CleanWebpackPlugin()
  ]
};