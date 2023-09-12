<?php

class OtdelMap extends BaseMap
{
    function arrOtdels()
    {
        $res = $this->db->query("SELECT otdel_id AS id, name AS
        value FROM otdel");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}