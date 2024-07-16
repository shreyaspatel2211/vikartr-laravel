<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ContactDataTable;
use App\Http\Controllers\Controller;
use App\Imports\ContactsImport;
use App\Mail\ContactMail;
use App\Models\City;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Contact;
use App\Models\Country;
use App\Models\EmailLog;
use App\Models\EmailTemplate;
use App\Models\MessageLog;
use App\Models\MessageTemplate;
use App\Models\State;
use App\Models\User;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Psr\Container\ContainerInterface;
use Yajra\DataTables\DataTables;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view contact', ['only' => ['index']]);
        $this->middleware('permission:create contact', ['only' => ['create', 'store']]);
        $this->middleware('permission:update contact', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete contact', ['only' => ['destroy']]);
    }

    public function index(ContactDataTable $dataTable)
    {
        $emaiTemplates = EmailTemplate::all();
        $messageTemplates = MessageTemplate::all();
        return $dataTable->render('admin.contact.index', ['emaiTemplates' => $emaiTemplates, 'messageTemplates' => $messageTemplates]);
    }

    public function create()
    {
        $cities = City::all();
        $states = State::all();
        $countries = Country::all();
        $companies = Company::all();

        return view('admin.contact.create', ['cities' => $cities, 'states' => $states, 'countries' => $countries, 'companies' => $companies]);
    }

    public function store(Request $request)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('contact'), // Unique rule for the 'email' column in the 'employee' table
            ],
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'designation' => 'nullable|string',
            'city_id' => 'nullable|exists:city,id',
            'state_id' => 'nullable|exists:state,id',
            'country_id' => 'nullable|exists:country,id',
            'company_id' => 'nullable|exists:company,id',
        ]);

        $user = auth()->user();
        $contact = new Contact;
        $contact->first_name = $validatedData['first_name'];
        $contact->last_name = $validatedData['last_name'];
        $contact->email = $validatedData['email'];
        $contact->phone = $validatedData['phone'];
        $contact->user_id = $user->id;
        $contact->address = $validatedData['address'] ?? null;
        $contact->designation = $validatedData['designation'] ?? null;
        $contact->city_id = $validatedData['city_id'] ?? null;
        $contact->state_id = $validatedData['state_id'] ?? null;
        $contact->country_id = $validatedData['country_id'] ?? null;
        $contact->company_id = $validatedData['company_id'] ?? null;
        $contact->save();

        return redirect()->route('admin_contact')->with('success', 'Contact added successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contact::findOrFail($id);
        $users = User::all();
        $cities = City::all();
        $states = State::all();
        $countries = Country::all();
        $companies = Company::all();
        return view('admin.contact.edit', ['contact' => $contact, 'users' => $users, 'cities' => $cities, 'states' => $states, 'countries' => $countries, 'companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact = Contact::findOrFail($id);
        $updateData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('contact')->ignore($id),
            ],
            'phone' => 'required',
            'address' => 'nullable|string',
            'designation' => 'nullable|string',
            'city_id' => 'nullable|exists:city,id',
            'state_id' => 'nullable|exists:state,id',
            'country_id' => 'nullable|exists:country,id',
            'company_id' => 'nullable|exists:company,id',
        ]);

        Contact::whereId($id)->update($updateData);
        return redirect('/admin/contact')->with('completed', 'Contact has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);

        $contact->delete();
        return redirect('/admin/contact')->with('completed', 'Contact has been deleted');
    }

    public function import()
    {
        return view('admin.contact.import');
    }

    public function importContacts(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xlsx',
        ]);

        Excel::import(new ContactsImport, $request->file('file'));

        return redirect('/admin/contact')->with('completed', 'Contacts imported successfully.');
    }

    public function sendMessageToAllContacts()
    {
        $accessToken = 'EAAZAD5l24e30BO8r07z7etnbP549iDnLKInAT1rDDC6PZCEu2WNuTJLvN3qFDnVHZCspbj0fPrCezo9jr3HvWqx0aMVQERwytr3AlpdAw824a6LtLcPCS2WahiYueJx0ZBZBY6F0WeaDV861qK5fwPdbQGvZBZC02rzNeZBlKfrWYu2sKMdfk6ygMYjxlp2FThwgfeQNlieNfbxknZCO4jnsZD';

        // Your message data
        $messageData = [
            'messaging_product' => 'whatsapp',
            'type' => 'template',
            'template' => [
                'name' => 'hello_world',
                'language' => [
                    'code' => 'en_US'
                ]
            ]
        ];

        // List of WhatsApp contacts to send message to
        $contacts = [
            '917359540336', // Add more contacts if needed
        ];

        // Create Guzzle client
        $client = new Client([
            'base_uri' => 'https://graph.facebook.com/v19.0/',
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ]
        ]);



        foreach ($contacts as $contact) {
            try {
                $response = $client->post('368263343018482/messages', [
                    'json' => array_merge($messageData, ['to' => $contact])
                ]);

                if ($response->getStatusCode() === 200) {
                    return redirect()->back()->with('completed', 'Message sent successfully.');
                } else {
                    return redirect()->back()->with('error', 'Failed to send message to' . $contact . '.');
                }
            } catch (Exception $e) {
                return redirect()->back()->with('error', 'Error sending message to' . $contact . ':' . $e->getMessage() . '.');
            }
        }
    }

    public function sendMessage(Request $request)
    {
        $templateId = $request->input('message_template_id');
        if ($request->input('select_all') == "yes") {
            $contacts = Contact::all();
        } else {
            $contactIds = $request->input('contact_ids');

            if (is_array($contactIds) && count($contactIds) > 0) {
                $contacts = Contact::whereIn('id', $contactIds)->get();
            }
        }
        foreach ($contacts as $contact) {
            MessageLog::create([
                'contact_id' => $contact->id,
                'phone' => $contact->phone,
                'email' => $contact->email,
                'status' => 'pending',
                'message_template_id' => $templateId
            ]);
        }

        return redirect()->back()->with('completed', 'Messages scheduled successfully to selected contacts.');
    }

    public function sendMessages()
    {
        $accessToken = 'EAAZAD5l24e30BOwtRAWnpBeMiS8u5SzAKaIeFXXwPNq8YAtIDuSS6IqsLv8LJJ9h8d2BBs6dMtlpZAZCbb6KJXzKimUc7SZBsG3llgri5R0Nz5NZAno2LfBZA85jlfBRkMxlfDxqpJlV1TW9GZApIfzZAoLrSqGoiHRp3ee0fr3u0E1OA49P6vp86wp6d9VIWK4yDZAJuZBupguc44wBNOe04ZC';
        
        

        // Create Guzzle client
        $client = new Client([
            'base_uri' => 'https://graph.facebook.com/v19.0/',
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ]
        ]);

        $pendingLogs = MessageLog::where('status', 'pending')->take(100)->get(); // Get pending email logs in batches of 10

        foreach ($pendingLogs as $log) {
            $contact = Contact::find($log->contact_id);
            if ($contact) {
                $template = MessageTemplate::find($log->message_template_id);
                if ($template) {
                    $templateData = $template->json;              
                    $templateData = str_replace('{{phone_number}}', $contact->phone, $templateData);
     
                    $messageData = json_decode($templateData);
                         
                    try {
                        $response = $client->post('368263343018482/messages', [
                            'json' => $messageData
                        ]);

                        if ($response->getStatusCode() === 200) {
                            $log->update(['status' => 'success']);
                            return redirect()->back()->with('completed', 'Message sent successfully.');
                        } else {
                            return redirect()->back()->with('error', 'Failed to send message to' . $contact . '.');
                        }
                    } catch (Exception $e) {
                        return redirect()->back()->with('error', 'Error sending message to' . $contact . ':' . $e->getMessage() . '.');
                    }
                }
            }
        }
    }

    public function sendMail(Request $request)
    {
        $templateId = $request->input('template_id');
        if ($request->input('select_all') == "yes") {
            $contacts = Contact::all();
        } else {
            $contactIds = $request->input('contact_ids');

            if (is_array($contactIds) && count($contactIds) > 0) {
                $contacts = Contact::whereIn('id', $contactIds)->get();
            }
        }
        foreach ($contacts as $contact) {
            EmailLog::create([
                'contact_id' => $contact->id,
                'email' => $contact->email,
                'status' => 'pending',
                'email_template_id' => $templateId
            ]);
        }

        return redirect()->back()->with('completed', 'Emails scheduled successfully to selected contacts.');
    }

    public function sendEmails()
    {
        $pendingLogs = EmailLog::where('status', 'pending')->latest('updated_at')->take(1)->get(); // Get pending email logs in batches of 10
       
        foreach ($pendingLogs as $log) {
            $contact = Contact::find($log->contact_id);
            if ($contact) {
                // Fetch the email template data including JSON
                $template = EmailTemplate::find($log->email_template_id);

                if ($template) {
                       
                    $templateData = [
                        'subject' => $template->subject,
                        'content' => $template->json, // Assuming json_data contains the HTML content
                    ];
                    $templateData['content'] = str_replace('{{first_name}}', $contact->first_name, $templateData['content']);
                    $templateData['content'] = str_replace('{{last_name}}', $contact->last_name, $templateData['content']);
                    $templateData['content'] = str_replace('{{company_name}}', $contact->company->name, $templateData['content']);

                    Mail::to($contact->email)->send(new ContactMail($contact, $templateData));
                    $log->update(['status' => 'success']);
                }
            }
        }

        return redirect()->back()->with('completed', 'Emails sent successfully to selected contacts.');
    }
}
