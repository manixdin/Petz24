<?php

namespace App\Controllers;

use Razorpay\Api\Api;
use CodeIgniter\API\ResponseTrait;
use Config\Razorpay;

class RazorpayController extends BaseController
{
    use ResponseTrait;

    private $api;

    public function __construct()
    {
        $razorpayConfig = new Razorpay();
        $this->api = new Api($razorpayConfig->keyId, $razorpayConfig->keySecret);
    }

    // Create Razorpay Order
    public function createOrder()
    {
        try {
            $orderData = [
                'receipt'         => 'order_rcptid_' . time(),
                'amount'          => 50000, // Amount in paise (₹500)
                'currency'        => 'INR',
                'payment_capture' => 1 // Auto capture payment
            ];

            $razorpayOrder = $this->api->order->create($orderData);
            return $this->respond(['order_id' => $razorpayOrder['id'], 'key' => (new Razorpay())->keyId], 200);

        } catch (\Exception $e) {
            return $this->failServerError($e->getMessage());
        }
    }

    // Verify Payment
    public function verifyPayment()
    {
        $request = $this->request->getJSON();

        $razorpayPaymentId = $request->razorpay_payment_id;
        $razorpayOrderId   = $request->razorpay_order_id;
        $razorpaySignature = $request->razorpay_signature;

        try {
            $generatedSignature = hash_hmac('sha256', $razorpayOrderId . '|' . $razorpayPaymentId, (new Razorpay())->keySecret);

            if ($generatedSignature === $razorpaySignature) {
                return $this->respond(['status' => 'success', 'message' => 'Payment Verified'], 200);
            } else {
                return $this->failUnauthorized('Invalid Signature');
            }
        } catch (\Exception $e) {
            return $this->failServerError($e->getMessage());
        }
    }
}
