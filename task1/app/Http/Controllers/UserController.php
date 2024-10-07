<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\ValidationResult;

class UserController extends Controller
{
    public function index()
    {
        return view('newuser');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'required|string',
        ]);

        $phoneUtil = PhoneNumberUtil::getInstance();
        try {
            $phoneNumber = $phoneUtil->parse($request->phone, null);
            $validationResult = $phoneUtil->isPossibleNumberWithReason($phoneNumber);

            if ($validationResult !== ValidationResult::IS_POSSIBLE) {
                $errorMessage = '';

                switch ($validationResult) {
                    case ValidationResult::INVALID_COUNTRY_CODE:
                        $errorMessage = 'The phone number has an invalid country code.';
                        break;
                    case ValidationResult::TOO_SHORT:
                        $errorMessage = 'The phone number is too short for its region.';
                        break;
                    case ValidationResult::TOO_LONG:
                        $errorMessage = 'The phone number is too long for its region.';
                        break;
                    case ValidationResult::IS_POSSIBLE_LOCAL_ONLY:
                        $errorMessage = 'The phone number is valid but only possible locally.';
                        break;
                    case ValidationResult::INVALID_LENGTH:
                        $errorMessage = 'The phone number has an invalid length for its region.';
                        break;
                    default:
                        $errorMessage = 'The phone number is not valid for its region.';
                        break;
                }

                return back()->withErrors(['phone' => $errorMessage])->withInput();
            }

            if (!$phoneUtil->isValidNumber($phoneNumber)) {
                return back()->withErrors(['phone' => 'The phone number is not valid according to its region.'])->withInput();
            }

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $phoneUtil->format($phoneNumber, PhoneNumberFormat::E164),
            ]);

            return redirect()->back()->with('success', 'User created successfully.');
        } catch (NumberParseException $e) {
            return back()->withErrors(['phone' => 'The phone number could not be parsed: ' . $e->getMessage()])->withInput();
        }
    }
}
