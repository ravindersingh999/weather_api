<?php

use Phalcon\Mvc\Controller;
use GuzzleHttp\Client;


class IndexController extends Controller
{
    public function indexAction()
    {
        if ($this->request->get('search')) {
            $name = $this->request->getPost('item');
            $temp = explode(" ", $name);
            $item = implode("+", $temp);

            $url = "http://api.weatherapi.com/v1/search.json?q=$item&key=0bab7dd1bacc418689b143833220304";

            // Initialize a CURL session.
            $ch = curl_init($url);

            //grab URL and pass it to the variable.
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = json_decode(curl_exec($ch), true);

            $this->view->data = $response;

            // echo '<pre>';
            // print_r($response);
            // echo '</pre>';
            // die;
        }
    }

    public function detailsAction()
    {
        $id = $this->request->get('id');
        $temp = explode('-', $id);
        $name = implode('+', $temp);

        $url = "http://api.weatherapi.com/v1/current.json?q=$name&key=0bab7dd1bacc418689b143833220304";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch), true);

        // echo '<pre>';
        // print_r($response);
        // echo '</pre>';
        // die;
        $this->view->data = $response;
        $this->view->url = $id;
    }

    public function currentAction()
    {
        $name = $this->request->get('id');
        
        $url = "http://api.weatherapi.com/v1/current.json?q=$name&key=0bab7dd1bacc418689b143833220304";
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch), true);
        
        // echo '<pre>';
        // print_r($response);
        // echo '</pre>';
        // die;
        $this->view->data = $response;
    }

    public function forecastAction()
    {
        $name = $this->request->get('id');
        $days = $this->request->get('days');
        $url = "http://api.weatherapi.com/v1/forecast.json?q=$name&days=$days&key=0bab7dd1bacc418689b143833220304";
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch), true);
        
        // echo '<pre>';
        // print_r($response);
        // echo '</pre>';
        // die;
        $this->view->data = $response;
    }

    public function timezoneAction()
    {
        $name = $this->request->get('id');
        $url = "http://api.weatherapi.com/v1/forecast.json?q=$name&key=0bab7dd1bacc418689b143833220304";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch), true);
        
        // echo '<pre>';
        // print_r($response);
        // echo '</pre>';
        // die;
        $this->view->data = $response;
    }

    public function sportsAction()
    {
        $name = $this->request->get('id');
        $url = "http://api.weatherapi.com/v1/sports.json?q=$name&key=0bab7dd1bacc418689b143833220304";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch), true);
        
        // echo '<pre>';
        // print_r($response);
        // echo '</pre>';
        // die;
        $this->view->data = $response;
    }

    public function astronomyAction()
    {
        $name = $this->request->get('id');
        $date = $this->request->get('date');
        $temp = explode(" ", $date);

        $url = "http://api.weatherapi.com/v1/astronomy.json?q=$name&dt=$temp[0]&key=0bab7dd1bacc418689b143833220304";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch), true);
        
        // echo '<pre>';
        // print_r($response);
        // echo '</pre>';
        // die;
        $this->view->data = $response;
    }

    public function airqualityAction()
    {
        $name = $this->request->get('id');
        $url = "http://api.weatherapi.com/v1/current.json?q=$name&aqi=yes&key=0bab7dd1bacc418689b143833220304";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch), true);
        
        // echo '<pre>';
        // print_r($response);
        // echo '</pre>';
        // die;
        $this->view->data = $response;
    }
}
