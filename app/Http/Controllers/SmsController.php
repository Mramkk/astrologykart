<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

class SmsController extends Controller
{
    // public $profile_id = 104913;
    // public $entity_id = 1707168872513223294;
    // public $api_key = '010t031y30L931bveLCp';
    // public $sender_id = 'ASTRKT';
    
    public $profile_id = 104913;
    public $entity_id = 1701163048507202808;
    // public $api_key = '010w43ls0c0jGSIqk7aF';
    public $api_key = '010Hg5UH30qPLWSgcjdL';
    public $sender_id = 'ASTRKT';

    public $mobile_number = '';
    public $message1 = '';
    public $message2 = '';
    public $message_txt = '';

    public function mobile($mobile)
    {
        $this->mobile_number = $mobile;
    }

    public function message($message)
    {
        $this->message1 = $message;
    }

    public function second_message($message)
    {
        $this->message2 = $message;
    }

    public function message_type($type)
    {
        switch($type){
            case 'LOGIN_OTP':
                $this->message_txt = 'Verify your mobile number on Astrology Kart with OTP. ' . $this->message1 . ' ASTRKT&templateid=1707163133451512408';
                break;
            case 'EXTRA':
                $this->message_txt ='Dear {#var#}, Your application has been submitted successfully.Kindly login https://astrologykart.com/ to Complete your profile. Your Login Details: Mobile: {#var#} Password: {#var#} For any enquiry Call Us {#var#} &templateid=1707163135305531847';
                break;
            default:
                $this->message_txt = '';
                break;
        }
    }

    public function send()
    {
        if (!empty($this->mobile_number) and !empty($this->message_txt)) {
            Http::get('http://nimbusit.info/api/pushsms.php?user='.$this->profile_id.'&key='.$this->api_key.'&sender='.$this->sender_id.'&mobile='.$this->mobile_number.'&text='.$this->message_txt.'&entityid='.$this->entity_id);
            return true;
        } else {
            return false;
        }
    }
}

// http://nimbusit.info/api/pushsms.php?user=104913&key=010t031y30L931bveLCp&sender=ASTRKT&mobile=7004019567&text=Verify your mobile number on Astrology Kart with OTP. 4512&entityid=1701163048507202808&templateid=1707163133436854489
