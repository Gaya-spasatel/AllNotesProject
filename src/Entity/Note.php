<?php

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoteRepository::class)
 */
class Note
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $note_text;

    /**
     * @ORM\Column(type="datetime")
     */
    private $last_modified;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $login_modified;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_private;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_modified;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="notes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $login_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNoteText(): ?string
    {
        return $this->note_text;
    }

    public function setNoteText(string $note_text): self
    {
        $this->note_text = $note_text;

        return $this;
    }

    public function getLastModified(): ?\DateTimeInterface
    {
        return $this->last_modified;
    }

    public function setLastModified(\DateTimeInterface $last_modified): self
    {
        $this->last_modified = $last_modified;

        return $this;
    }

    public function getLoginModified(): ?User
    {
        return $this->login_modified;
    }

    public function setLoginModified(?User $login_modified): self
    {
        $this->login_modified = $login_modified;

        return $this;
    }

    public function getIsPrivate(): ?bool
    {
        return $this->is_private;
    }

    public function setIsPrivate(bool $is_private): self
    {
        $this->is_private = $is_private;

        return $this;
    }

    public function getIsModified(): ?bool
    {
        return $this->is_modified;
    }

    public function setIsModified(bool $is_modified): self
    {
        $this->is_modified = $is_modified;

        return $this;
    }

    public function getLoginId(): ?User
    {
        return $this->login_id;
    }

    public function setLoginId(?User $login_id): self
    {
        $this->login_id = $login_id;

        return $this;
    }
}
