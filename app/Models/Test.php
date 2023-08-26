<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Mail\Attachable;


class Test extends Model implements Attachable
{
    use HasFactory;
    protected $fillable =['title'];

    public function toMailAttachment():Attachment
    {

        return  Attachment::fromStorage( 'reyath.JPG')->as('imagefromModle') ;

    }
}
