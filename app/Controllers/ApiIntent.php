<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ChatModel;
use DB;
use Google\Cloud\Dialogflow\V2\SessionsClient;
use Google\Cloud\Dialogflow\V2\TextInput;
use Google\Cloud\Dialogflow\V2\QueryInput;

class ApiIntent extends BaseController
{
	protected $format = 'json';
    protected $modelname = 'App\Models\ChatModel';

    public function __construct()
    {
        $this->mchat = new ChatModel();
        $db  = \Config\Database::connect();
    }

	public function tambahpesan()
	{
		$pesanuser = $this->request->getPost('pesan_chat');
        $pesanbot = $this->request->getPost('response_pesan');

		$data = [
            'pesan_chat'=>$pesanuser,
            'response_pesan'=>$pesanbot,
		];

		if(!empty($data)){
			return $this->detectIntent($pesanuser,$pesanbot);
		}

        if ($data != null) {
			$response['sukses'] = true;
            $response['status'] = 1;
			$response['pesan'] = 'Data Berhasil disimpan';
            $response['id_chat'] = $this->mchat->insert($data);
			return $this->respond($response,200);

        }else {
            $response['sukses'] = false;
            $response['status'] = 0;
			$response['pesan'] = 'Data gagal disimpan';
			return $this->respond($response,500);
        }	
	}

	public function detectIntent($pesanuser, $pesanbot)
	{
 
		$sessionsClient = new SessionsClient();
		$sessionId = uniqid();
		$session = $sessionsClient->sessionName(PROJECT_ID, $sessionId);
 
		$textInput = new TextInput();
		$textInput->setText($pesanuser);
		$textInput->setLanguageCode('id');
 
		$queryInput = new QueryInput();
		$queryInput->setText($pesanuser);
 
		$response = $sessionsClient->detectIntent($session, $queryInput);
 
		$queryResult = $response->getQueryResult();
		$queryText = $queryResult->getQueryText();
		$intent = $queryResult->getIntent();
		$displayName = $intent->getDisplayName();
		$confidence = $queryResult->getIntentDetectionConfidence();
		$fulfilmentText = $queryResult->getFulfillmentText();
 
		$result = [
			'session_id' => $sessionId,
			'confidence' => $confidence,
			'text_input' => $queryText,
			'text_response' => $fulfilmentText,
			'intent' => $displayName,
		];
 
		return json_encode($result);
	}
	public function insertChatToDb($pertanyaan, $jawaban, $intent)
	{
		$date = Time::now();
		$this->mchat->save([
			'pesan_chat' => $pertanyaan,
			'response_pesan' => $jawaban,
			'intent' => $intent,
			'created_at' => $date
		]);
	}



}
