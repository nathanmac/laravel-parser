<?php 

namespace Nathanmac\Parser;

use Config, Exception;

class ParserException extends Exception {}

class Parser {

	public function payload($format = false) {
        if ($format !== false) {
            if (isset(Config::get('parser::supported_formats')[$format])) {
                return $this->{Config::get('parser::supported_formats')[$format]}($this->_payload());
            }
            throw new ParserException('invalid_or_unsupported_format');
        }
		return $this->{$this->_format()}($this->_payload());
	}

	private function _format() {
        if (isset($_SERVER['HTTP_CONTENT_TYPE']))
        	if (isset(Config::get('parser::supported_formats')[$_SERVER['HTTP_CONTENT_TYPE']]))
        		return Config::get('parser::supported_formats')[$_SERVER['HTTP_CONTENT_TYPE']];
        return Config::get('parser::default');
    }

    private function _payload() {
    	return file_get_contents('php://input');
    }

	public function xml($string) {
        if ($string) {
            $xml = @simplexml_load_string($string, 'SimpleXMLElement', LIBXML_NOCDATA);
            if(!$xml)
                throw new ParserException('failed_to_parse_XML');
            return json_decode(json_encode((array) $xml), 1);   // Work arround to accept xml input
        }
        return array();
    }

    public function json($string) {
        if ($string) {
            $json = json_decode(trim($string), true);
            if (!$json)
                throw new ParserException('failed_to_parse_JSON');
            return $json;
        }
        return array();
    }

    public function serialize($string) {
        if ($string) {
            $serial = @unserialize(trim($string));
            if (!$serial)
                throw new ParserException('failed_to_parse_serialized_data');
            return $serial;
        }
        return array();
    }

    public function querystr($string) {
        if ($string) {
            @parse_str(trim($string), $querystr);
            if (!$querystr)
                throw new ParserException('failed_to_parse_querystring');
            return $querystr;
        }
        return array();
    }
}