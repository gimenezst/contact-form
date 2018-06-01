<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
/**
 * @ORM\Id()
 * @ORM\GeneratedValue()
 * @ORM\Column(type="integer")
 */
private $id;

/**
 * @Assert\NotBlank()
 * @ORM\Column(type="string", length=255)
 */
private $name;

/**
 * @Assert\NotBlank()
 * @ORM\Column(type="string", length=255)
 */
private $firstName;

/**
 * @Assert\NotBlank()
 * @Assert\Email(
 *     message = "The email '{{ value }}' is not a valid email.",
 *     checkMX = true
 * )
 * @ORM\Column(type="string", length=255)
 */
private $email;

/**
 * @Assert\NotBlank()
 * @ORM\Column(type="text")
 */
private $message;

/**
 * @ORM\Column(type="boolean")
 */
private $checked = false;


public function getId()
{
return $this->id;
}

public function getName(): ?string
{
return $this->name;
}

public function setName(string $name): self
{
$this->name = $name;

return $this;
}

public function getFirstName(): ?string
{
return $this->firstName;
}

public function setFirstName(string $firstName): self
{
$this->firstName = $firstName;

return $this;
}

public function getEmail(): ?string
{
return $this->email;
}

public function setEmail(string $email): self
{
$this->email = $email;

return $this;
}

public function getMessage(): ?string
{
return $this->message;
}

public function setMessage(string $message): self
{
$this->message = $message;

return $this;
}

public function getChecked(): ?bool
{
return $this->checked;
}

public function setChecked(bool $checked): self
{
$this->checked = $checked;

return $this;
}
}
