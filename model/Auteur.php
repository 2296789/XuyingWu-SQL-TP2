<?php
class Auteur extends CRUD{
    protected $table = 'auteur';
    protected $primaryKey = 'id';
    protected $fillable = ['auteur'];
}
?>