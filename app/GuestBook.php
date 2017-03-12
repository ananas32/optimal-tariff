<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestBook extends Model
{
    protected $table = 'guest_book';

    public function getListGuestBook()
    {
        return GuestBook::select('username', 'email', 'message', 'answer', 'created_at')
            ->orderBy('id', 'DESC')
            ->paginate(10);
    }

    public function getCountGuestBookMessage()
    {
        return GuestBook::count();
    }
}
