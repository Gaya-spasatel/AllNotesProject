<?php

namespace App\Entity;

use App\Repository\AccessRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccessRepository::class)
 */
class Access
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Note::class)
     */
    private $note_id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    private $login_id;

    public function __construct()
    {
        $this->note_id = new ArrayCollection();
        $this->login_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Note[]
     */
    public function getNoteId(): Collection
    {
        return $this->note_id;
    }

    public function addNoteId(Note $noteId): self
    {
        if (!$this->note_id->contains($noteId)) {
            $this->note_id[] = $noteId;
        }

        return $this;
    }

    public function removeNoteId(Note $noteId): self
    {
        $this->note_id->removeElement($noteId);

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getLoginId(): Collection
    {
        return $this->login_id;
    }

    public function addLoginId(User $loginId): self
    {
        if (!$this->login_id->contains($loginId)) {
            $this->login_id[] = $loginId;
        }

        return $this;
    }

    public function removeLoginId(User $loginId): self
    {
        $this->login_id->removeElement($loginId);

        return $this;
    }
}
