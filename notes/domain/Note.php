<?php

class Note
{
    private int $id;
    private string $owner;
    private string $text;
    private string $last_modified;
    private string $login_modified;
    private int $is_private;
    private int $is_modified;

    public function __construct($id, $owner, $text, $last_modified, $login_modified, $is_private, $is_modified){
        $this->id=$id;
        $this->owner=$owner;
        $this->text=$text;
        $this->last_modified=$last_modified;
        $this->login_modified=$login_modified;
        $this->is_private=$is_private;
        $this->is_modified=$is_modified;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getOwner(): string
    {
        return $this->owner;
    }

    /**
     * @param string $owner
     */
    public function setOwner(string $owner): void
    {
        $this->owner = $owner;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getLastModified(): string
    {
        return $this->last_modified;
    }

    /**
     * @param string $last_modified
     */
    public function setLastModified(string $last_modified): void
    {
        $this->last_modified = $last_modified;
    }

    /**
     * @return string
     */
    public function getLoginModified(): string
    {
        return $this->login_modified;
    }

    /**
     * @param string $login_modified
     */
    public function setLoginModified(string $login_modified): void
    {
        $this->login_modified = $login_modified;
    }

    /**
     * @return int
     */
    public function getIsPrivate(): int
    {
        return $this->is_private;
    }

    /**
     * @param int $is_private
     */
    public function setIsPrivate(int $is_private): void
    {
        $this->is_private = $is_private;
    }

    /**
     * @return int
     */
    public function getIsModified(): int
    {
        return $this->is_modified;
    }

    /**
     * @param int $is_modified
     */
    public function setIsModified(int $is_modified): void
    {
        $this->is_modified = $is_modified;
    }

    public static function fromArray($array){
        settype($array['id'], "int");
        settype($array['is_private'], "int");
        settype($array['is_modified'], "int");
        return new static($array['id'], $array['owner'], $array["text"], $array['last_modified'], $array['login_modified'], $array['is_private'], $array['is_modified']);
    }

}