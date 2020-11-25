<?php



class NoteDB implements INote
{
    private $db;
    public function __construct()
    {
        $this->db = DB::connection();
    }
    public function getList()
    {
        $sql = "SELECT * FROM notes";
        $stmt = $this->db->query($sql);
        $stmt->execute();
        $items = $stmt->fetchAll();
        $notes = [];
        foreach ($items as $key => $item) {
            $note = new Note($item["title"]);
            $note->setId($item["id"]);
            $note->setContent($item["content"]);
            $note->setType($item["type_id"]);
            array_push($notes, $note);
        }
        return $notes;
    }
}