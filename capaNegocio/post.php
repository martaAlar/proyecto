<?php
/**
 * post.php
 * Módulo secundario que implementa la clase BDPosts.
 */

/** Incluye la clase. */
include '../../capaDatos/bdposts.php';
/**
 * Declaración de la clase Post.
*/
class Post {
    /**
     * @var int ID del post.
     * @access private 
     */
    private int $postid;

    /**
     * @var int ID del usuario.
     * @access private 
     */
    private int $userid;

    /**
     * @var int ID de la etiqueta asociada.
     * @access private 
     */
    private int $etiquetaid;

    /**
     * @var string Contenido del post.
     * @access private 
     */
    private string $contenido;

    /**
     * @var string Ruta de la foto asociada al post.
     * @access private 
     */
    private string $foto;

    /**
     * @var string Fecha de publicación del post.
     * @access private 
     */
    private string $fechaPublic;

    // Setters

    /**
     * Método que inicializa el atributo $postid.
     * 
     * @access public
     * @param int $postid ID del post.
     * @return void 
     */
    public function setPostId(int $postid): void {
        $this->postid = $postid;
    }

    /**
     * Método que inicializa el atributo $userid.
     * 
     * @access public
     * @param int $userid ID del usuario.
     * @return void 
     */
    public function setUserId(int $userid): void {
        $this->userid = $userid;
    }

    /**
     * Método que inicializa el atributo $etiquetaid.
     * 
     * @access public
     * @param int $etiquetaid ID de la etiqueta asociada.
     * @return void 
     */
    public function setEtiquetaId(int $etiquetaid): void {
        $this->etiquetaid = $etiquetaid;
    }

    /**
     * Método que inicializa el atributo $contenido.
     * 
     * @access public
     * @param string $contenido Contenido del post.
     * @return void 
     */
    public function setContenido(string $contenido): void {
        $this->contenido = $contenido;
    }

    /**
     * Método que inicializa el atributo $foto.
     * 
     * @access public
     * @param string $foto Ruta de la foto asociada al post.
     * @return void 
     */
    public function setFoto(string $foto): void {
        $this->foto = $foto;
    }

    /**
     * Método que inicializa el atributo $fechaPublic.
     * 
     * @access public
     * @param string $fechaPublic Fecha de publicación del post.
     * @return void 
     */
    public function setFechaPublic(string $fechaPublic): void {
        $this->fechaPublic = $fechaPublic;
    }

    // Getters

    /**
     * Método que devuelve el valor del atributo $postid.
     * 
     * @access public
     * @return int ID del post.
     */
    public function getPostId(): int {
        return $this->postid;
    }

    /**
     * Método que devuelve el valor del atributo $userid.
     * 
     * @access public
     * @return int ID del usuario.
     */
    public function getUserId(): int {
        return $this->userid;
    }

    /**
     * Método que devuelve el valor del atributo $etiquetaid.
     * 
     * @access public
     * @return int ID de la etiqueta .
     */
    public function geEtiquetaId(): int {
        return $this->etiquetaid;
    }

    /**
     * Método que devuelve el valor del atributo $contenido.
     * 
     * @access public
     * @return string Contenido del post.
     */
    public function getContenido(): string {
        return $this->contenido;
    }

    /**
     * Método que devuelve el valor del atributo $foto.
     * 
     * @access public
     * @return string Ruta de la foto asociada al post.
     */
    public function getFoto(): string {
        return $this->foto;
    }

    /**
     * Método que devuelve el valor del atributo $fechaPublic.
     * 
     * @access public
     * @return string Fecha de publicación del post.
     */
    public function getFechaPublic(): string {
        return $this->fechaPublic;
    }

    /**
	 * Método que añade un nuevo post.
	 *
	 * @access public
	 * @return boolean	True en caso afirmativo
	 * 					False en caso contrario.
	 */
	public function insertarPost() : bool {
		/** @var BDPosts Instancia un objeto de la clase. */
		$bdposts = new BDPosts();
		/** Inicializa los atributos del objeto. */
		$bdposts->setUserId($this->userid);
		$bdposts->setEtiquetaId($this->etiquetaid);
		$bdposts->setContenido($this->contenido);
		$bdposts->setFoto($this->foto);
		$bdposts->setFechaPublic($this->fechaPublic);

		/** Inserta un nuevo usuario y comprueba un posible error. */
		if ($bdposts->insertarPost()) {
			/** Devuelve true si se ha conseguido. */
			return true;
		}
		/** Devuelve false si se ha producido un error. */
		return false;
	}

    /**
	 * Método que añade un nuevo post.
	 *
	 * @access public
	 * @return array[]:Post	True en caso afirmativo
	 * 					False en caso contrario.
	 */
	public function cargarPosts() : array {
		/** @var array[]:Post Array de objetos de tipo Post. */
		$arrayPosts = array();
		/** @var BDPosts Instancia un objeto de la clase. */
		$bdposts = new BDPosts();
		/** Inicializa los atributos del objeto. */
		$bdposts->setUserId($this->userid);
		/** Inicializa el array de objetos Tarea. */
		foreach($bdposts->cargarPosts() as $post) {
			$this->setPostId($post[0]);
			$this->setUserId($post[1]);
			$this->setEtiquetaId($post[2]);
            $this->setContenido($post[3]);
            $this->setFoto($post[4]);
			$arrayPosts[] = $post;
		}
		/** Devuelve el array. */
		return $arrayPosts;
	}
}
