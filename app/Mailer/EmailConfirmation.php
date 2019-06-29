<?php
/**
 * 
 */
namespace App\Mailer;

use Iluminate\Bus\Queueable;
use Iluminate\Mail\Mailable;
use Iluminate\Queue\SerializesModels;
use Iluminate\Contracts\Queue\ShouldQueue;

class EmailConfirmation extends Mailable
{

	use Queueable,SerializesModels;
	
	function __construct()
	{
		# code...
	}

	public function build()
	{
		return $this->view('mailer/email_confirmation')->subject('Email Confirmation');
	}
}