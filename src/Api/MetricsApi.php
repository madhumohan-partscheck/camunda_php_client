<?php
/**
 * MetricsApi
 * PHP version 7.2
 *
 * @category Class
 * @package  StrehleDe\CamundaClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Camunda BPM REST API
 *
 * OpenApi Spec for Camunda BPM REST API.
 *
 * The version of the OpenAPI document: 7.13.0
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.0.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace StrehleDe\CamundaClient\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use StrehleDe\CamundaClient\ApiException;
use StrehleDe\CamundaClient\Configuration;
use StrehleDe\CamundaClient\HeaderSelector;
use StrehleDe\CamundaClient\ObjectSerializer;

/**
 * MetricsApi Class Doc Comment
 *
 * @category Class
 * @package  StrehleDe\CamundaClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class MetricsApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $host_index (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $host_index = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $host_index;
    }

    /**
     * Set the host index
     *
     * @param  int Host index (required)
     */
    public function setHostIndex($host_index)
    {
        $this->hostIndex = $host_index;
    }

    /**
     * Get the host index
     *
     * @return Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getMetrics
     *
     * @param  string $metrics_name The name of the metric. (required)
     * @param  \DateTime $start_date The start date (inclusive). (optional)
     * @param  \DateTime $end_date The end date (exclusive). (optional)
     *
     * @throws \StrehleDe\CamundaClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \StrehleDe\CamundaClient\Model\MetricsResultDto
     */
    public function getMetrics($metrics_name, $start_date = null, $end_date = null)
    {
        list($response) = $this->getMetricsWithHttpInfo($metrics_name, $start_date, $end_date);
        return $response;
    }

    /**
     * Operation getMetricsWithHttpInfo
     *
     * @param  string $metrics_name The name of the metric. (required)
     * @param  \DateTime $start_date The start date (inclusive). (optional)
     * @param  \DateTime $end_date The end date (exclusive). (optional)
     *
     * @throws \StrehleDe\CamundaClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \StrehleDe\CamundaClient\Model\MetricsResultDto, HTTP status code, HTTP response headers (array of strings)
     */
    public function getMetricsWithHttpInfo($metrics_name, $start_date = null, $end_date = null)
    {
        $request = $this->getMetricsRequest($metrics_name, $start_date, $end_date);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            switch($statusCode) {
                case 200:
                    if ('\StrehleDe\CamundaClient\Model\MetricsResultDto' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\StrehleDe\CamundaClient\Model\MetricsResultDto', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\StrehleDe\CamundaClient\Model\MetricsResultDto';
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = (string) $responseBody;
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\StrehleDe\CamundaClient\Model\MetricsResultDto',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getMetricsAsync
     *
     * 
     *
     * @param  string $metrics_name The name of the metric. (required)
     * @param  \DateTime $start_date The start date (inclusive). (optional)
     * @param  \DateTime $end_date The end date (exclusive). (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMetricsAsync($metrics_name, $start_date = null, $end_date = null)
    {
        return $this->getMetricsAsyncWithHttpInfo($metrics_name, $start_date, $end_date)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getMetricsAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $metrics_name The name of the metric. (required)
     * @param  \DateTime $start_date The start date (inclusive). (optional)
     * @param  \DateTime $end_date The end date (exclusive). (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMetricsAsyncWithHttpInfo($metrics_name, $start_date = null, $end_date = null)
    {
        $returnType = '\StrehleDe\CamundaClient\Model\MetricsResultDto';
        $request = $this->getMetricsRequest($metrics_name, $start_date, $end_date);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getMetrics'
     *
     * @param  string $metrics_name The name of the metric. (required)
     * @param  \DateTime $start_date The start date (inclusive). (optional)
     * @param  \DateTime $end_date The end date (exclusive). (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getMetricsRequest($metrics_name, $start_date = null, $end_date = null)
    {
        // verify the required parameter 'metrics_name' is set
        if ($metrics_name === null || (is_array($metrics_name) && count($metrics_name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $metrics_name when calling getMetrics'
            );
        }

        $resourcePath = '/metrics/{metrics-name}/sum';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($start_date !== null) {
            if('form' === 'form' && is_array($start_date)) {
                foreach($start_date as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['startDate'] = $start_date;
            }
        }
        // query params
        if ($end_date !== null) {
            if('form' === 'form' && is_array($end_date)) {
                foreach($end_date as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['endDate'] = $end_date;
            }
        }


        // path params
        if ($metrics_name !== null) {
            $resourcePath = str_replace(
                '{' . 'metrics-name' . '}',
                ObjectSerializer::toPathValue($metrics_name),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation interval
     *
     * @param  string $name The name of the metric. (optional)
     * @param  string $reporter The name of the reporter (host), on which the metrics was logged. This will have value provided by the [hostname configuration property](https://docs.camunda.org/manual/7.13/reference/deployment-descriptors/tags/process-engine/#hostname). (optional)
     * @param  \DateTime $start_date The start date (inclusive). (optional)
     * @param  \DateTime $end_date The end date (exclusive). (optional)
     * @param  int $first_result Pagination of results. Specifies the index of the first result to return. (optional)
     * @param  int $max_results Pagination of results. Specifies the maximum number of results to return. Will return less results if there are no more results left. (optional)
     * @param  string $interval The interval for which the metrics should be aggregated. Time unit is seconds. Default: The interval is set to 15 minutes (900 seconds). (optional, default to '900')
     * @param  string $aggregate_by_reporter Aggregate metrics by reporter. (optional)
     *
     * @throws \StrehleDe\CamundaClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \StrehleDe\CamundaClient\Model\MetricsIntervalResultDto[]|\StrehleDe\CamundaClient\Model\ExceptionDto
     */
    public function interval($name = null, $reporter = null, $start_date = null, $end_date = null, $first_result = null, $max_results = null, $interval = '900', $aggregate_by_reporter = null)
    {
        list($response) = $this->intervalWithHttpInfo($name, $reporter, $start_date, $end_date, $first_result, $max_results, $interval, $aggregate_by_reporter);
        return $response;
    }

    /**
     * Operation intervalWithHttpInfo
     *
     * @param  string $name The name of the metric. (optional)
     * @param  string $reporter The name of the reporter (host), on which the metrics was logged. This will have value provided by the [hostname configuration property](https://docs.camunda.org/manual/7.13/reference/deployment-descriptors/tags/process-engine/#hostname). (optional)
     * @param  \DateTime $start_date The start date (inclusive). (optional)
     * @param  \DateTime $end_date The end date (exclusive). (optional)
     * @param  int $first_result Pagination of results. Specifies the index of the first result to return. (optional)
     * @param  int $max_results Pagination of results. Specifies the maximum number of results to return. Will return less results if there are no more results left. (optional)
     * @param  string $interval The interval for which the metrics should be aggregated. Time unit is seconds. Default: The interval is set to 15 minutes (900 seconds). (optional, default to '900')
     * @param  string $aggregate_by_reporter Aggregate metrics by reporter. (optional)
     *
     * @throws \StrehleDe\CamundaClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \StrehleDe\CamundaClient\Model\MetricsIntervalResultDto[]|\StrehleDe\CamundaClient\Model\ExceptionDto, HTTP status code, HTTP response headers (array of strings)
     */
    public function intervalWithHttpInfo($name = null, $reporter = null, $start_date = null, $end_date = null, $first_result = null, $max_results = null, $interval = '900', $aggregate_by_reporter = null)
    {
        $request = $this->intervalRequest($name, $reporter, $start_date, $end_date, $first_result, $max_results, $interval, $aggregate_by_reporter);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            switch($statusCode) {
                case 200:
                    if ('\StrehleDe\CamundaClient\Model\MetricsIntervalResultDto[]' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\StrehleDe\CamundaClient\Model\MetricsIntervalResultDto[]', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\StrehleDe\CamundaClient\Model\ExceptionDto' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\StrehleDe\CamundaClient\Model\ExceptionDto', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\StrehleDe\CamundaClient\Model\MetricsIntervalResultDto[]';
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = (string) $responseBody;
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\StrehleDe\CamundaClient\Model\MetricsIntervalResultDto[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\StrehleDe\CamundaClient\Model\ExceptionDto',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation intervalAsync
     *
     * 
     *
     * @param  string $name The name of the metric. (optional)
     * @param  string $reporter The name of the reporter (host), on which the metrics was logged. This will have value provided by the [hostname configuration property](https://docs.camunda.org/manual/7.13/reference/deployment-descriptors/tags/process-engine/#hostname). (optional)
     * @param  \DateTime $start_date The start date (inclusive). (optional)
     * @param  \DateTime $end_date The end date (exclusive). (optional)
     * @param  int $first_result Pagination of results. Specifies the index of the first result to return. (optional)
     * @param  int $max_results Pagination of results. Specifies the maximum number of results to return. Will return less results if there are no more results left. (optional)
     * @param  string $interval The interval for which the metrics should be aggregated. Time unit is seconds. Default: The interval is set to 15 minutes (900 seconds). (optional, default to '900')
     * @param  string $aggregate_by_reporter Aggregate metrics by reporter. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function intervalAsync($name = null, $reporter = null, $start_date = null, $end_date = null, $first_result = null, $max_results = null, $interval = '900', $aggregate_by_reporter = null)
    {
        return $this->intervalAsyncWithHttpInfo($name, $reporter, $start_date, $end_date, $first_result, $max_results, $interval, $aggregate_by_reporter)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation intervalAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $name The name of the metric. (optional)
     * @param  string $reporter The name of the reporter (host), on which the metrics was logged. This will have value provided by the [hostname configuration property](https://docs.camunda.org/manual/7.13/reference/deployment-descriptors/tags/process-engine/#hostname). (optional)
     * @param  \DateTime $start_date The start date (inclusive). (optional)
     * @param  \DateTime $end_date The end date (exclusive). (optional)
     * @param  int $first_result Pagination of results. Specifies the index of the first result to return. (optional)
     * @param  int $max_results Pagination of results. Specifies the maximum number of results to return. Will return less results if there are no more results left. (optional)
     * @param  string $interval The interval for which the metrics should be aggregated. Time unit is seconds. Default: The interval is set to 15 minutes (900 seconds). (optional, default to '900')
     * @param  string $aggregate_by_reporter Aggregate metrics by reporter. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function intervalAsyncWithHttpInfo($name = null, $reporter = null, $start_date = null, $end_date = null, $first_result = null, $max_results = null, $interval = '900', $aggregate_by_reporter = null)
    {
        $returnType = '\StrehleDe\CamundaClient\Model\MetricsIntervalResultDto[]';
        $request = $this->intervalRequest($name, $reporter, $start_date, $end_date, $first_result, $max_results, $interval, $aggregate_by_reporter);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'interval'
     *
     * @param  string $name The name of the metric. (optional)
     * @param  string $reporter The name of the reporter (host), on which the metrics was logged. This will have value provided by the [hostname configuration property](https://docs.camunda.org/manual/7.13/reference/deployment-descriptors/tags/process-engine/#hostname). (optional)
     * @param  \DateTime $start_date The start date (inclusive). (optional)
     * @param  \DateTime $end_date The end date (exclusive). (optional)
     * @param  int $first_result Pagination of results. Specifies the index of the first result to return. (optional)
     * @param  int $max_results Pagination of results. Specifies the maximum number of results to return. Will return less results if there are no more results left. (optional)
     * @param  string $interval The interval for which the metrics should be aggregated. Time unit is seconds. Default: The interval is set to 15 minutes (900 seconds). (optional, default to '900')
     * @param  string $aggregate_by_reporter Aggregate metrics by reporter. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function intervalRequest($name = null, $reporter = null, $start_date = null, $end_date = null, $first_result = null, $max_results = null, $interval = '900', $aggregate_by_reporter = null)
    {

        $resourcePath = '/metrics';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($name !== null) {
            if('form' === 'form' && is_array($name)) {
                foreach($name as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['name'] = $name;
            }
        }
        // query params
        if ($reporter !== null) {
            if('form' === 'form' && is_array($reporter)) {
                foreach($reporter as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['reporter'] = $reporter;
            }
        }
        // query params
        if ($start_date !== null) {
            if('form' === 'form' && is_array($start_date)) {
                foreach($start_date as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['startDate'] = $start_date;
            }
        }
        // query params
        if ($end_date !== null) {
            if('form' === 'form' && is_array($end_date)) {
                foreach($end_date as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['endDate'] = $end_date;
            }
        }
        // query params
        if ($first_result !== null) {
            if('form' === 'form' && is_array($first_result)) {
                foreach($first_result as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['firstResult'] = $first_result;
            }
        }
        // query params
        if ($max_results !== null) {
            if('form' === 'form' && is_array($max_results)) {
                foreach($max_results as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['maxResults'] = $max_results;
            }
        }
        // query params
        if ($interval !== null) {
            if('form' === 'form' && is_array($interval)) {
                foreach($interval as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['interval'] = $interval;
            }
        }
        // query params
        if ($aggregate_by_reporter !== null) {
            if('form' === 'form' && is_array($aggregate_by_reporter)) {
                foreach($aggregate_by_reporter as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['aggregateByReporter'] = $aggregate_by_reporter;
            }
        }



        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
