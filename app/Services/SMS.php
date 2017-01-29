<?php

namespace App\Services;

use Carbon;
use App\Models\SmsLog;

class SMS {

    /**
     * SMS constructor.
     */
    public function __construct() {
        
    }

    /**
     * Send SMS
     *
     * @param string $mobileNumber        	
     * @param string $textMsg        	
     * @param string $vendor        	
     * @return boolean
     */
    public function sendSms($mobileNumber, $textMsg, $vendor = 'mvaayoo') {
        // open connection
        $ch = curl_init();
        if ($vendor === 'mvaayoo') {
            $senderID = config('sms.sender_id');
            $user = config('sms.user_name') . ':' . config('sms.password');

            // set the url, POST data
            curl_setopt($ch, CURLOPT_URL, config('sms.base_url'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$mobileNumber&msgtxt=$textMsg");
        }
        // execute post
        $buffer = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Close connection
        curl_close($ch);
        return $this->smsDeliveryStatus($buffer, $vendor);
    }

    /**
     * Get the random generated integer for OTP.
     *
     * @return number
     */
    public function generateOtp() {
        return rand(1000, 9999);
    }

    /**
     * Log into DB
     *
     * @param string $mobileNumber        	
     * @param string $message        	
     * @param string $vendor        	
     * @param string $type        	
     * @param integer $status        	
     * @param mixed $userId        	
     */
    public function log($mobileNumber, $message, $type, $status, $userId = null, $vendor = 'mvaayoo') {
        $smsLog = SmsLog::create([
                    'mobile_number' => $mobileNumber,
                    'message' => $message,
                    'vendor' => $vendor,
                    'type' => $type,
                    'status' => $status,
                    'user_id' => $userId,
                    'created_at' => Carbon::now()
        ]);
    }

    /**
     * Get SMS delivery status
     */
    private function smsDeliveryStatus($buffer, $vendor = 'mvaayoo') {
        if ($vendor === 'mvaayoo') {
            $return = false;
            if (!empty($buffer)) {
                $return = true;
            }
        }
        return $return;
    }

}
