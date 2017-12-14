<?php
/**
 * openweather plugin for Craft CMS 3.x
 *
 * providing openweather data for craft 3
 *
 * @link      https://github.com/vardump-de/craft-openweather
 * @copyright Copyright (c) 2017 rmdev
 */

namespace vardump\openweather\models;

use vardump\openweather\Openweather;

use Craft;
use craft\base\Model;

/**
 * Openweather Settings Model
 *
 * This is a model used to define the plugin's settings.
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    rmdev
 * @package   Openweather
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * Some field model attribute
     *
     * @var string
     */
    public $apiKey = '';

    // Public Methods
    // =========================================================================

    /**
     * Returns the validation rules for attributes.
     *
     * Validation rules are used by [[validate()]] to check if attribute values are valid.
     * Child classes may override this method to declare different validation rules.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['apiKey', 'string']
        ];
    }
}
