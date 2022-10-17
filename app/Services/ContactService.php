<?php

namespace App\Services;

use App\Models\Cv;

/**
 * Class DeleteCvService
 * @package App\Services
 */
class ContactService
{
    public function message($contact)
    {
        if ($contact) {
            # code...
            $json['code'] = 1;
            $json['message'] = 'Contact Sent successfully please wait!';
        } else {
            # code...
            $json['code'] = 2;
            $json['message'] = 'Error while saving details';
        }
        return response()->json($json);
    }
}
