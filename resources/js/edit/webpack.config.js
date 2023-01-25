const { VueLoaderPlugin } = require("vue-loader");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
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
      },
      {
        test: /\.s?css$/,
        use: [
          "style-loader",
          "css-loader",
          {
            loader: "postcss-loader"
          }
        ],
      },
    ],
  },
  plugins: [
    new VueLoaderPlugin(),
    new CleanWebpackPlugin(),
    new MiniCssExtractPlugin({
      filename: "[name].[contenthash:8].css",
      chunkFilename: "[name].[contenthash:8].css",
    }),
  ]
};