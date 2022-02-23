<?php

namespace Riclep\Core;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Laravel\Ui\Presets\Preset;

class Core extends Preset
{
	/**
	 * Install the preset.
	 *
	 * @return void
	 */
	public static function install()
	{
		static::cleanDirectories();
		static::updatePackages();
		static::updateMix();
		static::copyResources();
		static::removeNodeModules();
	}

	/**
	 * Removes unneeded files
	 */
	public static function cleanDirectories()
	{
		File::cleanDirectory(resource_path('sass'));
		File::cleanDirectory(resource_path('js'));
		File::cleanDirectory(resource_path('views'));
	}

	/**
	 * Update the given package array.
	 *
	 * @param  array  $packages
	 * @return array
	 */
	protected static function updatePackageArray()
	{
		return [
			'axios' => '^0.21.4',
	        'babel-polyfill' => '^6.26.0',
	        'browser-sync' => '^2.27.5',
	        'browser-sync-webpack-plugin' => '^2.3.0',
	        'cross-env' => '^7.0.3',
	        'glob-all' => '^3.2.1',
	        'laravel-mix' => '^6.0.31',
	        'laravel-mix-bundle-analyzer' => '^1.0.5',
	        'laravel-mix-favicon' => '^0.3.1',
	        'laravel-mix-stylelint' => '^1.0.0',
	        'postcss-scss' => '^4.0.3',
	        'purgecss' => '^4.0.3',
	        'purgecss-webpack-plugin' => '^4.0.3',
	        'sass' => '^1.41.0',
	        'sass-loader' => '^12.1.0',
	        'stylelint' => '^14.2.0',
	        'stylelint-config-standard-scss' => '^3.0.0',
	        'stylelint-order' => '^5.0.0',
	        'stylelint-scss' => '^4.1.0',
	        'stylelint-webpack-plugin' => '^3.1.0',
	        'vue' => '^2.6.14',
	        'vue-loader' => '^15.9.8',
	        'vue-template-compiler' => '^2.6.1',
		];
	}

	/**
	 * Creates the basic mix file
	 */
	public static function updateMix() {
		copy(__DIR__ . '/../stubs/webpack.mix.js', base_path('webpack.mix.js'));
		$webpackMax = file_get_contents(base_path('webpack.mix.js'));
		file_put_contents('webpack.mix.js', str_replace('*|NAME|*', static::getFolderName(), $webpackMax));

		copy(__DIR__ . '/../stubs/.stylelintrc.js', base_path('.stylelintrc.js'));
	}

	/**
	 * Copies the resource stubs
	 */
	public static function copyResources() {
		File::copyDirectory(__DIR__ . '/../stubs/resources', resource_path());
	}

	private static function getFolderName() {
		return explode('.', basename(base_path()))[0];
	}
}
