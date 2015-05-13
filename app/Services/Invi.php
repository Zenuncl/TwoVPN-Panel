<?php 

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Invitation;
use Illuminate\Contracts\Auth\Invitation as InvitationContract;

class Invi implements InvitationContract
{
	public static function forge()
	{
		$newClass = __CLASS__;
		return new $newClass();
	}
	public function generate($expire,$active,$accountId = null)
	{

			$now = strtotime("now");
			$format = 'Y-m-d H:i:s ';
			$expiration = date($format, strtotime('+ '.$expire, $now)); 
			$code = $this->hash_split(hash('sha256',str_random(10))) . $this->hash_split(hash('sha256',time()));
			$newInvi = array(
					"code"	=> $code,
					"expiration"	=> $expiration,
					"active"	=> $active,
					"used"	=> "0"
				);
			if ($accountId)
				$newInvi['account_id'] = $accountId;
			Invitation::create($newInvi);
			return json_encode($newInvi);
		
	}
	public function active($code)
	{
		Invitation::where('code','=',$code)
				->update(array('active'=>True));
	}
	public function deactive($code)
	{
		Invitation::where('code','=',$code)
				->update(array('active'=>False));
	}
	public function used($code)
	{
		Invitation::where('code','=',$code)
				->update(array('used'=>True));
	}
	public function unuse($code)
	{
		Invitation::where('code','=',$code)
				->update(array('used'=>False));
	}
	/**
	 * Get all pending invites for given account ID
	 * 
	 * @param int
	 * @return array
	 */
	public function pending($accountId)
	{
		return Invitation::where('account_id', '=', $accountId)
						->where('active', '=', 1)
						->where('used', '=', 0)
						->get()
						->toArray();
	}
	public function status($code)
	{
		$temp = Invitation::where('code', '=', $code)
					->first();
		if($temp)
		{
			if(!$temp->active)
				return "deactive";
			else if($temp->used)
				return "used";
			else if(strtotime("now") > strtotime($temp->expiration))
				return "expired";
			else
				return "valid";
		}
		else
			return "not exist";
	}
	public function check($code)
	{
		$temp = Invitation::where('code', '=', $code)
							->first();
		if($temp)
		{
			if(!$temp->active or $temp->used or strtotime("now") > strtotime($temp->expiration))
				return False;
			else
				return True;
		}
		else
			return False;
	}
	public function get($code)
	{
		return Invitation::where('code', '=', $code)
							->first();
		
	}
	public function delete($code)
	{
		$temp = Invitation::where('code', '=', $code)
							->delete();
	}
	protected function hash_split($hash)
	{
		$output = str_split($hash,8);
		return $output[rand(0,1)];
	}
}