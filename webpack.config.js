const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const SpriteLoaderPlugin = require("svg-sprite-loader/plugin");
const { WebpackManifestPlugin } = require("webpack-manifest-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");

const outputPath = "dist";
const localDomain = "dedes-multisite.local";

module.exports = (env, argv) => {
	const isProduction = argv.mode === "production";

	return {
		devtool: "source-map",
		entry: {
			main: path.resolve(__dirname, "src/main.js"),
			swiper: path.resolve(__dirname, "src/swiper.js"),
			sprite: path.resolve(__dirname, "src/sprite.js"),
			popup: path.resolve(__dirname, "src/js/popup.js"),
			woocommerce: path.resolve(__dirname, "src/js/woocommerce.js"),
		},
		output: {
			path: path.resolve(__dirname, outputPath),
			filename: isProduction ? "[name]/[name].[contenthash].js" : "[name]/[name].js",
			publicPath: "/" + outputPath,
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
			new CleanWebpackPlugin({
				cleanOnceBeforeBuildPatterns: [path.resolve(__dirname, outputPath, "*")],
			}),
			new SpriteLoaderPlugin(),
			new MiniCssExtractPlugin({
				filename: isProduction ? "[name]/[name].[contenthash].css" : "[name]/[name].css",
			}),
			new BrowserSyncPlugin(
				{
					proxy: localDomain,
					browser: "chrome",
					files: [outputPath + "/main/*.css", outputPath + "/main/*.js", "./**/*.php", "./*.php"],
					injectCss: true,
				},
				{ reload: false }
			),
			new WebpackManifestPlugin(),
		],
	};
};
