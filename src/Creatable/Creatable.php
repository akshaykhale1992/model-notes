<?php

namespace AkshayKhale1992\ModelNote;

trait Creatable {
	
	public function createdNotes()
    {
        return $this->morphMany('AkshayKhale1992\ModelNote\ModelNote', 'creatable');
    }

    public function getCreatableClass()
    {
        return static::class;
    }

    public function addingNoteTo($notable, $note)
    {
		$this->createdNotes()->make(['note' => $note])
			->notable()->associate($notable)
			->save();
    }

    public function getNotesOn($notable)
    {
        return $this->createdNotes
            ->where('notable_type', $notable->getNotableClass())
            ->where('notable_id', $notable->id);
    }
}