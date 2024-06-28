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
use App\Models\MessageLog;
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
    public function index(ContactDataTable $dataTable)
    {
        return $dataTable->render('admin.contact.index');
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
                'status' => 'pending'
            ]);
        }
    
        return redirect()->back()->with('completed', 'Messages scheduled successfully to selected contacts.');
    }

    public function sendMessages()
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

        // Create Guzzle client
        $client = new Client([
            'base_uri' => 'https://graph.facebook.com/v19.0/',
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ]
        ]);

        $pendingLogs = MessageLog::where('status', 'pending')->take(10)->get(); // Get pending email logs in batches of 10

        foreach ($pendingLogs as $log) {
            $contact = Contact::find($log->contact_id);
            if ($contact) {
                try {
                    $response = $client->post('368263343018482/messages', [
                        'json' => array_merge($messageData, ['to' => $contact])
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

    public function sendMail(Request $request)
    {
        if ($request->input('select_all') == "yes") {
            $contacts = Contact::all();
        } else {
            $contactIds = $request->input('contact_ids');

            if (is_array($contactIds) && count($contactIds) > 0) {
                $contacts = Contact::whereIn('id', $contactIds)->get();
            }
        }
        foreach ($contacts as $contact) {
            if (!EmailLog::where('email',$contact->email)->where('status','pending')->first()) {
                EmailLog::create([
                    'contact_id' => $contact->id,
                    'email' => $contact->email,
                    'status' => 'pending'
                ]);
            }
        }

        return redirect()->back()->with('completed', 'Emails scheduled successfully to selected contacts.');
    }

    public function sendEmails()
    {
        $pendingLogs = EmailLog::where('status', 'pending')->take(10)->get(); // Get pending email logs in batches of 10

        foreach ($pendingLogs as $log) {
            $contact = Contact::find($log->contact_id);
            if ($contact) {
                Mail::to(trim($contact->email))->send(new ContactMail($contact));
                $log->update(['status' => 'success']);
            }
        }

        return redirect()->back()->with('completed', 'Emails sent successfully to selected contacts.');
    }
}
