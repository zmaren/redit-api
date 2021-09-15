<?php

namespace Eyesee\System\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

/**
 * Class Request
 * @package System\Requests
 */
class Request extends FormRequest
{
    protected array $urlParameters;

    /**
     * @param null $keys
     * @return array
     */
    public function all($keys = null): array
    {
        $requestData = parent::all($keys);

        return $this->mergeUrlParametersWithRequestData($requestData);
    }

    /**
     * @param array $requestData
     * @return array
     */
    private function mergeUrlParametersWithRequestData(array $requestData): array
    {
        $route = Route::current();

        if (!empty($route->parameters) && !empty($this->urlParameters)) {
            $params = array_intersect(array_keys($route->parameters), array_values($this->urlParameters));
            foreach ($params as $param) {
                $requestData[$param] = $route->parameters[$param];
            }
        }

        return $requestData;
    }
}
