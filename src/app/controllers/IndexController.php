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

            $client = new Client([
                'base_uri' => 'http://api.weatherapi.com/v1/',
            ]);
    
            $response = $client->request('GET', 'search.json?q='.$item.'&key=0bab7dd1bacc418689b143833220304');
            $response = json_decode($response->getbody(), true);

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

        $client = new Client([
            'base_uri' => 'http://api.weatherapi.com/v1/',
        ]);

        $response = $client->request('GET', 'current.json?q='.$name.'&key=0bab7dd1bacc418689b143833220304');
        $response = json_decode($response->getbody(), true);
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

        $client = new Client([
            'base_uri' => 'http://api.weatherapi.com/v1/',
        ]);

        $response = $client->request('GET', 'current.json?q='.$name.'&key=0bab7dd1bacc418689b143833220304');
        $response = json_decode($response->getbody(), true);

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

        $client = new Client([
            'base_uri' => 'http://api.weatherapi.com/v1/',
        ]);

        $response = $client->request('GET', 'forecast.json?q='.$name.'&days='.$days.'&key=0bab7dd1bacc418689b143833220304');
        $response = json_decode($response->getbody(), true);

        // echo '<pre>';
        // print_r($response);
        // echo '</pre>';
        // die;
        $this->view->data = $response;
    }

    public function timezoneAction()
    {
        $name = $this->request->get('id');
         
        $client = new Client([
            'base_uri' => 'http://api.weatherapi.com/v1/',
        ]);

        $response = $client->request('GET', 'forecast.json?q='.$name.'&key=0bab7dd1bacc418689b143833220304');
        $response = json_decode($response->getbody(), true);
        // echo '<pre>';
        // print_r($response);
        // echo '</pre>';
        // die;
        $this->view->data = $response;
    }

    public function sportsAction()
    {
        $name = $this->request->get('id');

        $client = new Client([
            'base_uri' => 'http://api.weatherapi.com/v1/',
        ]);

        $response = $client->request('GET', 'sports.json?q='.$name.'&key=0bab7dd1bacc418689b143833220304');
        $response = json_decode($response->getbody(), true);

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

        $client = new Client([
            'base_uri' => 'http://api.weatherapi.com/v1/',
        ]);

        $response = $client->request('GET', 'astronomy.json?q='.$name.'&dt='.$temp[0].'&key=0bab7dd1bacc418689b143833220304');
        $response = json_decode($response->getbody(), true);

        // echo '<pre>';
        // print_r($response);
        // echo '</pre>';
        // die;
        $this->view->data = $response;
    }

    public function airqualityAction()
    {
        $name = $this->request->get('id');

        $client = new Client([
            'base_uri' => 'http://api.weatherapi.com/v1/',
        ]);

        $response = $client->request('GET', 'current.json?q='.$name.'&aqi=yes&key=0bab7dd1bacc418689b143833220304');
        $response = json_decode($response->getbody(), true);
        // echo '<pre>';
        // print_r($response);
        // echo '</pre>';
        // die;
        $this->view->data = $response;
    }
}
