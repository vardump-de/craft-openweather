<?php
/**
 * openweather plugin for Craft CMS 3.x
 *
 * providing openweather data for craft 3
 *
 * @link      https://github.com/vardump-de/craft-openweather
 * @copyright Copyright (c) 2017 rmdev
 */

namespace vardump\openweather\variables;

use vardump\openweather\Openweather;

use Craft;

/**
 * openweather Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.openweather }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    rmdev
 * @package   Openweather
 * @since     1.0.0
 */
class OpenweatherVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Whatever you want to output to a Twig template can go into a Variable method.
     * You can have as many variable functions as you want.  From any Twig template,
     * call it like this:
     *     {{ craft.openweather.findById(twigValue) }}
     *
     * @param integer $id
     * @param array $options
     * @return string
     */
    public function findById($id, $options=array())
    {
        $result = '';
        if ($id) {
            $result = Openweather::$plugin->openweatherService->findByIdService($id, $options);
        }
        return $result;
    }
}
