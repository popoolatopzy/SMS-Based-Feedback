<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cake\Http\Response;
use Twilio\Rest\Client;
use App\Models\CustomerFeedback;

class CustomerFeedbackController extends Controller
{
    public function showForm()
    {
        return view('customerfeedback');
    }

    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'phones' => 'required',
            'message' => 'required',
        ]);

        $accountSid = env('ACCOUNT_SID');
        $authToken = env('AUTH_TOKEN');
        $twilioNumber = env('TWILIO_NUMBER');

        $twilioClient = new Client($accountSid, $authToken);

        $phones = explode(',', $validatedData['phones']);

        foreach ($phones as $phone) {
            try {
                $twilioClient->messages->create(
                    $phone,
                    [
                        'from' => $twilioNumber,
                        'body' => $validatedData['message']
                    ]
                );
            } catch (\Exception $e) {
                return back()->withInput()->withErrors(['error' => 'Failed to send SMS.']);
            }
        }
        return redirect()->back()->with('success', 'SMS sent successfully.');
    }
    public function receiveFeedback(Request $request)
    {
       
        $from = $request->input('From');
        $body = $request->input('Body');
        $feedback = new CustomerFeedback();
        $feedback->phone = $from;
        $feedback->response = $body ;
        $feedback->save();

        $accountSid = env('ACCOUNT_SID');
        $authToken = env('AUTH_TOKEN');
        $twilioNumber = env('TWILIO_NUMBER');

        $twilioClient = new Client($accountSid, $authToken);
        $twilioClient->messages->create(
            $from,
            [
                'from' => $twilioNumber,
                'body' => "Thank you for your feedback."
            ]
        );

        return response();
    }

    public function showFeedbackResponses()
    {
        $feedbackResponses = CustomerFeedback::all();
        return view('feedback_responses', ['feedbackResponses' => $feedbackResponses]);
    }
}