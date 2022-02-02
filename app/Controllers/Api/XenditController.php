<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\PembelianModel;
use Xendit\Xendit;

class XenditController extends BaseController
{
	private $token = 'xnd_development_yk3TqIGrwcqwKXc8ACLAWNC4YT1t16rvhWOoEBNfEUP4RInQMBkr7fYCkBvjDMec';
	protected $pembelianModel;

	public function __construct()
	{
		Xendit::setApiKey($this->token);
		$this->pembelianModel = new PembelianModel();
	}
}
