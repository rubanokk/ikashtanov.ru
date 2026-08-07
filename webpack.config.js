const path = require("path");
const webpack = require("webpack");
const BundleTracker = require("webpack-bundle-tracker");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
  context: __dirname,
  entry: "./assets/js/index",
  output: {
    path: path.resolve(__dirname, "assets/webpack_bundles/"),
    publicPath: "auto", // necessary for CDNs/S3/blob storages
    filename: "[name]-[contenthash].js",
  },
  plugins: [
    new BundleTracker({ path: __dirname, filename: "webpack-stats.json" }),
    new MiniCssExtractPlugin()
  ],
  module: {
    rules: [
      {
        test: /\.css$/i,
        use: [
          MiniCssExtractPlugin.loader, 
          "css-loader", 
          "@tailwindcss/webpack" // Processes Tailwind directly
        ],
      },
    ],
  },
};