<?php
/**
 * openweather plugin for Craft CMS 3.x
 *
 * providing openweather data for craft 3
 *
 * @link      https://github.com/vardump-de/craft-openweather
 * @copyright Copyright (c) 2017 rmdev
 */

namespace vardump\openweather\services;

use vardump\openweather\Openweather;

use Craft;
use craft\base\Component;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use yii\db\Exception;

/**
 * OpenweatherService Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    rmdev
 * @package   Openweather
 * @since     1.0.0
 */
class OpenweatherService extends Component
{
    const CACHE_KEY = 'vardump-openweather';

    /**
     * @var string $apiKey
     */
    protected $apiKey;

    public function __construct(array $config = [])
    {
        $this->apiKey = Openweather::$plugin->getSettings()->apiKey;
        parent::__construct($config);
    }
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     Openweather::$plugin->openweatherService->findByIdService()
     *
     * @param integer $id
     * @param array $options
     * @return mixed
     */
    public function findByIdService($id, array $options=array())
    {
        $options['id'] = $id;
        $cacheKey = self::getCacheKey($options);
        $cached = Craft::$app->cache->get($cacheKey);
        if (!$cached && $this->apiKey) {
            $result = $this->fetch("/data/2.5/weather", $options);
            Craft::$app->cache->add($cacheKey, $result, 3600);
            return $result;
        }
        return $cached;
    }

    /**
     * @param string $uri
     * @param array $options
     * @return bool|string
     */
    protected function fetch( $uri, array $options=array())
    {
        //add apiKey to options
        $options['APPID'] = $this->apiKey;

        try {
            $client = new Client(['base_uri' => 'http://api.openweathermap.org' ]);
            $result = $client->get($uri,[ 'query' => $options]);
        }
        catch (Exception $e) {
            //TODO : log
            return false;
        }
        if ($result->getStatusCode() === 200) {
            return  \GuzzleHttp\json_decode($result->getBody());
        }
        return false;
    }

    /**
     * @param array $options
     * @return array
     */
    private function getCacheKey( array $options=array()) :array {
        $options[] = self::CACHE_KEY;
        return $options;
    }
}
