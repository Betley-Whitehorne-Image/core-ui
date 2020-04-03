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
		static::setupLando();
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
			'babel-polyfill' => '^6.26.0',
			'browser-sync' => '^2.26',
			'browser-sync-webpack-plugin' => '^2.2',
			'cross-env' => '^7.0',
			'glob-all' => '^3.1.0',
			'laravel-mix' => '^5.0.1',
			'laravel-mix-bundle-analyzer' => '^1.0.5',
			'purgecss' => '^1.4.2',
			'purgecss-webpack-plugin' => '^1.6',
			'sass' => '^1.20.1',
			'sass-loader' => '^8.0.0',
			'vue' => '^2.5.17',
			'vue-template-compiler' => '^2.6.10',
		];
	}

	/**
	 * Creates the basic Lando file
	 */
	public static function setupLando() {
		copy(__DIR__ . '/../stubs/.lando.yml', base_path('.lando.yml'));
		$lando = file_get_contents(base_path('.lando.yml'));
		file_put_contents('.lando.yml', str_replace('*|NAME|*', static::getFolderName(), $lando));
	}

	/**
	 * Creates the basic mix file
	 */
	public static function updateMix() {
		copy(__DIR__ . '/../stubs/webpack.mix.js', base_path('webpack.mix.js'));
		$webpackMax = file_get_contents(base_path('webpack.mix.js'));
		file_put_contents('webpack.mix.js', str_replace('*|NAME|*', static::getFolderName(), $webpackMax));
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
