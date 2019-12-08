<?php
namespace Modules\Lecturer\Services\Result;

use Modules\Admin\Entities\Session;

trait VerifyUploadFile
{
	public function verifyThisFile($file)
	{
		$errors = [];
		if($this->getDowloadedFileSession($file)->id != currentSession()->id){
            $errors[] = 'This seems to be you either change the name of the dowloaded file or trying to upload the last session result if this error persist please download the new score sheet and upload it again';
		}
		return $errors;
	}

	public function getDowloadedFileSession($file)
	{
		return $this->getThisSession(str_replace('_', '/',(substr($file->getClientOriginalName(), 7,9))));
	}

	public function getThisSession($name)
	{
		$session = null;
		foreach (Session::where('name',$name)->get() as $thisSession) {
			$session = $thisSession;
		}
		return $session;
	}
}