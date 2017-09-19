<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FantaisieDataSoccer {

	private $base_url;
    private $send_url;
    private $api_key;
    private $header;
    private $format;
    private $format_valid;
    private $reponse;
    private $params;

    public function __construct()
    {
        $this->api_key = 'cef904c8307f44faa57d88aeeb79c9f9';
        $this->format_valid = array('json','xml');
        $this->base_url = 'https://api.fantasydata.net/v3/soccer/scores/';
        $this->header = array();
        $this->header[] = 'Ocp-Apim-Subscription-Key: '.$this->api_key;
        $this->params = array();
    }

    private function check_format($format) {
        if(!in_array($format,$this->format_valid)) throw new Exception('Format is not valid. Must be set as one of the following: '.implode(', ',$this->format_valid).'');
        return $format;
    }

    private function check_date($request_date) {
        $d_compare = DateTime::createFromFormat('Y-m-d', $request_date);
        if (!is_object($d_compare)) throw new Exception('Date is not valid.');
        if(strtolower($d_compare->format('Y-m-d')) != strtolower($request_date)) throw new Exception('Date Format is not valid. Must be sent as Y-m-d, for example 2016-10-23');
        return $request_date;
    }

    public function getReponse()
    {
        $reponse_tab = json_decode($this->reponse, true);
        return $reponse_tab;
    }

    public function Areas($format = 'json')
    {
        $format = $this->check_format($format);

        $this->send_url = $this->base_url.$format.'/Teams';

        return $this->send();
    }

    public function CompetitionDetails($competiton, $format = 'json')
    {
        $format = $this->check_format($format);

        $this->send_url = $this->base_url.$format.'/CompetitionDetails/'.$competiton;

        return $this->send();
    }

    public function CompetitionHierarchy($format = 'json')
    {
        $format = $this->check_format($format);

        $this->send_url = $this->base_url.$format.'/CompetitionHierarchy';

        return $this->send();
    }

    public function Competitions($format = 'json')
    {
        $format = $this->check_format($format);

        $this->send_url = $this->base_url.$format.'/Competitions';

        return $this->send();
    }

    public function GamesByDate($date, $format = 'json')
    {
        $format = $this->check_format($format);
        $request_date = $this->check_date($date);

        $this->send_url = $this->base_url.$format.'/GamesByDate/'.$date;

        return $this->send();
    }

    public function Player($playerId, $format = 'json')
    {
        $format = $this->check_format($format);

        $this->send_url = $this->base_url.$format.'/Player/'.$playerId;

        return $this->send();
    }

    public function Players($format = 'json')
    {
        $format = $this->check_format($format);

        $this->send_url = $this->base_url.$format.'/Players';

        return $this->send();
    }

    public function PlayersByTeam($teamId, $format = 'json')
    {
        $format = $this->check_format($format);

        $this->send_url = $this->base_url.$format.'/PlayersByTeam/'.$teamId;

        return $this->send();
    }

    public function Schedule($roundId, $format = 'json')
    {
        $format = $this->check_format($format);

        $this->send_url = $this->base_url.$format.'/Schedule/'.$roundId;

        return $this->send();
    }

    public function TeamGameStatsByDate($date, $format = 'json')
    {
        $format = $this->check_format($format);
        $request_date = $this->check_date($date);

        $this->send_url = $this->base_url.$format.'/TeamGameStatsByDate/'.$date;

        return $this->send();
    }

    public function SeasonTeams($seasonId, $format = 'json')
    {
        $format = $this->check_format($format);

        $this->send_url = $this->base_url.$format.'/SeasonTeams/'.$seasonId;

        return $this->send();
    }

    public function Standings($roundId, $format = 'json')
    {
        $format = $this->check_format($format);

        $this->send_url = $this->base_url.$format.'/Standings/'.$roundId;

        return $this->send();
    }

    public function TeamSeasonStats($roundId, $format = 'json')
    {
        $format = $this->check_format($format);

        $this->send_url = $this->base_url.$format.'/TeamSeasonStats/'.$roundId;

        return $this->send();
    }

    public function Teams($format = 'json')
    {
        $format = $this->check_format($format);

        $this->send_url = $this->base_url.$format.'/Teams';

        return $this->send();
    }

    public function Venues($format = 'json')
    {
        $format = $this->check_format($format);

        $this->send_url = $this->base_url.$format.'/Venues';

        return $this->send();
    }


    public function send()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->header);
        curl_setopt($curl, CURLOPT_URL, $this->send_url);
        curl_setopt ($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $this->reponse = curl_exec($curl);
        if(curl_errno($curl)) {
            throw new exception (curl_error($curl).'<br/>'.curl_getinfo($curl));
        }
        //Fin de Curl
        curl_close($curl);
        unset($curl);

        if (!is_null($this->reponse)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}