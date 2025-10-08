<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

use App\Mail\ContactMessage;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('contact');
    }

    /**
     * Sends a contact message email to the email address specified in the .env file.
     * The message is retrieved from the request object.
     * If the message is sent successfully, it redirects back to the contact page with a success message.
     * If there is an error while sending the message, it redirects back to the contact page with a danger message.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function send (Request $request): RedirectResponse
    {
        $message = $request->get('message');

        try {
            $ContactMessage = new ContactMessage($message);
            Mail::to(env('MAIL_TO_ADDRESS'))->send($ContactMessage);
            return redirect()->route('contact')->with('success','Message sended with success!');
        }
        catch( \Exception $e ){
            return redirect()->route('contact')->with('danger','Error on send message. Try again later.');
        }
    }
}
