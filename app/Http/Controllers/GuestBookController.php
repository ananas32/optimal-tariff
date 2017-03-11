<?php

namespace App\Http\Controllers;


use App\GuestBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class GuestBookController extends Controller
{
    // content page guest book
    public function index(GuestBook $guestBook)
    {
        $guestBookList = $guestBook->getListGuestBook();

        $data = [
            'guestBookList' => $guestBookList,
            'title' => trans('pages.guest_book')
        ];

        return view('pages.guest-book', $data);
    }

    // create new message guest book
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),
            array(
                'username' => 'required|alpha|max:255',
                'email' => 'required|email|max:255|min:4',
                'message' => 'required|min:20|max:4000'
            )
        );
        if($validator->fails())
        {
            return response()->json([
                'message' => $validator->messages()
            ]);
        }
        else
        {
            $guestBook = new GuestBook();
            $guestBook->username = $request['username'];
            $guestBook->email = $request['email'];
            $guestBook->message = $request['message'];
            $guestBook->ip_address = $request->ip();
            $guestBook->save();
            return response()->json([
                'message' => "Message is create)"
            ]);
        }
    }

}

