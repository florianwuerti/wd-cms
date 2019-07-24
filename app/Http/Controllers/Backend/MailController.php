<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Session;

class MailController extends Controller {

	public function sendContactToAdmin( Request $request ) {

		$this->validate( $request, [
			'firstname' => 'required|max:255',
			'lastname'  => 'required|max:255',
			'email'     => 'required|email|max:255',
			'subject'   => 'min:3',
			'message'   => 'required|min:10|',

		] );

		$data = [
			'firstname'   => $request->firstname,
			'lastname'    => $request->lastname,
			'phone'       => $request->phone,
			'email'       => $request->email,
			'subject'     => $request->subject,
			'bodyMessage' => $request->message,
		];


		Mail::send( '_includes.mail.contact', $data, function ( $message ) use ( $data ) {

			$message->from( $data['email'] );
			$message->to( setting( 'from_email' ) );
			$message->subject( $data['subject'] );

		} );

		$this->sendContactToAuthor( $request );

		Session::flash( 'success', 'Your Email was Sent!' );

		return redirect()->back();

	}

	public function sendContactToAuthor( $request ) {

		$this->validate( $request, [
			'firstname' => 'required|max:255',
			'lastname'  => 'required|max:255',
			'email'     => 'required|email|max:255',
			'subject'   => 'min:3',
			'message'   => 'required|min:10|',

		] );

		$data = [
			'firstname'   => $request->firstname,
			'lastname'    => $request->lastname,
			'phone'       => $request->phone,
			'email'       => $request->email,
			'subject'     => $request->subject,
			'bodyMessage' => $request->message,
		];


		Mail::send( '_includes.mail.contact-copy', $data, function ( $message ) use ( $data ) {

			$message->from( setting( 'from_email' ) );
			$message->to( $data['email'] );
			$message->subject( $data['subject'] );

		} );

	}

}
