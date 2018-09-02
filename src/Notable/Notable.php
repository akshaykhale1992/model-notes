<?php

namespace AkshayKhale1992\ModelNote;

trait Notable {

	public function notes()
    {
        return $this->morphMany('AkshayKhale1992\ModelNote\ModelNote', 'notable');
    }

    public function getNotableClass()
    {
        return static::class;
    }

    public function addNote($creatable, $note)
    {
		$this->notes()->make(['note' => $note])
			->creatable()->associate($creatable)
			->save();
    }

    public function getNotesBy($creatable)
    {
        return $this->notes
            ->where('creatable_type', $creatable->getCreatableClass())
            ->where('creatable_id', $creatable->id);
    }
}