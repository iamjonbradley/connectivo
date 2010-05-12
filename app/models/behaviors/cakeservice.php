<?php
/**
 * A simple WebService Behavior class that eases requests to foreign pages
 * Entirely PHP based, does not require and modules or cURL.
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * Based on the WebserviceModel authored by Felix Geisendörfer (http://debuggable.com)
 * Based on WebService Behavior by Mark Story (mark-story.com)
 *
 * @author DualTech Services, Inc. (dual-tech.com)
 */
App::import('Core', 'Socket');

class CakeserviceBehavior extends ModelBehavior {
	var $_headers, $_path, $response, $Socket;
	var $cookies = array();

	function request(&$Model, $params = array()) {
		// Setup the connection
		if (!empty($params['url'])) {
			$this->serviceConnect($Model, $params['url']);
		} else {
			return false;
		}

		$postHeaders = array(
			'Host' => 'jadams.bounceme.net',
			'Connection' => 'Close',
		);

		$requestMethod = 'POST';
		if (empty($params['data'])) {
			$requestMethod = 'GET';

		} else {
			$params['data'] = '<?xml version="1.0" encoding="UTF-8" ?>' . $params['data'];
			$postHeaders = array_merge($postHeaders, array('Content-Length' => strlen($params['data']), 'Content-Type'	=> 'text/xml'));
		}

		$this->_formatHeaders($postHeaders);

		$request = "$requestMethod {$this->_path} HTTP/1.0\r\n";
		$request .= $this->_headers . "\r\n";
		$request .= "\r\n";
		if (!empty($params['data'])) {
			$request .= $params['data'];
		}

		$this->Socket->write($request);

		$response = '';
		while ($data = $this->Socket->read()) {
			$response .= $data;
		}

		$this->_parseResponse($response);

		if (array_key_exists('Location', $this->response['headers'])) {
			//$this->serviceConnect($Model, $this->response['headers']['Location']);
			$params['url'] = $this->response['headers']['Location'];
			$this->request($Model, $params);
		}
		return $this->response['body'];
	}

/**
 * Connect the Behavior to a new URL
 *
 * @param string $url The URL to connect to.
 * @param array $options Options Array for the new connection.
 * @return bool success
 **/
	function serviceConnect(&$Model, $url) {
	    $options = array(
	        'timeout' => 30,
	        'persistent' => false,
	        'defaultUrl' => null,
	        'port' => 80,
	        'protocol' => 'tcp',
	        'followRedirect' => true
	    );		

		$path = $this->_setPath($url);
		$options['host'] = $path['host'];

		if ($this->Socket === null) {
			$this->Socket = new CakeSocket($options);
		} else {
			$this->serviceDisconnect($Model);
			$this->Socket->config = $options;
		}
		return $this->Socket->connect();
	}

/**
 * Disconnect / Reset the Webservice Socket.
 *
 * @return boolean
 **/
	function serviceDisconnect(&$Model) {
		if ($this->Socket !== null) {
			$this->Socket->disconnect();
			$this->Socket->reset();
		}
	}

/**
 * Formats Additional Request Headers
 *
 * @return void
 **/
	function _formatHeaders($headers = array()) {
		$headers['User-Agent'] = 'CakeserviceBehavior';
		$headers['Accept'] = 'text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5';
		$headers['Accept-Language'] = 'en-us,en;q=0.5';

		// Load cookies
		$headers['Cookie'] = '';
		foreach($this->cookies as $cookieKey => $cookieData) {
			$headers['Cookie'] .= $cookieKey . '=' . $cookieData['value'] . '; ';
		}

		foreach ($headers as $name => $value) {
			$tmp[] = "$name: $value";
		}
		$header = implode("\r\n", $tmp);
		$this->_headers = $header;
	}	

/**
 * Parse the Reponse from the request, separating the headers from the content.
 *
 * @return void
 **/
	function _parseResponse($response) {
		$headers = substr($response, 0, strpos($response, "\r\n\r\n"));
		$body = substr($response, strlen($headers));

		//split up the headers
		$parts = preg_split("/\r?\n/", $headers, -1, PREG_SPLIT_NO_EMPTY);
		$heads = array();
		for ($i = 1, $total = sizeof($parts); $i < $total; $i++ ) {
			list($name, $value) = explode(': ', $parts[$i]);
			$heads[$name] = $value;
		}

		if (array_key_exists('Set-Cookie', $heads)) {
			// Save cookies

			$cookies = array();
			foreach ($heads as $headerKey => $headerValue) {
				if ($headerKey == 'Set-Cookie') {
					$parts = split('; ', $headerValue);

					$cookieKey = '';
					foreach ($parts as $index => $part) {
						list($key, $value) = split('=', $part);

						if ($index == 0) {
							$cookieKey = $key;
							$cookies[$cookieKey]['value'] = $value;
						} else {
							$cookies[$cookieKey][$key] = $value;
						}
					}
				}
			}

			$this->cookies = $cookies;
		}

		$this->response['headers'] = $heads;
		$this->response['body'] = trim($body);
	}	

/**
 * Set the host and path for the webservice.
 * @param string $url The complete url you want to connect to.
 * @return array Host & Path
 **/
    function _setPath($url) {
        $port = 80;
        if (preg_match('/^https?:\/\//', $url)) {
            $url = substr($url, strpos($url, '://') + 3);
        }
        if (strpos($url, '/') === false) {
            $host = $url;
            $path = '/';
        } else {
            $host = substr($url, 0, strpos($url, '/'));
            $path = substr($url, strlen($host));
        }
        if ($path == '') {
            $path = '/';
        }

        $this->_path =$path;
        return array('host' => $host, 'path' => $path, 'port' => $port);
    }

    function setCookies(&$Model, $cookies) {
    	$this->cookies = $cookies;
    }

    function getCookies(&$Model) {
    	return $this->cookies;
    }
}
?>
