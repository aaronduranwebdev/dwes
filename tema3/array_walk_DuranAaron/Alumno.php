<?php
/**
 * Clase Alumno que almacena atributos y funciones para un alumno
 * @author a21aarondn <aaronduranwebdev@gmail.com>
 */
class Alumno
{
	private string $nombre;
	private string $apellidos;
	private float $nota;

	function getNombre(): string
	{
		return $this->nombre;
	}

	function setNombre(string $nombre): self
	{
		$this->nombre = $nombre;
		return $this;
	}

	function getApellidos(): string
	{
		return $this->apellidos;
	}

	function setApellidos(string $apellidos): self
	{
		$this->apellidos = $apellidos;
		return $this;
	}

	function getNota(): float
	{
		return $this->nota;
	}

	function setNota(float $nota): self
	{
		$this->nota = $nota;
		return $this;
	}

	function __construct(string $nombre, string $apellidos, float $nota)
	{
		$this->nombre = $nombre;
		$this->apellidos = $apellidos;
		$this->nota = $nota;
	}
}
?>