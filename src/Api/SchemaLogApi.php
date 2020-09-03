<?php
/**
 * SchemaLogApi
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
 * SchemaLogApi Class Doc Comment
 *
 * @category Class
 * @package  StrehleDe\CamundaClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class SchemaLogApi
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
     * Operation getSchemaLog
     *
     * @param  string $version Only return schema log entries with a specific version. (optional)
     * @param  int $first_result Pagination of results. Specifies the index of the first result to return. (optional)
     * @param  int $max_results Pagination of results. Specifies the maximum number of results to return. Will return less results if there are no more results left. (optional)
     *
     * @throws \StrehleDe\CamundaClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \StrehleDe\CamundaClient\Model\SchemaLogEntryDto[]
     */
    public function getSchemaLog($version = null, $first_result = null, $max_results = null)
    {
        list($response) = $this->getSchemaLogWithHttpInfo($version, $first_result, $max_results);
        return $response;
    }

    /**
     * Operation getSchemaLogWithHttpInfo
     *
     * @param  string $version Only return schema log entries with a specific version. (optional)
     * @param  int $first_result Pagination of results. Specifies the index of the first result to return. (optional)
     * @param  int $max_results Pagination of results. Specifies the maximum number of results to return. Will return less results if there are no more results left. (optional)
     *
     * @throws \StrehleDe\CamundaClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \StrehleDe\CamundaClient\Model\SchemaLogEntryDto[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getSchemaLogWithHttpInfo($version = null, $first_result = null, $max_results = null)
    {
        $request = $this->getSchemaLogRequest($version, $first_result, $max_results);

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
                    if ('\StrehleDe\CamundaClient\Model\SchemaLogEntryDto[]' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\StrehleDe\CamundaClient\Model\SchemaLogEntryDto[]', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\StrehleDe\CamundaClient\Model\SchemaLogEntryDto[]';
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
                        '\StrehleDe\CamundaClient\Model\SchemaLogEntryDto[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getSchemaLogAsync
     *
     * 
     *
     * @param  string $version Only return schema log entries with a specific version. (optional)
     * @param  int $first_result Pagination of results. Specifies the index of the first result to return. (optional)
     * @param  int $max_results Pagination of results. Specifies the maximum number of results to return. Will return less results if there are no more results left. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSchemaLogAsync($version = null, $first_result = null, $max_results = null)
    {
        return $this->getSchemaLogAsyncWithHttpInfo($version, $first_result, $max_results)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getSchemaLogAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $version Only return schema log entries with a specific version. (optional)
     * @param  int $first_result Pagination of results. Specifies the index of the first result to return. (optional)
     * @param  int $max_results Pagination of results. Specifies the maximum number of results to return. Will return less results if there are no more results left. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSchemaLogAsyncWithHttpInfo($version = null, $first_result = null, $max_results = null)
    {
        $returnType = '\StrehleDe\CamundaClient\Model\SchemaLogEntryDto[]';
        $request = $this->getSchemaLogRequest($version, $first_result, $max_results);

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
     * Create request for operation 'getSchemaLog'
     *
     * @param  string $version Only return schema log entries with a specific version. (optional)
     * @param  int $first_result Pagination of results. Specifies the index of the first result to return. (optional)
     * @param  int $max_results Pagination of results. Specifies the maximum number of results to return. Will return less results if there are no more results left. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getSchemaLogRequest($version = null, $first_result = null, $max_results = null)
    {

        $resourcePath = '/schema/log';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($version !== null) {
            if('form' === 'form' && is_array($version)) {
                foreach($version as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['version'] = $version;
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
     * Operation querySchemaLog
     *
     * @param  int $first_result Pagination of results. Specifies the index of the first result to return. (optional)
     * @param  int $max_results Pagination of results. Specifies the maximum number of results to return. Will return less results if there are no more results left. (optional)
     * @param  \StrehleDe\CamundaClient\Model\SchemaLogQueryDto $schema_log_query_dto schema_log_query_dto (optional)
     *
     * @throws \StrehleDe\CamundaClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \StrehleDe\CamundaClient\Model\SchemaLogEntryDto[]
     */
    public function querySchemaLog($first_result = null, $max_results = null, $schema_log_query_dto = null)
    {
        list($response) = $this->querySchemaLogWithHttpInfo($first_result, $max_results, $schema_log_query_dto);
        return $response;
    }

    /**
     * Operation querySchemaLogWithHttpInfo
     *
     * @param  int $first_result Pagination of results. Specifies the index of the first result to return. (optional)
     * @param  int $max_results Pagination of results. Specifies the maximum number of results to return. Will return less results if there are no more results left. (optional)
     * @param  \StrehleDe\CamundaClient\Model\SchemaLogQueryDto $schema_log_query_dto (optional)
     *
     * @throws \StrehleDe\CamundaClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \StrehleDe\CamundaClient\Model\SchemaLogEntryDto[], HTTP status code, HTTP response headers (array of strings)
     */
    public function querySchemaLogWithHttpInfo($first_result = null, $max_results = null, $schema_log_query_dto = null)
    {
        $request = $this->querySchemaLogRequest($first_result, $max_results, $schema_log_query_dto);

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
                    if ('\StrehleDe\CamundaClient\Model\SchemaLogEntryDto[]' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\StrehleDe\CamundaClient\Model\SchemaLogEntryDto[]', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\StrehleDe\CamundaClient\Model\SchemaLogEntryDto[]';
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
                        '\StrehleDe\CamundaClient\Model\SchemaLogEntryDto[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation querySchemaLogAsync
     *
     * 
     *
     * @param  int $first_result Pagination of results. Specifies the index of the first result to return. (optional)
     * @param  int $max_results Pagination of results. Specifies the maximum number of results to return. Will return less results if there are no more results left. (optional)
     * @param  \StrehleDe\CamundaClient\Model\SchemaLogQueryDto $schema_log_query_dto (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function querySchemaLogAsync($first_result = null, $max_results = null, $schema_log_query_dto = null)
    {
        return $this->querySchemaLogAsyncWithHttpInfo($first_result, $max_results, $schema_log_query_dto)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation querySchemaLogAsyncWithHttpInfo
     *
     * 
     *
     * @param  int $first_result Pagination of results. Specifies the index of the first result to return. (optional)
     * @param  int $max_results Pagination of results. Specifies the maximum number of results to return. Will return less results if there are no more results left. (optional)
     * @param  \StrehleDe\CamundaClient\Model\SchemaLogQueryDto $schema_log_query_dto (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function querySchemaLogAsyncWithHttpInfo($first_result = null, $max_results = null, $schema_log_query_dto = null)
    {
        $returnType = '\StrehleDe\CamundaClient\Model\SchemaLogEntryDto[]';
        $request = $this->querySchemaLogRequest($first_result, $max_results, $schema_log_query_dto);

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
     * Create request for operation 'querySchemaLog'
     *
     * @param  int $first_result Pagination of results. Specifies the index of the first result to return. (optional)
     * @param  int $max_results Pagination of results. Specifies the maximum number of results to return. Will return less results if there are no more results left. (optional)
     * @param  \StrehleDe\CamundaClient\Model\SchemaLogQueryDto $schema_log_query_dto (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function querySchemaLogRequest($first_result = null, $max_results = null, $schema_log_query_dto = null)
    {

        $resourcePath = '/schema/log';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

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



        // body params
        $_tempBody = null;
        if (isset($schema_log_query_dto)) {
            $_tempBody = $schema_log_query_dto;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
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
            'POST',
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
