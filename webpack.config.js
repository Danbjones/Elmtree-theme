require('dotenv').config();

const path = require('path');

const chokidar = require('chokidar');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

const isDevelopment = process.env.NODE_ENV === 'development';

const pluginOptions = isDevelopment
? [
	new CleanWebpackPlugin({
		cleanOnceBeforeBuildPatterns: [path.resolve(__dirname, 'dist')],
	})
	]
: [
	new CleanWebpackPlugin({
		cleanOnceBeforeBuildPatterns: [path.resolve(__dirname, 'dist')],
	}),
	new MiniCssExtractPlugin({
		filename: 'css/[name].css',
	})
	];

module.exports = {
	entry: path.resolve(__dirname, 'src', 'js', 'index.ts'),
	output: {
		filename: 'js/bundle.js',
		path: path.resolve(__dirname, 'dist'),
	},
	resolve: {
		extensions: ['.tsx', '.ts', '.jsx', '.js'],
	},
	target: isDevelopment ? 'web' : 'browserslist',
	plugins: pluginOptions,
	devtool: isDevelopment ? 'eval-source-map' : 'source-map',
	mode: process.env.NODE_ENV,
	devServer: {
		before: (_app, server) => {
 			chokidar.watch(['**/*.php']).on('all', function () {
			server.sockWrite(server.sockets, 'content-changed');
		});
 		},
 		writeToDisk: filePath => {
 			return /spritemap\.svg$/.test(filePath);
 		},
 		contentBase: './dist',
 		publicPath: '/',
 		headers: {
 			'Access-Control-Allow-Origin': '*',
 			'Access-Control-Allow-Methods': 'GET, POST, PUT, DELETE, PATCH, OPTIONS',
 			'Access-Control-Allow-Headers': 'X-Requested-With, content-type, Authorization',
 		},
 		hot: true,
 		host: process.env.DEV_HOST || 'localhost',
 		open: process.env.DEV_OPEN,
 		port: 3000,
 		watchOptions: {
 			poll: true,
 			ignored: '/node_modules/',
 		},
 	},
 	module: {
 		rules: [
 		{
 			test: /\.[jt]sx?$/,
 			exclude: /node_modules/,
 			use: [
 			{
 				loader: 'babel-loader',
 				options: {
 					presets: ['@babel/preset-env'],
 				},
 			},
 			'ts-loader',
 			],
 		},
 		{
 			test: /\.m?js$/,
 			exclude: /node_modules/,
 			use: {
 				loader: 'babel-loader',
 				options: {
 					presets: ['@babel/preset-env'],
 				},
 			},
 		},
 		{
 			test: /\.(sass|css|scss)$/,
 			use: [
 				isDevelopment
 				? 'style-loader'
 				: {
 					loader: MiniCssExtractPlugin.loader,
 					options: {
 						publicPath: '../',
 					},
 				},
 				{
 					loader: 'css-loader',
 					options: {
 						sourceMap: true,
 					},
 				},
 				{
 					loader: 'postcss-loader',
 					options: {
 						sourceMap: true,
 						postcssOptions: {
 							plugins: ['tailwindcss', ...(!isDevelopment ? ['autoprefixer', 'cssnano'] : [])],
 						},
 					},
 				},
 				{
 					loader: 'resolve-url-loader',
 					options: {
 						sourceMap: true,
 					},
 				},
 				{
 					loader: 'sass-loader',
 					options: {
 						sourceMap: true,
 						sassOptions: {
 							outputStyle: 'expanded',
 						},
 					},
 				},
 				],
 		},
 		{
 			test: /\.(jpe?g|png|gif)$/i,
 			type: 'asset/resource',
 			generator: {
 				filename: 'img/[name]-[hash][ext]',
 			},
 		},
 		{
 			test: /\.(woff|woff2|eot|ttf|otf)$/i,
 			type: 'asset/resource',
 			generator: {
 				filename: 'fonts/[name]-[hash][ext]',
 			},
 		},
 		],
 	},
 };