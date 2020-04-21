<?php

namespace App\Http\Controllers;

use App\About;
use App\Blog;
use App\Contact;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class BusinessController extends Controller
{
    public function home(){
        return view("business-casual/home");
    }
    public function about(){
        $about = About::all();
        return view("business-casual/about", ['about'=>$about]);
    }
    public function blog(){
        $posts = Blog::all();
        return view("business-casual/blog", ['posts'=>$posts]);
    }

    public function contact(){
        return view("business-casual/contact");
    }

    public function contactNew(Request $request)
    {

        $asunto = 'Conctacto';
        require 'vendor/autoload.php';
        $mensaje = $request->get('message');
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPAuth = true;
        $mail->Username = '16031086@itcelaya.edu.mx';
        $mail->Password = '';
        $mail->setFrom('16031086@itcelaya.edu.mx', 'Contact');
        $mail->addAddress('16031086@itcelaya.edu.mx');
        $mail->Subject = 'Contact';
        $mail->msgHTML($mensaje);
        if (!$mail->send()) {
            echo 'Mailer Error: '. $mail->ErrorInfo;
        }

        $contact = new Contact();
        $contact->name = $request->get('name');
        $contact->email = $request->get('email');
        $contact->message = $request->get('message');
        $contact->phone = $request->get('phone');
        $contact->save();
        return redirect('business-casual/contact')->with('success', 'Registro guardado correctamente');
    }
}
