<?php
defined('KOOWA') or die('Koowa not installed');

KLoader::loadIdentifier('com://site/dealers.alias');
echo KService::get('com://site/dealers.dispatcher')->dispatch();