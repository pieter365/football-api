<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class FootballController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the live page on the blade view
     */
    public function live() {
        return view('football.live.home');
    }

    /**
     * Get the live football events, format for the homepage and display
     *
     */
    public function liveEvents() {

        $data = $this->getApiData('football/live?primaryMarkets=true');  
        $formattedLayout = $this->homepageLiveFormat($data);
        echo $this->jsonEncode($formattedLayout);
    }

    /**
     * Get the live football events, format for the homepage and display
     *
     */
    public function liveMainMarket($eventId) {

        $data = $this->getApiData('football/live?primaryMarkets=true');  
        $formattedLayout = $this->homepageMainMarketFormat($data);
        echo $this->jsonEncode($formattedLayout);
    }

    /**
     * Get the events from the sportsbook
     *
     * @return $eventForGame Events for a match
     * @param $eventId ID for the specific event
     */
    public function events($eventId) {
        $eventForGame = $this->getApiData('sportsbook/event/'.$eventId);  
        return $eventForGame;
    }

    /**
     * Get the market from the sportsbook
     *
     * @return $marketForGame Market for a match
     * @param $marketId ID for the specific market
     */
    public function getMarketId($marketId) {
        $eventForGame = $this->getApiData('sportsbook/market/'.$marketId);  
        return $marketForGame;
    }

    /**
     * Get the main markets from the events
     *
     * @return $marketList Market for a list
     * @param $data API coming in 
     */
    public function homepageMainMarketFormat($data) {
        $market = array();

        $footballMainMarket = $this->jsonDecode($data);
        $marketList = $footballMainMarket['markets'];

        return $marketList;

    }    

    /**
     * Reformat the incoming API to suit our frontpage display
     *
     * @return $live outgoing API formatted
     * @param $data incoming API format
     */
    public function homepageLiveFormat($data) {
        $live = array();

        $footballLive = $this->jsonDecode($data);
        $footballLive = array_shift($footballLive);

        foreach($footballLive as $game => $event){

          $linkedEventId = '';
          $linkedEventTypeName = '';

            if (!empty($event['linkedEventId'])) {
              $linkedEventId = $event['linkedEventId'];
            }
            if (!empty($event['linkedEventTypeName'])) {
              $linkedEventTypeName = $event['linkedEventTypeName'];
            }
            
            $live[] = array(
                'eventId' => $event['eventId'], 
                'name' => $event['name'],  
                'linkedEventId' => $linkedEventId, 
                'linkedEventTypeName' => $linkedEventTypeName, 
                'typeId' => $event['typeId'], 
                'startDate' => date('Y-m-d', strtotime($event['startTime'])),  
                'startTime' => date('H:i', strtotime($event['startTime'])),
                'scoreHome' => $event['scores']['home'], 
                'scoreAway' => $event['scores']['away'], 
                'teamHome' => $event['competitors'][0]['name'], 
                'teamAway' => $event['competitors'][1]['name'],  
                'status_active' => $event['status']['active'], 
                'status_started' => $event['status']['started'], 
                'status_live' => $event['status']['live'], 
                'status_resulted' => $event['status']['resulted'], 
                'status_finished' => $event['status']['finished'], 
                'status_cashoutable' => $event['status']['cashoutable'], 
                'status_displayable' => $event['status']['displayable'], 
                'status_suspended' => $event['status']['suspended'], 
                'status_requestabet' => $event['status']['requestabet'], 
                'boostCount' => $event['boostCount'], 
                'superBoostCount' => $event['superBoostCount']
              );
        }

        return $live;
    }

    /**
     * Fetch the API data and get the body
     *
     * @return $result
     */
    public function getApiData($requestSection)
    {
      $client = new Client();
      $res = $client->request('GET', $_ENV['FOOTBALL_API'].$requestSection, []);
      $result = '';

      try {
            $result = $res->getBody();
   
        } catch (Exception $e) {
            throw new Exception("API: error on fetch.", 0, $e);
        }

      return $result;

    }

    /**
     * Decode the JSON
     *
     * @return $data
     */
    public function jsonDecode($data) {
        return json_decode($data, true);
    }  

    /**
     * Encode the JSON
     *
     * @return $data
     */
    public function jsonEncode($data) {
        return json_encode($data);
    }  

}
