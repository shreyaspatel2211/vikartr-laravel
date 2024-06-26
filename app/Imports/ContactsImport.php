<?php

namespace App\Imports;

use App\Models\Contact;
use App\Models\Company;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Find or create the company
        $company = Company::firstOrCreate(
            ['name' => $row['company'],
             'code' => $row['company']]
        );

        $names = explode(' ', $row['full_name'], 2);
        $firstName = $names[0];
        $lastName = isset($names[1]) ? $names[1] : '';

        // Create the contact
        return new Contact([
            'first_name'  => $firstName,
            'last_name'   => $lastName,
            'email'       => $row['email'],
            'address'     => $row['address'],
            'company_id'  => $company->id
        ]);
    }
}
