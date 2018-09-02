<?php

namespace AkshayKhale1992\ModelNote;

use Illuminate\Database\Eloquent\Model;

class ModelNote extends Model
{
	public $fillable = ['note'];
	
	public function notable()
	{
		return $this->morphTo();
	}

	public function creatable()
	{
		return $this->morphTo();
	}
}
