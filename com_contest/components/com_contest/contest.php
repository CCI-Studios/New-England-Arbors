<?php
defined('KOOWA') or die('Koowa not installed');

KLoader::loadIdentifier('com://site/contest.alias');
echo KService::get('com://site/contest.dispatcher')->dispatch();