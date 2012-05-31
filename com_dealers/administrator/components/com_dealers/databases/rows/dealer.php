<?php

class ComDealersDatabaseRowDealer extends KDatabaseRowDefault
{

	public function save()
	{
		list($lat, $lon) = $this->_geocode();
		$this->lat = $lat;
		$this->lon = $lon;
		return parent::save();
	}

	protected function _geocode()
	{
		$address = "{$this->address1}, {$this->city}, {$this->state}, {$this->country}, {$this->zip}";
		$url = 'http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address='. $address;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, str_replace(' ', '+', $url));
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		curl_close($ch);

		$json = json_decode($result, true);
		$json = $json['results'];

		if (count($json)) {
			$json = $json[0];
		}

		return array($json['geometry']['location']['lat'], $json['geometry']['location']['lng']);
	}

}