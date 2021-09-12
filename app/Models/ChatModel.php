<?php

namespace App\Models;

use CodeIgniter\Model;

class ChatModel extends Model
{
	
	protected $table                = 'chat_bot';
	protected $primaryKey           = 'id';
	protected $returnType           = 'object';
	protected $useTimestamps        = true;
	
	protected $allowedFields        = ['pesan_chat','response_pesan','intent','created_at'];

	// Dates


}
