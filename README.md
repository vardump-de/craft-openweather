# openweather plugin for Craft CMS 3.x

providing weather data from [openweathermap](http://openweathermap.org/api) data for craft 3


![Screenshot](resources/img/plugin-logo.png)

## Requirements

This plugin requires Craft CMS 3.0.0-RC2 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require vardump-de/craft-openweather

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for openweather.

## openweather Overview

-Insert text here-

## Configuring openweather

Insert your openweathermap apik key in the plugins setting page. 

## Using openweather

    {% set weather = craft.openweather.findById(12345, {'units': 'metric'}) %}

## openweather Roadmap

Some things to do, and ideas for potential features:

* add forecast 
* configurable cache time
* add logo 
* add some translations
* add js query

(c) 2017 [vardump-de](https://github.com/vardump-de)
