const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const SpriteLoaderPlugin = require("svg-sprite-loader/plugin");

const outputPath = "dist";
const localDomain = "http://sala-dining.multisite.local/";

module.exports = {
  devtool: "source-map",
  entry: {
    main: path.resolve(__dirname, "src/main.js"),
    swiper: path.resolve(__dirname, "src/swiper.js"),
    sprite: path.resolve(__dirname, "src/sprite.js"),
  },
  output: {
    path: path.resolve(__dirname, outputPath),
    filename: "[name]/[name].js",
  },
  externals: {
    jquery: "jQuery",
  },
  module: {
    rules: [
      {
        test: /\.svg$/,
        loader: "svg-sprite-loader",
        exclude: /node_modules/,
        options: {
          extract: true,
          spriteFilename: "sprite/sprite.svg",
        },
      },
      {
        test: /\.scss$/i,
        exclude: /node_modules/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: "css-loader",
            options: {
              url: false,
              sourceMap: true,
            },
          },
          "postcss-loader",
          {
            loader: "sass-loader",
            options: {
              sourceMap: true,
            },
          },
        ],
      },
      {
        test: /\.css$/,
        exclude: /node_modules/,
        use: ["postcss-loader"],
      },
    ],
  },
  plugins: [
    new SpriteLoaderPlugin(),
    new MiniCssExtractPlugin({
      filename: "[name]/[name].css",
    }),
    new BrowserSyncPlugin(
      {
        proxy: localDomain,
        browser: "chrome",
        files: [
          outputPath + "/main/*.css",
          outputPath + "/main/*.js",
          "./**/*.php",
          "./*.php",
        ],
        injectCss: true,
      },
      { reload: false }
    ),
  ],
};
