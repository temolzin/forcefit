<?php
    interface CRUD {
        public function insert($data);
        public function update($data);
        public function delete($id);
        public function read();
    }
?>