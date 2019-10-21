<?php
    class Camera
    {
        private $_projection;
        private $_tR;
        private $_tT;
        private $_origin;
        private $_width;
        private $_height;
        private $_ratio;
        
        static $verbose = false;

        public function __construct($array) {
            $this->_origin = $array['origin'];
            $this->_tT = new Matrix(array('preset' => Matrix::TRANSLATION, 'vtc' => $this->_origin->opposite()));
            $this->_tR = $this->_reorder_array($array['orientation']);
            $this->_width = (float)$array['width'] / 2;
            $this->_height = (float)$array['height'] / 2;
            $this->_ratio = $this->_width / $this->_height;
            $this->_projection = new Matrix(array('preset' => Matrix::PROJECTION, 'fov' => $array['fov'], 'ratio' => $this->_ratio, 'near' => $array['near'], 'far' => $array['far']));
            if (Self::$verbose) {
                echo "Camera instance constructed\n";
            }
        }
        // sets the pixel in the camera fov.
        public function watchVertex(Vertex $worldVertex){
            $vtx = $this->_projection->transformVertex($this->_tR->transformVertex($worldVertex));
            $vtx->setX($vtx->getX() * $this->_ratio);
            $vtx->setY($vtx->getY());
            $vtx->setColor($worldVertex->getColor());
            return ($vtx);
        }
        // rotate according to the rotate variable.
        private function _reorder_array(Matrix $transpose){
            $save_for_output[0] = $transpose->matrix[0];
            $save_for_output[1] = $transpose->matrix[4];
            $save_for_output[2] = $transpose->matrix[8];
            $save_for_output[3] = $transpose->matrix[12];
            $save_for_output[4] = $transpose->matrix[1];
            $save_for_output[5] = $transpose->matrix[5];
            $save_for_output[6] = $transpose->matrix[9];
            $save_for_output[7] = $transpose->matrix[13];
            $save_for_output[8] = $transpose->matrix[2];
            $save_for_output[9] = $transpose->matrix[6];
            $save_for_output[10] = $transpose->matrix[10];
            $save_for_output[11] = $transpose->matrix[14];
            $save_for_output[12] = $transpose->matrix[3];
            $save_for_output[13] = $transpose->matrix[7];
            $save_for_output[14] = $transpose->matrix[11];
            $save_for_output[15] = $transpose->matrix[15];
            $transpose->matrix = $save_for_output;
            return ($transpose);
        }
        function __destruct()
        {
            if (Self::$verbose)
                printf("Camera instance destructed\n");
        }
        function __toString()
        {
            $save_for_output = "Camera( \n";
            $save_for_output .= "+ Origine: ".$this->_origin."\n";
            $save_for_output .= "+ tT:\n".$this->_tT."\n";
            $save_for_output .= "+ tR:\n".$this->_tR."\n";
            $save_for_output .= "+ tR->mult( tT ):\n".$this->_tR->mult($this->_tT)."\n";
            $save_for_output .= "+ Proj:\n".$this->_projection."\n)";
            return ($save_for_output);
        }
        public static function doc()
        {
            echo file_get_contents("Camera.doc.txt")."\n";
        }
    }