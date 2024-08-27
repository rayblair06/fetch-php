<?php

class Options
{
    /**
     * Constructor to initialize HTTP options.
     *
     * @param string $method The HTTP method (e.g., GET, POST, etc.). Defaults to 'GET'.
     * @param array $headers The HTTP headers to be sent with the request. Defaults to JSON content type.
     * @param array|string $body The request body, can be an array (which will be converted to JSON) or a string. Defaults to an empty string.
     */
    public function __construct(
        public string $method = 'GET',
        public array $headers = [
            'Content-type: application/json; charset=UTF-8',
        ],
        public array|string $body = ''
    ) {
        // Ensure the HTTP method is in uppercase
        $this->method = strtoupper($this->method);

        // Automatically convert array body to JSON string if necessary and set Content-Length
        // 'content' => http_build_query(...), // application/x-www-form-urlencoded
        // 'content' => json_encode($this->body), // application/json
        if (is_array($this->body) && $this->method !== 'GET') {
            $this->body = json_encode($this->body);
            $this->headers[] = 'Content-Length: ' . strlen($this->body);
        }
    }

    /**
     * Converts the object properties into an array format required by stream_context_create().
     *
     * @return array The array representation of the HTTP options.
     */
    public function toArray(): array
    {
        return [
            'http' => [
                'header'  => $this->formatHeaders(),
                'method'  => $this->method,
                'content' => $this->body,
            ]
        ];
    }

    /**
     * Converts the headers array into a properly formatted string.
     *
     * @return string The formatted headers string.
     */
    private function formatHeaders(): string
    {
        return implode("\r\n", $this->headers);
    }
}

if (!function_exists('fetch')) {
    /**
     * Fetch function to perform HTTP requests.
     *
     * @param string $url The URL to which the request is sent.
     * @param array $options Optional parameters to customize the request, passed to the Options class.
     * @return string The response from the server.
     * @throws Exception If the HTTP request fails.
     */
    function fetch(string $url, array $options = [])
    {
        $options = new Options(...$options);

        $context = stream_context_create($options->toArray());

        $response = @file_get_contents($url, false, $context);

        if ($response === false) {
            $error = error_get_last(); // Get the last error message
            throw new Exception('HTTP request failed: ' . $error['message']);
        }

        return $response;
    }
}
