<?php

/**
 * Plugin that responds to "!ping" messages with a pong
 * simply to verify that the bot is alive
 */
class Plugin_Ping implements Plugin_Interface {

	var $socket;
	var $config;

    function init($config, $socket) {
		$this->socket = $socket;
		$this->config = $config;
	}

    function onData($data) { }

    function tick() { }

    function onMessage($from, $channel, $msg) {
		if(stringEndsWith($msg, "{$this->config['trigger']}ping")) {
			sendMessage($this->socket, $channel, $from.": Pong");
		}
	}

    function destroy() {
		$this->socket = null;
	}
}
