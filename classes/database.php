<?php 
    class database
    {
        function opencon()
        {
            return new PDO('mysql:host=localhost; dbname=student', 'root', '');
        }

        function signup($username,$password)
        {
            $con = $this->opencon();
            return $con->prepare("INSERT INTO login (username,password) VALUES (?,?)")
                        ->execute([$username,$password]);
        }

        function check($username,$password)
        {
            $con = $this->opencon();
            $query = "SELECT * from login WHERE username='".$username."' && password='".$password."'";
            return $con->query($query)
                        ->fetch();
        }

        function save($fname,$mname,$lname)
        {
            $con = $this->opencon();
            return $con->prepare("INSERT INTO studinfo (fname,mname,lname) VALUES (?,?,?)")
                        ->execute([$fname,$mname,$lname]);
        }

        function view()
        {
            $con = $this->opencon();
            return $con->query("SELECT * from studinfo")->fetchAll();
        }

        function viewdata($id)
        {
            $con = $this->opencon();
            return $con->query("SELECT * from studinfo WHERE id='".$id."'")->fetch();
        }

        function update($id,$fname,$mname,$lname)
        {
            $con = $this->opencon();
            return $con->prepare("UPDATE studinfo set fname=?,mname=?,lname=? WHERE id=$id")
                        ->execute([$fname,$mname,$lname]);
        }

        function delete($id)
        {
            $con = $this->opencon();
            return $con->prepare("DELETE from studinfo WHERE id=$id")->execute();
        }

    }
