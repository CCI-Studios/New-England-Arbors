<?php
defined('KOOWA') or die('Koowa not installed');

echo KService::get('com://site/dealers.dispatcher')->dispatch();