<?php

Cache::config('default', array('engine' => 'File'));

Configure::write('Dispatcher.filters', array(
  'AssetDispatcher',
  'CacheDispatcher'
));

CakePlugin::load('DebugKit');

date_default_timezone_set('America/New_York');

App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
  'engine' => 'FileLog',
  'types' => array('notice', 'info', 'debug'),
  'file' => 'debug',
));
CakeLog::config('error', array(
  'engine' => 'FileLog',
  'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
  'file' => 'error',
));
