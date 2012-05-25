<?php
defined('KOOWA') or die('Koowa not installed');

echo KService::get('com://admin/contest.dispatcher')->dispatch();