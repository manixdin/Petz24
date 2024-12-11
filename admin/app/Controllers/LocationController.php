<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class LocationController extends BaseController
{
    use ResponseTrait;

    public function saveLocation()
    {
        // Get the data from the POST request
        $input = $this->request->getJSON();

        if (isset($input->latitude) && isset($input->longitude)) {
            // Save or process the location here
            $latitude = $input->latitude;
            $longitude = $input->longitude;

            // Example: Log the location (replace this with your database logic)
            log_message('info', "User location: Latitude {$latitude}, Longitude {$longitude}");

            // Respond back to the frontend
            return $this->respond(['message' => 'Location saved successfully!'], 200);
        }

        return $this->fail('Invalid location data received.', 400);
    }
}
