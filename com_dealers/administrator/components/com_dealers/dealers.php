<?php
defined('KOOWA') or die('Koowa not installed');

echo KService::get('com://admin/dealers.dispatcher')->dispatch();