<?php
class CreacionUsuarios
{
    private  $usuario;
    private $nombre;
    private $password;
    private $privilegio;

    /**
     * Get the value of usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of privilegio
     */
    public function getPrivilegio()
    {
        return $this->privilegio;
    }

    /**
     * Set the value of privilegio
     *
     * @return  self
     */
    public function setPrivilegio($privilegio)
    {
        $this->privilegio = $privilegio;

        return $this;
    }
}
