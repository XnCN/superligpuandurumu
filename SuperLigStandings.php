<?php


namespace XnCN\Standings;


class SuperLigStandings
{
    private $data;
    public function  __construct()
    {
        $this->getData();
    }

    /**
     * @return Raw api data
     */
    public function getRawData(){
        return $this->data;
    }

    /**
     * This function return Team Names
     * Returned values are name,middleName,ShortName
     * @return Team Array
     */
    public function getTeamNames(){
        $teamNames = array();
        foreach ($this->data as $data) {
            $team = new Team();
            $team->name = $data->name;
            $team->middleName = $data->middleName;
            $team->shortName = $data->shortName;
            array_push($teamNames,$team);
        }
        return $teamNames;
    }

    /**
     * This function return Simple fixture data
     * Returned values are name,shortName,position,points
     * @return Team Array
     */
    public function getSimpleStandings(){
        $standings = array();
        foreach ($this->data as $data) {
            $team = new Team();
            $team->name = $data->name;
            $team->shortName = $data->shortName;
            $team->position = $data->position;
            $team->points = $data->points;
            array_push($standings,$team);
        }
        return $standings;
    }

    /**
     * This function return SuperLig Fixture
     * Returned values are name,middleName,shortName,position,points,against,average,lost,won,played,logo
     * @return Team Array
     */
    public function getStandings(){
        $standings = array();
        foreach ($this->data as $data) {
            $team = new Team();
            $team->name = $data->name;
            $team->middleName = $data->middleName;
            $team->shortName = $data->shortName;
            $team->position = $data->position;
            $team->points = $data->points;
            $team->against = $data->against;
            $team->average = $data->average;
            $team->lost = $data->lost;
            $team->played = $data->played;
            $team->won = $data->won;
            $team->logo = $this->generateTeamLogo($data->id);
            array_push($standings,$team);
        }
        return $standings;
    }

    /**
     * @param $teamId
     * This function generate team logo url
     * @return Team logo url
     */
    private function generateTeamLogo($teamId){
        return  "https://cdn.broadage.com/images-teams/soccer/18x18/{$teamId}.png";
    }

    /**
     *This function get data from ntvspor
     */
    private function getData(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://brdg-d2d66d21-7796-4d6c-a6d5-7fee80f9d915.azureedge.net/soccer/widget/standings');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"tId\":1,\"stId\":0,\"calculation\":\"overall\",\"options\":{\"lang\":\"tr-TR\",\"origin\":\"ntvspor.net\",\"forceFullData\":true,\"timeZone\":3}}");
        curl_setopt($ch, CURLOPT_POST, 1);
        $headers = array(
            'Referer: https://www.ntvspor.net/futbol/lig/spor-toto-super-lig/puan-durumu',
            'Origin: https://www.ntvspor.net',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.48 Safari/537.36 Edg/74.1.96.24',
            'Content-Type: application/json'
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        if (curl_errno($ch))
            echo 'Error:' . curl_error($ch);
        curl_close ($ch);
        $this->data = json_decode($result)->data->initialData[0];
    }
}

class Team{
    public $name;
    public $middleName;
    public $shortName;
    public $points;
    public $average;
    public $against;
    public $scored;
    public $lost;
    public $won;
    public $played;
    public $position;
    public $logo;
}
