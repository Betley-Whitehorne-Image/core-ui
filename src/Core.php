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
			'axios' => '^0.19',
			'browser-sync' => '^2.26',
			'browser-sync-webpack-plugin' => '^2.2',
			'cross-env' => '^7.0',
			'glob-all' => '^3.1.0',
			'laravel-mix' => '^5.0.1',
			'laravel-mix-bundle-analyzer' => '^1.0.5',
			'lodash' => '^4.17.13',
			'purgecss' => '^1.4.2',
			'purgecss-webpack-plugin' => '^1.6',
			'resolve-url-loader' => '^3.1.0',
			'sass' => '^1.20.1',
			'sass-loader' => '^8.0.0',
			'vue' => '^2.5.17',
			'vue-template-compiler' => '^2.6.10',
		];
	}

	/**
	 * Creates the basic mix file
	 */
	public static function updateMix() {
		// TODO read lando to get url for browsersync
		copy(__DIR__ . '/../stubs/webpack.mix.js', base_path('webpack.mix.js'));
	}

	/**
	 * Copies the resource stubs
	 */
	public static function copyResources() {
		File::copyDirectory(__DIR__ . '/../stubs/resources', resource_path());
	}
}
