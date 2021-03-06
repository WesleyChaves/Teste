<?php

namespace CadastroClienteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cadastroo
 *
 * @ORM\Table(name="cadastroo")
 * @ORM\Entity(repositoryClass="CadastroClienteBundle\Repository\CadastrooRepository")
 */
class Cadastroo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="Idade", type="string", length=255)
     */
    private $idade;

    /**
     * @var string
     *
     * @ORM\Column(name="Observacao", type="text")
     */
    private $observacao;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Cadastroo
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Cadastroo
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set idade
     *
     * @param string $idade
     *
     * @return Cadastroo
     */
    public function setIdade($idade)
    {
        $this->idade = $idade;

        return $this;
    }

    /**
     * Get idade
     *
     * @return string
     */
    public function getIdade()
    {
        return $this->idade;
    }

    /**
     * Set observacao
     *
     * @param string $observacao
     *
     * @return Cadastroo
     */
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;

        return $this;
    }

    /**
     * Get observacao
     *
     * @return string
     */
    public function getObservacao()
    {
        return $this->observacao;
    }
}
