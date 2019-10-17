<?php
class Vector {
    private $_x;
    private $_y;
    private $_z;
    private $_w = 0;
    static $verbose;
    public function __construct($data) {
        if (isset($data['dest']) && $data['dest'] instanceof Vertex) {
            if (isset($data['orig']) && $data['orig'] instanceof Vertex) {
                $origin = new Vertex(array('x' => $data['orig']->get_X(), 'y' => $data['orig']->get_Y(), 'z' => $data['orig']->get_Z(), 'w' => $data['orig']->get_W()));
            } else {
                $origin = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1));
            }
            $this->_x = $data['dest']->get_X() - $origin->get_X();
            $this->_y = $data['dest']->get_Y() - $origin->get_Y();
            $this->_z = $data['dest']->get_Z() - $origin->get_Z();
            $this->_w = 0;
        }
        if (Self::$verbose) {
            printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
        }
    }
    function __destruct() {
        if (Self::$verbose)
            printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
    }
    function __toString() {
        return (vsprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
    }
    static function doc () {
        echo file_get_contents("./Vector.doc.txt")."\n";
    }
    public function magnitude() {
        $new = (float)(sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2)));
        return ($new);
    }
    public function normalize() {
        $new = new Vector(['dest' => new Vertex(array('x' => $this->_x / $this->magnitude(), 'y' => $this->_y / $this->magnitude(), 'z' => $this->_z / $this->magnitude()))]);
        return ($new);
    }
    public function add(Vector $rhs) {
        $new = new Vector(['dest' => new Vertex(array('x' => $this->_x + $rhs->_x, 'y' => $this->_y + $rhs->_y, 'z' => $this->_z + $rhs->_z))]);
        return ($new);
    }
    public function sub(Vector $rhs) {
        $new = new Vector(['dest' => new Vertex(array('x' => $this->_x - $rhs->_x, 'y' => $this->_y - $rhs->_y, 'z' => $this->_z - $rhs->_z))]);
        return ($new);
    }
    public function opposite() {
        $new = new Vector(['dest' => new Vertex(array('x' => $this->_x * -1, 'y' => $this->_y * -1, 'z' => $this->_z * -1))]);
        return ($new);
    }
    public function scalarProduct($k) {
        $new = new Vector (['dest' => new Vertex(array('x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k))]);
        return ($new);
    }
    public function dotProduct(Vector $rhs) {
        $dotProduct = (float)($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z);
        return ($dotProduct);
    }
    public function cos(Vector $rhs) {
        $cos = $this->dotProduct($rhs) / ($this->magnitude() * $rhs->magnitude());
        return ($cos);
    }
    public function crossProduct(Vector $rhs) {
        $new = new Vector(array('dest' => new Vertex(array('x' => $this->_y * $rhs->get_Z() - $this->_z * $rhs->get_Y(), 'y' => $this->_z * $rhs->get_X() - $this->_x * $rhs->get_Z(), 'z' => $this->_x * $rhs->get_Y() - $this->_y * $rhs->get_X()))));
        return ($new);
    }
    public function get_X() {
        return ($this->_x);
    }
    public function get_Y() {
        return ($this->_y);
    }
    public function get_Z() {
        return ($this->_z);
    }
    public function get_W() {
        return ($this->_w);
    }
}
?>