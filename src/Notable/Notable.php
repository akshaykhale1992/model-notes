<?php

namespace AkshayKhale1992\ModelNote;

trait Notable {
	public function notes()
    {
        return $this->morphMany('AkshayKhale1992\ModelNote\ModelNote', 'notable');
    }

    public function addNote($note)
    {
        $this->notes()->create(['note' => $note]);
    }

}