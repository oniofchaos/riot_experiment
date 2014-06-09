
<?php
/**
 * Helper class for making calls to the Game API.
 */

require_once '/includes/curl_helper.php';

class Game_API extends CURL_Helper {

  // The version number of this API.
  const VERSION_NUMBER = '1.3';

  // The base name of this API.
  const BASE_API_NAME = 'game';

  /**
   * Constructor.
   *
   * @return void
   */
  public function __construct() {
    parent::__construct();

    // Set the version number of this API.
    $this->version_number = self::VERSION_NUMBER;
  }

  /**
   * Make a call to the 'by-name' operation.
   *
   */
  public function get_recent_game_data($summoner_ids, $region) {
    //$api_url = '/' . self::BASE_API_NAME . '/by-summoner/' . htmlentities(implode($this->clean_api_input($summoner_ids), ','));
    //todo move htmlentities into clean api input
    if (is_array($summoner_ids)) {
      $summoner_ids = implode($this->clean_api_input($summoner_ids), ',');
    }
    $api_url = '/' . self::BASE_API_NAME . '/by-summoner/' . htmlentities($summoner_ids) . '/recent';
    return $this->make_api_call($api_url, $region);
  }


}
