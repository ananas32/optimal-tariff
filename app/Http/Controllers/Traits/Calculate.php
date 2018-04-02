<?php

namespace App\Http\Controllers\Traits;

class Calculate
{
	public function calls($configCall, $minutes)
	{
		if ($configCall->unlimited) {
			// если безлим
			$data = [
				'unlimited' => true,
				'tariff_minute' => false,
				'price_by_tariff_minute' => false
			];
		} else {
			$sum = 0;
			$quantity = (int) $configCall->quantity;
			$price = (double) $configCall->price;
			$minutes = $minutes - (int) $configCall->tariff_minute;

			if($minutes >= 0) {
				for ($i = 0; $i < $minutes; $i += $quantity) {
					$sum += $price;
				}
			}

			$data = [
				'unlimited' => false,
				'tariff_minute' => (int) $configCall->tariff_minute,
				'price_by_tariff_minute' => $sum
			];
		}

		return $data;
	}

	public function package($configPackage, $package)
	{
		if ($configPackage->unlimited) {
			// если безлим
			$data = [
				'unlimited' => true,
				'tariff_package' => false,
				'price_by_tariff_package' => false
			];
		} else {
			$sum = 0;
			$quantity = (int) $configPackage->quantity;
			$price = (double) $configPackage->price;
			$package = $package - (int) $configPackage->tariff_package;

			if($package >= 0) {
				for ($i = 0; $i < $package; $i += $quantity) {
					$sum += $price;
				}
			}

			$data = [
				'unlimited' => false,
				'tariff_package' => (int) $configPackage->tariff_package,
				'price_by_tariff_package' => $sum
			];
		}

		return $data;
	}

	public function message($configMessage, $message)
	{
		if ($configMessage->unlimited) {
			// если безлим
			$data = [
				'unlimited' => true,
				'tariff_message' => false,
				'price_by_tariff_message' => false
			];
		} else {
			$sum = 0;
			$quantity = (int) $configMessage->quantity;
			$price = (double) $configMessage->price;
			$message = $message - (int) $configMessage->tariff_message;

			if($message >= 0) {
				for ($i = 0; $i < $message; $i += $quantity) {
					$sum += $price;
				}
			}

			$data = [
				'unlimited' => false,
				'tariff_message' => (int) $configMessage->tariff_message,
				'price_by_tariff_message' => $sum
			];
		}

		return $data;
	}

	public function tariffPayment($tariff, $sum)
	{
		return $tariff->price + $sum;
	}
}